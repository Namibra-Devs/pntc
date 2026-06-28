import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { GraduationCap, User, Mail, Lock, CreditCard, Key, Loader2, ShieldCheck } from 'lucide-react';
import { useAuth } from '../context/AuthContext';
import { motion } from 'framer-motion';

import ThemeToggle from '../components/ThemeToggle';
import { useSettings } from '../context/SettingsContext';
import { API_BASE_URL } from '../utils/api';
import SEO from '../components/SEO';



const RegisterApplicant = () => {
    const [formData, setFormData] = useState({
        username: '',
        email: '',
        password: '',
        firstName: '',
        lastName: '',
        serialNumber: '',
        pin: ''
    });
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState('');

    const { registerApplicant } = useAuth();
    const { settings } = useSettings();
    const navigate = useNavigate();


    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError('');
        try {
            await registerApplicant(formData);
            navigate('/applicant/dashboard');
        } catch (err) {
            setError(err.response?.data?.message || 'Registration failed');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="bg-background min-h-screen flex items-center justify-center p-6 transition-colors duration-300 relative overflow-hidden">
            <SEO title="Complete Registration" description="Register your applicant account using your voucher" />
            
            {/* Background blobs */}
            <div className="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/20 rounded-full blur-[120px] pointer-events-none"></div>
            <div className="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-secondary/20 rounded-full blur-[120px] pointer-events-none"></div>

            <div className="absolute top-6 right-6 z-50">
                <ThemeToggle />
            </div>

            <motion.div
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                className="glass-card w-full max-w-2xl p-8 border border-border"
            >
                <div className="text-center mb-8">
                    {settings.schoolLogo ? (
                        <div className="w-16 h-16 rounded-2xl overflow-hidden border border-border bg-white flex items-center justify-center p-2 mx-auto mb-4">
                            <img src={`${API_BASE_URL}${settings.schoolLogo}`} alt="School Logo" className="w-full h-full object-contain" />
                        </div>
                    ) : (
                        <GraduationCap size={48} className="text-primary mx-auto mb-4" />
                    )}
                    <h1 className="text-3xl font-bold font-heading">{settings.schoolName || 'Ghana University Management System'}</h1>
                    <p className="text-text-muted">Enter your voucher details to initialize your application</p>
                </div>


                {error && (
                    <div className="bg-red-500/10 border border-red-500 text-red-500 p-3 rounded-lg mb-6 text-sm font-medium">
                        {error}
                    </div>
                )}

                <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div className="space-y-4">
                        <h3 className="text-sm font-semibold uppercase tracking-wider text-primary border-b border-border pb-2 mb-4">Personal Account</h3>
                        <div>
                            <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">Username</label>
                            <div className="relative">
                                <User className="absolute left-3 top-1/2 -translate-y-1/2 text-text-muted" size={16} />
                                <input name="username" required className="input-field !pl-12" onChange={handleChange} />
                            </div>
                        </div>
                        <div>
                            <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">Email</label>
                            <div className="relative">
                                <Mail className="absolute left-3 top-1/2 -translate-y-1/2 text-text-muted" size={16} />
                                <input name="email" type="email" required className="input-field !pl-12" onChange={handleChange} />
                            </div>
                        </div>
                        <div>
                            <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">Password</label>
                            <div className="relative">
                                <Lock className="absolute left-3 top-1/2 -translate-y-1/2 text-text-muted" size={16} />
                                <input name="password" type="password" required className="input-field !pl-12" onChange={handleChange} />
                            </div>
                        </div>
                    </div>

                    <div className="space-y-4">
                        <h3 className="text-sm font-semibold uppercase tracking-wider text-primary border-b border-border pb-2 mb-4">Voucher Details</h3>
                        <div>
                            <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">Voucher Serial</label>
                            <div className="relative">
                                <CreditCard className="absolute left-3 top-1/2 -translate-y-1/2 text-text-muted" size={16} />
                                <input name="serialNumber" required className="input-field !pl-12 font-mono" placeholder="GUMS-XXXX-XXXX" onChange={handleChange} />
                            </div>
                        </div>


                        <div>
                            <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">Voucher PIN</label>
                            <div className="relative">
                                <Key className="absolute left-3 top-1/2 -translate-y-1/2 text-text-muted" size={16} />
                                <input name="pin" required className="input-field !pl-12 font-mono" placeholder="••••••" onChange={handleChange} />
                            </div>
                        </div>
                        <div className="grid grid-cols-2 gap-4">
                            <div>
                                <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">First Name</label>
                                <input name="firstName" required className="input-field" onChange={handleChange} />
                            </div>
                            <div>
                                <label className="block text-xs text-text-muted mb-2 font-bold uppercase tracking-wider">Last Name</label>
                                <input name="lastName" required className="input-field" onChange={handleChange} />
                            </div>
                        </div>
                    </div>

                    <div className="md:col-span-2 pt-6 border-t border-border mt-4">
                        <button
                            type="submit"
                            disabled={loading}
                            className="btn btn-primary w-full py-4 text-lg shadow-md shadow-primary/20"
                        >
                            {loading ? <Loader2 className="animate-spin" /> : 'Initialize Application'}
                        </button>

                        <div className="mt-6 pt-6 border-t border-border text-center">
                            <p className="text-sm text-text-muted">
                                Don't have a voucher yet?{' '}
                                <Link to="/purchase-voucher" className="font-bold text-primary hover:underline transition-all">
                                    Purchase a Voucher
                                </Link>
                            </p>
                        </div>
                    </div>
                </form>
            </motion.div>


        </div>
    );
};


export default RegisterApplicant;
