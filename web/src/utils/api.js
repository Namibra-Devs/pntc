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

import toast from 'react-hot-toast';

// Add a response interceptor
api.interceptors.response.use(
    (response) => {
        const method = response.config.method?.toUpperCase();
        if (['POST', 'PUT', 'DELETE', 'PATCH'].includes(method)) {
            // Avoid toasting on certain silent endpoints if needed, but for now toast everything globally
            const msg = response.data?.message || 'Operation successful!';
            // Some endpoints return the object itself without a message. 
            // If message doesn't exist, we fallback to 'Operation successful!'
            toast.success(msg);
        }
        return response;
    },
    (error) => {
        const method = error.config?.method?.toUpperCase();
        if (method && ['POST', 'PUT', 'DELETE', 'PATCH'].includes(method)) {
            const msg = error.response?.data?.message || error.response?.data?.error || 'Something went wrong';
            toast.error(msg);
        } else if (error.response?.data?.message) {
            // Toast errors even on GET requests if the server explicitly sent an error message
            toast.error(error.response.data.message);
        }
        return Promise.reject(error);
    }
);

export default api;
