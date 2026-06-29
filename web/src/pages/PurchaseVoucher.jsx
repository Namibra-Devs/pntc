import React, { useState, useEffect } from 'react';
import { CreditCard, Mail, ArrowRight, Loader2, ShieldCheck, Smartphone, ArrowLeft } from 'lucide-react';
import { motion } from 'framer-motion';
import { Link, useNavigate } from 'react-router-dom';

import ThemeToggle from '../components/ThemeToggle';
import { useSettings } from '../context/SettingsContext';
import { API_BASE_URL } from '../utils/api';
import api from '../utils/api';



const PurchaseVoucher = () => {
    const { settings } = useSettings();
    const navigate = useNavigate();
    const [email, setEmail] = useState('');
    const [phoneNumber, setPhoneNumber] = useState('');

    const [voucherType, setVoucherType] = useState('Undergraduate');
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState('');
    const [voucherOptions, setVoucherOptions] = useState([]);

    useEffect(() => {
        const fetchOptions = async () => {
            try {
                const { data } = await api.get('/finance/voucher-options');
                setVoucherOptions(data);
                if (data.length > 0) {
                    setVoucherType(data[0].type);
                }
            } catch (err) {
                console.error("Failed to load voucher options", err);
            }
        };
        fetchOptions();
    }, []);
    const handlePurchase = async (e) => {
        e.preventDefault();

        // Validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const ghanaPhoneRegex = /^0(2|5)[0-9]{8}$/;

        if (!emailRegex.test(email)) {
            setError('Please enter a valid email address.');
            return;
        }

        if (!ghanaPhoneRegex.test(phoneNumber)) {
            setError('Please enter a valid Ghana phone number (e.g. 024XXXXXXX).');
            return;
        }

        setLoading(true);
        setError('');

        const selectedVoucher = voucherOptions.find(v => v.type === voucherType);

        try {
            const { data } = await api.post('/payments/initialize-voucher', {
                email,
                phoneNumber,
                voucherType,
                // amount: selectedVoucher.price * 100, // Amount in pesewas
                amount: selectedVoucher.price,
                callback_url: `${window.location.origin}/verify-payment`
            });

            // Redirect to Paystack
            window.location.href = data.authorization_url;
        } catch (err) {
            setError(err.response?.data?.message || 'Failed to initialize payment');
            setLoading(false);
        }
    };

    return (
        <div className="min-h-screen flex items-center justify-center p-4 md:p-6 lg:p-12 relative overflow-hidden bg-background transition-colors duration-300">
            {/* Responsive Split Solid Background */}
            <div className="absolute top-0 left-0 w-full h-[45vh] lg:h-full lg:w-1/2 bg-primary transition-colors duration-300">
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

            <div className="absolute top-4 right-4 md:top-6 md:right-6 z-50 text-white lg:text-text">
                <ThemeToggle />
            </div>

            <div className="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-24 items-center relative z-10 mt-16 lg:mt-0">

                {/* Left Side: Info */}
                <motion.div
                    initial={{ opacity: 0, x: -20 }}
                    animate={{ opacity: 1, x: 0 }}
                    className="space-y-6 lg:space-y-8 text-white px-2 lg:px-0 lg:pr-10 xl:pr-16"
                >
                    <div className="inline-flex items-center gap-2 px-4 py-2 bg-white/10 border border-white/20 text-white rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md">
                        <Smartphone size={14} /> Mobile Money Supported
                    </div>
                    <h1 className="text-4xl md:text-5xl lg:text-6xl font-black font-heading leading-tight tracking-tight">
                        Start Your <br className="hidden lg:block"/><span className="text-white/90">Journey</span> at {settings.schoolAbbreviation || 'GUMS'}.
                    </h1>

                    <p className="text-white/80 text-lg md:text-xl font-medium max-w-lg">
                        Purchase your admission voucher instantly via Paystack. Join {settings.schoolName || 'Ghana University Management System'} today.
                    </p>


                    <div className="space-y-5 pt-4 hidden md:block">
                        <div className="flex gap-4 items-start">
                            <div className="w-12 h-12 flex-shrink-0 bg-white/10 border border-white/20 rounded-2xl text-white flex items-center justify-center shadow-sm"><ShieldCheck size={24} /></div>
                            <div>
                                <p className="font-bold text-lg">Instant Delivery</p>
                                <p className="text-sm text-white/70">Receive your Serial and PIN immediately after payment.</p>
                            </div>
                        </div>
                        <div className="flex gap-4 items-start">
                            <div className="w-12 h-12 flex-shrink-0 bg-white/10 border border-white/20 rounded-2xl text-white flex items-center justify-center shadow-sm"><CreditCard size={24} /></div>
                            <div>
                                <p className="font-bold text-lg">Secure Payment</p>
                                <p className="text-sm text-white/70">All transactions are secured by Paystack PCI DSS encryption.</p>
                            </div>
                        </div>
                    </div>
                </motion.div>

                {/* Right Side: Form */}
                <motion.div
                    initial={{ opacity: 0, y: 30 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.4, ease: "easeOut", delay: 0.1 }}
                    className="bg-surface p-8 sm:p-10 md:p-12 rounded-[2rem] lg:rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.2)] border border-border relative z-10 transition-colors duration-300 w-full max-w-xl mx-auto lg:ml-auto"
                >
                    <div className="mb-8 flex items-center gap-4 border-b-2 border-border pb-4">
                        <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <CreditCard size={24} />
                        </div>
                        <h3 className="text-xl lg:text-2xl font-black uppercase tracking-widest text-text">Order Voucher</h3>
                    </div>

                    {error && (
                        <div className="bg-red-500/10 border border-red-500 text-red-500 p-3 rounded-xl mb-6 text-sm font-medium">
                            {error}
                        </div>
                    )}

                    <form onSubmit={handlePurchase} className="space-y-6">
                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Email Address</label>
                            <div className="relative group">
                                <Mail className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input
                                    type="email"
                                    required
                                    className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none"
                                    placeholder="hamzaibrahim@email.com"
                                    value={email}
                                    onChange={(e) => setEmail(e.target.value)}
                                />
                            </div>
                            <p className="text-[10px] text-text-muted mt-2 italic pl-1 font-medium">A copy of your voucher will be sent to this email.</p>
                        </div>

                        <div>
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Phone Number</label>
                            <div className="relative group">
                                <Smartphone className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors" size={20} />
                                <input
                                    type="tel"
                                    required
                                    className="input-field !pl-12 !py-4 !rounded-xl !bg-background hover:!bg-surface-hover !border-transparent focus:!border-primary/30 focus:!ring-4 focus:!ring-primary/10 transition-all font-medium text-text outline-none"
                                    placeholder="024XXXXXXX"
                                    value={phoneNumber}
                                    onChange={(e) => setPhoneNumber(e.target.value)}
                                />
                            </div>
                            <p className="text-[10px] text-text-muted mt-2 italic pl-1 font-medium">We'll text your Serial Number and PIN to this number.</p>
                        </div>

                        <div className="pt-4">
                            <label className="block text-xs font-bold uppercase tracking-widest text-text-muted mb-4">Select Voucher Category</label>
                            <div className="space-y-3">
                                {voucherOptions.map((opt) => (
                                    <label
                                        key={opt.type}
                                        className={`block p-5 rounded-2xl border-2 cursor-pointer transition-all ${voucherType === opt.type
                                            ? 'border-primary bg-primary/5 ring-4 ring-primary/10 shadow-sm'
                                            : 'border-border bg-background hover:bg-surface-hover hover:border-text-muted'
                                            }`}
                                    >
                                        <input
                                            type="radio"
                                            name="voucherType"
                                            className="hidden"
                                            onChange={() => setVoucherType(opt.type)}
                                            checked={voucherType === opt.type}
                                        />
                                        <div className="flex justify-between items-center">
                                            <div>
                                                <p className={`font-bold text-lg transition-colors ${voucherType === opt.type ? 'text-primary' : 'text-text'}`}>{opt.type}</p>
                                                <p className="text-xs font-medium text-text-muted mt-0.5">{opt.description}</p>
                                            </div>
                                            <p className={`text-xl font-black transition-colors ${voucherType === opt.type ? 'text-primary' : 'text-text-muted'}`}>GHS {opt.price}</p>
                                        </div>
                                    </label>
                                ))}
                            </div>
                        </div>

                        <div className="pt-6 border-t-2 border-border mt-8">
                            <button
                                type="submit"
                                disabled={loading}
                                className="w-full bg-primary hover:bg-primary-hover text-white font-bold py-5 rounded-2xl text-xl shadow-[0_10px_20px_-10px_rgba(0,119,190,0.5)] hover:shadow-[0_15px_25px_-10px_rgba(0,119,190,0.6)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2"
                            >
                                {loading ? <Loader2 className="animate-spin" /> : <>Complete Purchase <ArrowRight size={24} /></>}
                            </button>
                        </div>

                        <div className="mt-6 pt-6 border-t border-border text-center">
                            <p className="text-sm text-text-muted">
                                Already have a voucher?{' '}
                                <Link to="/register" className="font-bold text-primary hover:underline transition-all">
                                    Start Application
                                </Link>
                            </p>
                        </div>
                    </form>
                </motion.div>
            </div>
        </div>
    );
};


export default PurchaseVoucher;
