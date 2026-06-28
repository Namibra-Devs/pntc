import React, { useState, useEffect } from 'react';
import { User, Mail, Phone, MapPin, Key, Save, Loader2, Calendar, Edit2, Shield } from 'lucide-react';
import { motion } from 'framer-motion';
import api from '../utils/api';

const UserProfile = () => {
    const [loading, setLoading] = useState(true);
    const [saving, setSaving] = useState(false);
    const [profile, setProfile] = useState({
        firstName: '',
        lastName: '',
        otherNames: '',
        phoneNumber: '',
        gender: '',
        dateOfBirth: '',
        homeAddress: '',
        email: '',
        Role: { name: '' }
    });

    const [passwordData, setPasswordData] = useState({
        currentPassword: '',
        newPassword: '',
        confirmPassword: ''
    });

    useEffect(() => {
        const fetchProfile = async () => {
            try {
                const { data } = await api.get('/user/profile');
                setProfile({
                    ...data,
                    otherNames: data.otherNames || '',
                    phoneNumber: data.phoneNumber || '',
                    gender: data.gender || '',
                    dateOfBirth: data.dateOfBirth || '',
                    homeAddress: data.homeAddress || ''
                });
            } catch (error) {
                console.error("Failed to fetch profile");
            } finally {
                setLoading(false);
            }
        };
        fetchProfile();
    }, []);

    const handleProfileUpdate = async (e) => {
        e.preventDefault();
        setSaving(true);
        try {
            const { data } = await api.put('/user/profile', {
                firstName: profile.firstName,
                lastName: profile.lastName,
                otherNames: profile.otherNames,
                phoneNumber: profile.phoneNumber,
                gender: profile.gender,
                dateOfBirth: profile.dateOfBirth,
                homeAddress: profile.homeAddress
            });
            // Update profile with returned data just in case
            setProfile(prev => ({ ...prev, ...data.user }));
        } catch (error) {
            console.error("Profile update failed");
        } finally {
            setSaving(false);
        }
    };

    const handlePasswordUpdate = async (e) => {
        e.preventDefault();
        if (passwordData.newPassword !== passwordData.confirmPassword) {
            // Note: Since we have the global toast interceptor, we might want to manually toast here
            // But let's just let the user see a quick manual alert or we import toast
            // For now, let's import toast to show validation errors
            const { toast } = await import('react-hot-toast');
            toast.error("New passwords do not match");
            return;
        }

        setSaving(true);
        try {
            await api.put('/user/password', {
                currentPassword: passwordData.currentPassword,
                newPassword: passwordData.newPassword
            });
            setPasswordData({ currentPassword: '', newPassword: '', confirmPassword: '' });
        } catch (error) {
            console.error("Password update failed");
        } finally {
            setSaving(false);
        }
    };

    if (loading) return <div className="p-10 text-center text-text-muted"><Loader2 className="animate-spin inline mr-2" /> Loading profile...</div>;

    return (
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {/* Left Column: System Info Card */}
            <div className="lg:col-span-1 space-y-8">
                <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} className="glass-card p-8 border border-border bg-surface text-center">
                    <div className="w-24 h-24 mx-auto bg-primary/10 text-primary rounded-full flex items-center justify-center mb-4 border-4 border-background">
                        <User size={48} />
                    </div>
                    <h2 className="text-xl font-bold text-text">{profile.firstName} {profile.lastName}</h2>
                    <p className="text-sm font-bold text-primary uppercase tracking-widest mt-1 mb-4">{profile.Role?.name || 'User'}</p>
                    
                    <div className="flex items-center justify-center gap-2 text-xs text-text-muted bg-background py-2 px-4 rounded-lg">
                        <Mail size={14} />
                        <span>{profile.email}</span>
                    </div>
                    
                    <div className="mt-6 pt-6 border-t border-border/50 flex items-center justify-center gap-2 text-xs text-text-muted">
                        <Shield size={14} />
                        <span>System ID: <span className="font-bold text-text">{profile.systemId || profile.uuid?.split('-')[0].toUpperCase()}</span></span>
                    </div>
                </motion.div>
            </div>

            {/* Right Column: Edit Forms */}
            <div className="lg:col-span-2 space-y-8">
                
                {/* Profile Details Form */}
                <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.1 }} className="glass-card border border-border bg-surface overflow-hidden">
                    <div className="p-6 border-b border-border bg-background/50 flex items-center gap-3">
                        <Edit2 size={20} className="text-primary" />
                        <h3 className="font-bold text-text">Personal Details</h3>
                    </div>
                    <form onSubmit={handleProfileUpdate} className="p-6 space-y-4">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">First Name</label>
                                <input type="text" required className="input-field" value={profile.firstName} onChange={e => setProfile({...profile, firstName: e.target.value})} />
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Last Name</label>
                                <input type="text" required className="input-field" value={profile.lastName} onChange={e => setProfile({...profile, lastName: e.target.value})} />
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Other Names</label>
                                <input type="text" className="input-field" value={profile.otherNames} onChange={e => setProfile({...profile, otherNames: e.target.value})} />
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Phone Number</label>
                                <div className="relative">
                                    <Phone size={16} className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted" />
                                    <input type="tel" className="input-field pl-10" value={profile.phoneNumber} onChange={e => setProfile({...profile, phoneNumber: e.target.value})} />
                                </div>
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Gender</label>
                                <select className="input-field" value={profile.gender} onChange={e => setProfile({...profile, gender: e.target.value})}>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Date of Birth</label>
                                <div className="relative">
                                    <Calendar size={16} className="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted" />
                                    <input type="date" className="input-field pl-10" value={profile.dateOfBirth} onChange={e => setProfile({...profile, dateOfBirth: e.target.value})} />
                                </div>
                            </div>
                            <div className="md:col-span-2">
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Home Address</label>
                                <div className="relative">
                                    <MapPin size={16} className="absolute left-4 top-4 text-text-muted" />
                                    <textarea className="input-field pl-10 py-3" rows="3" value={profile.homeAddress} onChange={e => setProfile({...profile, homeAddress: e.target.value})}></textarea>
                                </div>
                            </div>
                        </div>
                        <div className="flex justify-end pt-4">
                            <button type="submit" disabled={saving} className="btn btn-primary py-2 px-6 flex items-center gap-2">
                                {saving ? <Loader2 size={18} className="animate-spin" /> : <Save size={18} />}
                                Save Changes
                            </button>
                        </div>
                    </form>
                </motion.div>

                {/* Password Change Form */}
                <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.2 }} className="glass-card border border-border bg-surface overflow-hidden">
                    <div className="p-6 border-b border-border bg-background/50 flex items-center gap-3">
                        <Key size={20} className="text-primary" />
                        <h3 className="font-bold text-text">Change Password</h3>
                    </div>
                    <form onSubmit={handlePasswordUpdate} className="p-6 space-y-4">
                        <div>
                            <label className="block text-xs font-bold text-text-muted uppercase mb-2">Current Password</label>
                            <input type="password" required className="input-field" value={passwordData.currentPassword} onChange={e => setPasswordData({...passwordData, currentPassword: e.target.value})} />
                        </div>
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">New Password</label>
                                <input type="password" required className="input-field" minLength={6} value={passwordData.newPassword} onChange={e => setPasswordData({...passwordData, newPassword: e.target.value})} />
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Confirm New Password</label>
                                <input type="password" required className="input-field" minLength={6} value={passwordData.confirmPassword} onChange={e => setPasswordData({...passwordData, confirmPassword: e.target.value})} />
                            </div>
                        </div>
                        <div className="flex justify-end pt-4">
                            <button type="submit" disabled={saving} className="btn bg-surface border border-border py-2 px-6 hover:bg-surface-hover hover:text-primary transition-colors font-bold flex items-center gap-2">
                                Update Password
                            </button>
                        </div>
                    </form>
                </motion.div>

            </div>
        </div>
    );
};

export default UserProfile;
