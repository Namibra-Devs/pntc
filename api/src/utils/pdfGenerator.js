const PDFDocument = require('pdfkit');
const fs = require('fs');
const path = require('path');
const { Setting } = require('../models');


const generateAdmissionLetter = async (user, program, application, settings) => {

    return new Promise((resolve, reject) => {
        const doc = new PDFDocument({ margin: 50, size: 'A4' });
        const filePath = path.join(__dirname, `../../uploads/admission_letters/${application.id}.pdf`);

        // Ensure directory exists
        const dir = path.dirname(filePath);
        if (!fs.existsSync(dir)) {
            fs.mkdirSync(dir, { recursive: true });
        }

        const stream = fs.createWriteStream(filePath);
        doc.pipe(stream);

        // --- Header Section ---
        let yPos = 40;

        // School Logo (Left)
        if (settings.schoolLogo) {
            try {
                const logoPath = path.join(__dirname, '../../', settings.schoolLogo);
                if (fs.existsSync(logoPath)) {
                    doc.image(logoPath, 50, yPos, { width: 60 });
                }
            } catch (err) {
                console.error("Error adding logo to PDF:", err);
            }
        }

        // Student Passport (Right)
        if (application.passportPhoto) {
            try {
                const relativePath = application.passportPhoto.startsWith('/') ? application.passportPhoto.slice(1) : application.passportPhoto;
                const passportPath = path.join(__dirname, '../../', relativePath);

                if (fs.existsSync(passportPath)) {
                    doc.image(passportPath, 480, yPos, { width: 70, height: 70, fit: [70, 70] })
                        .stroke();
                }
            } catch (err) {
                console.error("Error adding passport to PDF:", err);
            }
        }

        // School Address Header (Center)
        doc.font('Helvetica-Bold').fontSize(16).text(settings.schoolName || 'GHANA UNIVERSITY MANAGEMENT SYSTEM', 120, yPos, { align: 'center', width: 350 });
        doc.fontSize(10).font('Helvetica').text('(Office of the Registrar)', { align: 'center' });
        doc.text(settings.schoolAddress || 'P.O. Box 24, City, Country', { align: 'center' });
        doc.text(`Tel: ${settings.schoolContact || ''}`, { align: 'center' });
        doc.text(`Email: ${settings.schoolEmail || ''}`, { align: 'center' });
        doc.moveDown(2);

        // --- Reference Section ---
        // Reset X to margin
        doc.x = 50;
        yPos = doc.y + 10;
        doc.text(`Our Ref: ADM/${(program.code || 'GEN')}/${new Date().getFullYear()}/${user.systemId?.slice(-4) || 'XXXX'}`, 50, yPos);
        doc.text(`Date: ${new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' })}`, 400, yPos, { align: 'right' });

        doc.moveDown();
        doc.x = 50; // Force reset X to margin
        doc.font('Helvetica-Bold').text(`${user.firstName} ${user.lastName} ${user.otherNames || ''}`.toUpperCase());
        if (user.systemId) doc.text(`Student ID: ${user.systemId}`);
        doc.font('Helvetica').text('Dear Sir/Madam,');
        doc.moveDown();

        // --- Title ---
        doc.font('Helvetica-Bold').fontSize(12).text(`ADMISSION TO PURSUE ${program.name.toUpperCase()}`, { align: 'center', underline: true });
        doc.moveDown();

        // --- Body Content ---
        doc.font('Helvetica').fontSize(10);

        const currency = settings.currency || 'GHS';
        const feeAmount = program.fee ? parseFloat(program.fee).toLocaleString('en-US', { minimumFractionDigits: 2 }) : '0.00';
        const academicYear = `${new Date().getFullYear()}/${new Date().getFullYear() + 1}`;

        let template = settings.admissionLetterTemplate || `We are pleased to inform you that the Academic Board of the University has offered you admission to pursue a {{PROGRAM_DURATION}}-Year programme leading to the award of {{PROGRAM_NAME}}.

You are required to indicate acceptance of this offer of admission immediately via the student portal.

Your University Identification Number is {{STUDENT_ID}}. Use this number in addition to your full name to pay your fees and for all official communication.

You are encouraged to pay the full fees for the {{ACADEMIC_YEAR}} Academic Year before registration.
Total Academic Facility User Fees: {{CURRENCY}} {{FEE_AMOUNT}}
Payment can be made via the student portal or at any designated bank branch.

The University reserves the right to review its fees and other schedules without notice.

Please note that if it is discovered subsequently that you do not have the required qualifications by virtue of which the admission was offered, you will be withdrawn from the University.

The University does not assist students financially. You are required to arrange for your own sponsorship and funding during the period of study.

You are required to register online when the university re-opens for the academic year.`;

        // Replace placeholders
        template = template
            .replace(/\{\{PROGRAM_DURATION\}\}/g, program.duration || '')
            .replace(/\{\{PROGRAM_NAME\}\}/g, program.name || '')
            .replace(/\{\{STUDENT_ID\}\}/g, user.systemId || '(To be assigned)')
            .replace(/\{\{ACADEMIC_YEAR\}\}/g, academicYear)
            .replace(/\{\{CURRENCY\}\}/g, currency)
            .replace(/\{\{FEE_AMOUNT\}\}/g, feeAmount)
            .replace(/\{\{STUDENT_NAME\}\}/g, `${user.firstName} ${user.lastName}`);

        // Split into paragraphs and render
        const paragraphs = template.split(/\n\s*\n/);
        
        paragraphs.forEach((p, index) => {
            if (p.trim() !== '') {
                doc.text(`${index + 1}. ${p.trim()}`, { align: 'justify' });
                doc.moveDown(0.5);
            }
        });

        doc.moveDown(2);


        // --- Footer / Signature ---
        doc.text('Please accept our congratulations.', { align: 'left' });
        doc.moveDown(2);

        doc.text('Yours faithfully,');
        doc.moveDown(2);

        // Signature placeholder
        // doc.image('path/to/signature.png', { width: 100 }); 

        doc.font('Helvetica-Bold').text('REGISTRAR');
        doc.font('Helvetica').text(settings.schoolAbbreviation || 'GUMS');

        // CC
        doc.moveDown();
        doc.fontSize(8).text('cc:', { underline: true });
        doc.text('Dean, School of Graduate Studies'); // Logic to determine school needed? Hardcoded for now based on sample styling expectations
        doc.text(`Head of Department, ${program.department || 'Academic Affairs'}`);

        doc.end();

        stream.on('finish', () => resolve(filePath));
        stream.on('error', (err) => reject(err));
    });
};

module.exports = { generateAdmissionLetter };
