import React, { useState, useEffect } from 'react';
import { Save, AlertCircle } from 'lucide-react';
import toast from 'react-hot-toast';
import api from '../utils/api';

const AdmissionLetterTemplate = () => {
    const [template, setTemplate] = useState('');
    const [loading, setLoading] = useState(true);
    const [saving, setSaving] = useState(false);

    const defaultTemplate = `We are pleased to inform you that the Academic Board of the University has offered you admission to pursue a {{PROGRAM_DURATION}}-Year programme leading to the award of {{PROGRAM_NAME}}.

You are required to indicate acceptance of this offer of admission immediately via the student portal.

Your University Identification Number is {{STUDENT_ID}}. Use this number in addition to your full name to pay your fees and for all official communication.

You are encouraged to pay the full fees for the {{ACADEMIC_YEAR}} Academic Year before registration.
Total Academic Facility User Fees: {{CURRENCY}} {{FEE_AMOUNT}}
Payment can be made via the student portal or at any designated bank branch.

The University reserves the right to review its fees and other schedules without notice.

Please note that if it is discovered subsequently that you do not have the required qualifications by virtue of which the admission was offered, you will be withdrawn from the University.

The University does not assist students financially. You are required to arrange for your own sponsorship and funding during the period of study.

You are required to register online when the university re-opens for the academic year.`;

    useEffect(() => {
        fetchSettings();
    }, []);

    const fetchSettings = async () => {
        setLoading(true);
        try {
            const { data } = await api.get('/settings');
            // data is an object mapping keys to values (e.g. { admissionLetterTemplate: "..." })
            setTemplate(data.admissionLetterTemplate ? data.admissionLetterTemplate : defaultTemplate);
        } catch (error) {
            toast.error('Failed to load template settings.');
            console.error('Error fetching settings:', error);
        } finally {
            setLoading(false);
        }
    };

    const handleSave = async () => {
        setSaving(true);
        try {
            const payload = {
                admissionLetterTemplate: template
            };

            await api.post('/settings', payload);
            toast.success('Admission Letter Template saved successfully!');
        } catch (error) {
            toast.error(error.response?.data?.message || 'Failed to save template.');
            console.error('Error saving template:', error);
        } finally {
            setSaving(false);
        }
    };

    const handleReset = () => {
        if (window.confirm("Are you sure you want to reset to the default template? You still need to click Save to apply the changes.")) {
            setTemplate(defaultTemplate);
        }
    };

    if (loading) {
        return (
            <div className="flex justify-center items-center py-20">
                <div className="w-10 h-10 border-4 border-primary/20 border-t-primary rounded-full animate-spin"></div>
            </div>
        );
    }

    return (
        <div className="w-full space-y-6">
            <div>
                <h2 className="text-3xl font-bold font-heading mb-2">Admission Letter Template</h2>
                <p className="text-text-muted">Customize the body paragraphs of the admission letter. The header and footer will be generated automatically.</p>
            </div>

            <div className="grid md:grid-cols-3 gap-6">
                <div className="md:col-span-2 space-y-4">
                    <div className="glass-card p-6 flex flex-col h-full">
                        <textarea
                            value={template}
                            onChange={(e) => setTemplate(e.target.value)}
                            className="w-full flex-1 min-h-[500px] p-4 bg-background border border-border rounded-xl text-text focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-y font-mono text-sm"
                            placeholder="Enter template text here..."
                        />
                        <div className="mt-6 flex justify-between items-center">
                            <button
                                onClick={handleReset}
                                className="text-text-muted hover:text-primary transition-colors text-sm font-medium"
                            >
                                Reset to Default
                            </button>
                            <button
                                onClick={handleSave}
                                disabled={saving}
                                className="btn btn-primary flex items-center gap-2"
                            >
                                {saving ? (
                                    <div className="w-5 h-5 border-2 border-white/20 border-t-white rounded-full animate-spin"></div>
                                ) : (
                                    <Save size={20} />
                                )}
                                Save Template
                            </button>
                        </div>
                    </div>
                </div>

                <div className="space-y-4">
                    <div className="glass-card p-6 border-primary/20 bg-primary/5">
                        <h3 className="font-bold mb-4 flex items-center gap-2 text-primary">
                            <AlertCircle size={20} /> Available Placeholders
                        </h3>
                        <p className="text-sm text-text-muted mb-4">You can use these placeholders to insert dynamic applicant data into the letter.</p>
                        
                        <div className="space-y-3">
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{STUDENT_NAME}}`}</code>
                                <span className="text-xs text-text-muted">Full name of the applicant.</span>
                            </div>
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{STUDENT_ID}}`}</code>
                                <span className="text-xs text-text-muted">The generated Student ID.</span>
                            </div>
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{PROGRAM_NAME}}`}</code>
                                <span className="text-xs text-text-muted">Name of the admitted program.</span>
                            </div>
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{PROGRAM_DURATION}}`}</code>
                                <span className="text-xs text-text-muted">Duration of the program.</span>
                            </div>
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{ACADEMIC_YEAR}}`}</code>
                                <span className="text-xs text-text-muted">Current academic year.</span>
                            </div>
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{CURRENCY}}`}</code>
                                <span className="text-xs text-text-muted">School's default currency.</span>
                            </div>
                            <div className="bg-background p-3 rounded-lg border border-border">
                                <code className="text-xs font-bold text-primary block mb-1">{`{{FEE_AMOUNT}}`}</code>
                                <span className="text-xs text-text-muted">Fee for the admitted program.</span>
                            </div>
                        </div>

                        <div className="mt-6 p-4 bg-yellow-500/10 border border-yellow-500/30 rounded-lg">
                            <p className="text-xs text-yellow-600 dark:text-yellow-400">
                                <strong>Note:</strong> Leave an empty line between paragraphs to separate them into numbered points automatically.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default AdmissionLetterTemplate;
