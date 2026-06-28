export const API_BASE_URL = import.meta.env.VITE_API_BASE_URL || 'http://localhost:5000';
import axios from 'axios';

const api = axios.create({
    baseURL: `${API_BASE_URL}/api`
});

// Add a request interceptor
api.interceptors.request.use(
    (config) => {
        const savedUser = localStorage.getItem('ums_user');
        if (savedUser) {
            const { token } = JSON.parse(savedUser);
            if (token) {
                config.headers.Authorization = `Bearer ${token}`;
            }
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

export default api;
