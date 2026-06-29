import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { GraduationCap, User, Mail, Lock, CreditCard, Key, Loader2, ShieldCheck, ArrowLeft } from 'lucide-react';
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
        <div className="min-h-screen flex items-center justify-center p-4 md:p-6 relative overflow-hidden bg-background transition-colors duration-300">
            <SEO title="Complete Registration" description="Register your applicant account using your voucher" />

            {/* Split Solid Background */}
            <div className="absolute top-0 left-0 w-full h-[45vh] bg-primary transition-colors duration-300">
                {/* Subtle Dot Pattern overlay */}
                <div className="absolute inset-0 opacity-[0.05]" style={{ backgroundImage: 'radial-gradient(#000 1px, transparent 1px)', backgroundSize: '24px 24px' }}></div>
            </div>

            <div className="absolute top-4 left-4 md:top-6 md:left-6 z-50">
                <button
                    onClick={() => navigate(-1)}
                    className="p-2 rounded-full bg-black/10 hover:bg-black/20 text-white transition-colors flex items-center gap-2 text-sm font-medium backdrop-blur-none"

                    title="Go Back"
                >
                    <ArrowLeft size={20} />
                    <span className="hidden md:inline">Back</span>
                </button>
            </div>

            <div className="absolute top-4 right-4 md:top-6 md:right-6 z-50 text-white">
                <ThemeToggle />
            </div>

            <motion.div
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.4, ease: "easeOut" }}
                className="bg-surface w-full max-w-3xl p-6 sm:p-10 md:p-14 mt-12 md:mt-0 rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.2)] border border-border relative z-10 transition-colors duration-300"
            >
                <div className="text-center mb-10">
                    {settings.schoolLogo ? (
                        <div className="w-24 h-24 rounded-2xl overflow-hidden border border-border bg-surface shadow-sm flex items-center justify-center p-2 mx-auto mb-6">
                            <img src={`${API_BASE_URL}${settings.schoolLogo}`} alt="School Logo" className="w-full h-full object-contain" />
                        </div>
                    ) : (
                        <GraduationCap size={56} className="text-primary mx-auto mb-6" />
                    )}
                    <h1 className="text-3xl md:text-4xl font-black font-heading tracking-tight mb-2 text-text">
                        {settings.schoolName || 'Ghana University Management System'}
                    </h1>
                    <p className="text-text-muted text-lg">Enter your voucher details to initialize your application</p>
                </div>


                {error && (
                    <div className="bg-red-500/10 border border-red-500 text-red-500 p-3 rounded-lg mb-6 text-sm font-medium">
                        {error}
                    </div>
                )}

                <form onSubmit={handleSubmit} className="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div className="space-y-6">
                        <div className="mb-6 flex items-center gap-4 border-b-2 border-border pb-4">
                            <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                                <User size={24} />
                            </div>
                            <h3 className="text-lg font-black uppercase tracking-widest text-text">Personal Info</h3>
                        </div>

                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Username</label>
                            <div className="relative group">
                                <User className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input name="username" required className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none" onChange={handleChange} />
                            </div>
                        </div>
                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Email</label>
                            <div className="relative group">
                                <Mail className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input name="email" type="email" required className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none" onChange={handleChange} />
                            </div>
                        </div>
                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Password</label>
                            <div className="relative group">
                                <Lock className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input name="password" type="password" required className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none" onChange={handleChange} />
                            </div>
                        </div>
                    </div>

                    <div className="space-y-6">
                        <div className="mb-6 flex items-center gap-4 border-b-2 border-border pb-4">
                            <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                                <CreditCard size={24} />
                            </div>
                            <h3 className="text-lg font-black uppercase tracking-widest text-text">Voucher</h3>
                        </div>

                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Serial Number</label>
                            <div className="relative group">
                                <CreditCard className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input name="serialNumber" required className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 font-mono text-lg tracking-wider text-text uppercase outline-none transition-all" placeholder="XXXX" onChange={handleChange} />
                            </div>
                        </div>

                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">PIN</label>
                            <div className="relative group">
                                <Key className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input name="pin" required className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 font-mono text-lg tracking-widest text-text outline-none transition-all" placeholder="••••••" onChange={handleChange} />
                            </div>
                        </div>
                        <div className="grid grid-cols-2 gap-4">
                            <div>
                                <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">First Name</label>
                                <input name="firstName" required className="input-field !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none" onChange={handleChange} />
                            </div>
                            <div>
                                <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Last Name</label>
                                <input name="lastName" required className="input-field !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none" onChange={handleChange} />
                            </div>
                        </div>
                    </div>

                    <div className="md:col-span-2 pt-10 border-t-2 border-border mt-8">
                        <button
                            type="submit"
                            disabled={loading}
                            className="w-full bg-primary hover:bg-primary-hover text-white font-bold py-5 rounded-2xl text-xl shadow-[0_10px_20px_-10px_rgba(0,119,190,0.5)] hover:shadow-[0_15px_25px_-10px_rgba(0,119,190,0.6)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2"
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
