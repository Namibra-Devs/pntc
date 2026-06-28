const app = require('./app');
const http = require('http');
const dotenv = require('dotenv');

dotenv.config();

const port = process.env.PORT || 5000;

const server = http.createServer(app);

const startServer = async () => {
    try {
        await app.startDB();
        server.listen(port, () => {
            console.log(`Server is running on port ${port}`);
        });
    } catch (error) {
        console.error('Failed to start server:', error);
        process.exit(1);
    }
};

startServer();
