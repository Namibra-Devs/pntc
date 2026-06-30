const express = require('express');
const cors = require('cors');
const morgan = require('morgan');
const dotenv = require('dotenv');
const { sequelize, connectDB } = require('./config/database');
const { seedRoles, seedCourses, seedUsers, seedPrograms, seedSettings } = require('./utils/seed');


dotenv.config();

const app = express();

// Sync database and seed
const startDB = async () => {
    await connectDB();
    if (process.env.NODE_ENV === 'development') {
        // Use an env variable to control alter/force if needed to fix deployment issues
        const syncOptions = process.env.DB_FORCE === 'true' ? { force: true } : (process.env.DB_ALTER === 'false' ? {} : { alter: true });
        await sequelize.sync(syncOptions);
        await seedRoles();
        await seedCourses();
        await seedUsers();
        await seedPrograms();
        await seedSettings();
        const { seedGradingSchemes, seedVoucherOptions } = require('./utils/seed');
        await seedGradingSchemes();
        await seedVoucherOptions();
    }
};

app.startDB = startDB;

const authRoutes = require('./routes/authRoutes');
const adminRoutes = require('./routes/adminRoutes');
const admissionRoutes = require('./routes/admissionRoutes');
const studentRoutes = require('./routes/studentRoutes');
const staffRoutes = require('./routes/staffRoutes');
const financeRoutes = require('./routes/financeRoutes');
const paymentRoutes = require('./routes/paymentRoutes');
const registrarRoutes = require('./routes/registrarRoutes');
const settingRoutes = require('./routes/settingRoutes');
const userRoutes = require('./routes/userRoutes');







app.use(cors());
app.use(express.json());
app.use(morgan('dev'));

// Static files for uploads
app.use('/uploads', express.static('uploads'));

// Basic route
app.get('/', (req, res) => {
    res.json({ message: 'Welcome to TMS Ghana API' });
});

// Temporary route to fix indexes in production without terminal access
app.get('/fix-indexes-temp', async (req, res) => {
    try {
        const queryInterface = sequelize.getQueryInterface();
        const tables = await queryInterface.showAllTables();
        const log = [];

        for (const tableName of tables) {
            const [results] = await sequelize.query(`SHOW INDEX FROM \`${tableName}\``);
            const indexesToDrop = [];
            results.forEach(row => {
                const name = row.Key_name;
                if (name.match(/_\d+$/)) {
                    if (!indexesToDrop.includes(name)) indexesToDrop.push(name);
                }
            });

            if (indexesToDrop.length > 0) {
                for (const indexName of indexesToDrop) {
                    try {
                        await sequelize.query(`DROP INDEX \`${indexName}\` ON \`${tableName}\``);
                        log.push(`Dropped index: ${indexName} from ${tableName}`);
                    } catch (e) {
                        log.push(`Failed to drop ${indexName} from ${tableName}: ${e.message}`);
                    }
                }
            }
        }
        res.json({ message: 'Index fix completed', log });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

// Routes
console.log('Registering /api/auth');
app.use('/api/auth', authRoutes);
console.log('Registering /api/admin');
app.use('/api/admin', adminRoutes);
console.log('Registering /api/admission');
app.use('/api/admission', admissionRoutes);
console.log('Registering /api/student');
app.use('/api/student', studentRoutes);
console.log('Registering /api/staff');
app.use('/api/staff', staffRoutes);
console.log('Registering /api/finance');
app.use('/api/finance', financeRoutes);
console.log('Registering /api/payments');
app.use('/api/payments', paymentRoutes);
console.log('Registering /api/registrar');
app.use('/api/registrar', registrarRoutes);
console.log('Registering /api/settings');
app.use('/api/settings', settingRoutes);
console.log('Registering /api/user');
app.use('/api/user', userRoutes);











module.exports = app;
