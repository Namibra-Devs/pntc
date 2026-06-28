const { sequelize, connectDB } = require('./src/config/database');
const { seedRoles, seedCourses, seedUsers, seedPrograms, seedSettings, seedGradingSchemes, seedVoucherOptions } = require('./src/utils/seed');

const forceSync = async () => {
    try {
        console.log('Connecting to DB...');
        await connectDB();
        
        console.log('Force Syncing Database (Dropping all tables)...');
        await sequelize.sync({ force: true });
        
        console.log('Database synced. Seeding...');
        await seedRoles();
        await seedCourses();
        await seedUsers();
        await seedPrograms();
        await seedSettings();
        await seedGradingSchemes();
        await seedVoucherOptions();
        
        console.log('Database Reset and Seeding Completed Successfully!');
        process.exit(0);
    } catch (error) {
        console.error('Error during force sync:', error);
        process.exit(1);
    }
};

forceSync();
