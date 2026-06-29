const { sequelize } = require('./src/config/database');

async function alterTable() {
    try {
        await sequelize.authenticate();
        console.log('Connection established.');
        await sequelize.query("ALTER TABLE Users MODIFY COLUMN maritalStatus ENUM('Single', 'Married', 'Divorced', 'Separated', 'Widowed', 'Other');");
        console.log('maritalStatus ENUM altered successfully.');
    } catch (err) {
        console.error('Error:', err);
    } finally {
        process.exit();
    }
}

alterTable();
