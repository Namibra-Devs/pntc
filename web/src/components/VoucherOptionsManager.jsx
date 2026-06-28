import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Edit2, Trash2, Plus, Loader2, Save, X, ToggleLeft, ToggleRight } from 'lucide-react';
import { motion, AnimatePresence } from 'framer-motion';
import { API_BASE_URL } from '../utils/api';
import api from '../utils/api'; // Using internal axios instance with interceptors

const VoucherOptionsManager = () => {
    const [options, setOptions] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');
    const [isEditing, setIsEditing] = useState(false);
    const [formData, setFormData] = useState({ id: null, type: '', description: '', price: '', isActive: true });
    const [optionToDelete, setOptionToDelete] = useState(null);

    useEffect(() => {
        fetchOptions();
    }, []);

    const fetchOptions = async () => {
        try {
            setLoading(true);
            const { data } = await api.get('/finance/voucher-options?all=true'); // Using internal api (protected) or public
            setOptions(data);
        } catch (err) {
            setError('Failed to fetch voucher options');
        } finally {
            setLoading(false);
        }
    };

    const handleSave = async (e) => {
        e.preventDefault();
        try {
            setError('');
            if (formData.id) {
                await api.put(`/finance/voucher-options/${formData.id}`, formData);
            } else {
                await api.post('/finance/voucher-options', formData);
            }
            fetchOptions();
            setIsEditing(false);
            setFormData({ id: null, type: '', description: '', price: '', isActive: true });
        } catch (err) {
            setError(err.response?.data?.message || 'Failed to save voucher option');
        }
    };

    const handleEdit = (opt) => {
        setFormData(opt);
        setIsEditing(true);
    };

    const handleDeleteClick = (opt) => {
        setOptionToDelete(opt);
    };

    const handleDeleteConfirm = async () => {
        if (!optionToDelete) return;
        try {
            await api.delete(`/finance/voucher-options/${optionToDelete.id}`);
            fetchOptions();
        } catch (err) {
            setError('Failed to delete option');
        } finally {
            setOptionToDelete(null);
        }
    };

    const handleToggleActive = async (opt) => {
        try {
            await api.put(`/finance/voucher-options/${opt.id}`, { ...opt, isActive: !opt.isActive });
            fetchOptions();
        } catch (err) {
            setError('Failed to toggle status');
        }
    };

    if (loading && options.length === 0) return <div className="p-10 text-center"><Loader2 className="animate-spin inline" /> Loading options...</div>;

    return (
        <div className="glass-card p-8 border-border bg-surface relative">
            <div className="flex justify-between items-center mb-6">
                <div>
                    <h3 className="font-bold text-lg uppercase tracking-wider font-heading text-text">Voucher Categories</h3>
                    <p className="text-xs text-text-muted mt-1 uppercase tracking-widest">Manage available voucher types and pricing</p>
                </div>
                {!isEditing && (
                    <button onClick={() => { setFormData({ id: null, type: '', description: '', price: '', isActive: true }); setIsEditing(true); }} className="btn btn-primary py-2 px-4 flex items-center gap-2 text-sm">
                        <Plus size={16} /> Add Category
                    </button>
                )}
            </div>

            {error && <div className="bg-red-500/10 text-red-500 border border-red-500/20 p-3 rounded-xl mb-4 text-sm font-bold">{error}</div>}

            <AnimatePresence mode="wait">
                {isEditing ? (
                    <motion.div initial={{ opacity: 0, height: 0 }} animate={{ opacity: 1, height: 'auto' }} exit={{ opacity: 0, height: 0 }} className="mb-8 border border-border p-6 rounded-xl bg-surface">
                        <h4 className="font-bold mb-4">{formData.id ? 'Edit Category' : 'New Category'}</h4>
                        <form onSubmit={handleSave} className="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Category Name (Type)</label>
                                <input required type="text" className="input-field" value={formData.type} onChange={(e) => setFormData({ ...formData, type: e.target.value })} placeholder="e.g. Undergraduate" />
                            </div>
                            <div>
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Price (GHS)</label>
                                <input required type="number" step="0.01" className="input-field" value={formData.price} onChange={(e) => setFormData({ ...formData, price: e.target.value })} placeholder="e.g. 150.00" />
                            </div>
                            <div className="md:col-span-2">
                                <label className="block text-xs font-bold text-text-muted uppercase mb-2">Description</label>
                                <input required type="text" className="input-field" value={formData.description} onChange={(e) => setFormData({ ...formData, description: e.target.value })} placeholder="e.g. For WASSCE/SSCE applicants" />
                            </div>
                            <div className="md:col-span-2 flex items-center gap-3">
                                <button type="button" onClick={() => setFormData({ ...formData, isActive: !formData.isActive })} className="text-primary hover:text-primary/80 transition-colors">
                                    {formData.isActive ? <ToggleRight size={32} /> : <ToggleLeft size={32} className="text-text-muted" />}
                                </button>
                                <span className="text-sm font-bold">{formData.isActive ? 'Active (Visible to applicants)' : 'Inactive (Hidden from purchase page)'}</span>
                            </div>
                            <div className="md:col-span-2 flex gap-3 mt-4">
                                <button type="submit" className="btn btn-primary py-2 px-6 flex items-center gap-2"><Save size={16} /> Save</button>
                                <button type="button" onClick={() => setIsEditing(false)} className="btn bg-surface border border-border py-2 px-6 flex items-center gap-2"><X size={16} /> Cancel</button>
                            </div>
                        </form>
                    </motion.div>
                ) : (
                    <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}>
                        <div className="overflow-x-auto">
                            <table className="w-full text-left">
                                <thead className="bg-surface border-b border-border">
                                    <tr>
                                        <th className="p-4 text-[10px] font-bold text-text-muted uppercase tracking-widest">Type</th>
                                        <th className="p-4 text-[10px] font-bold text-text-muted uppercase tracking-widest">Description</th>
                                        <th className="p-4 text-[10px] font-bold text-text-muted uppercase tracking-widest">Price</th>
                                        <th className="p-4 text-[10px] font-bold text-text-muted uppercase tracking-widest">Status</th>
                                        <th className="p-4 text-[10px] font-bold text-text-muted uppercase tracking-widest text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-border/50">
                                    {options.map(opt => (
                                        <tr key={opt.id} className="hover:bg-primary/5 transition-colors group">
                                            <td className="p-4 font-bold text-sm text-text">{opt.type}</td>
                                            <td className="p-4 text-xs text-text-muted">{opt.description}</td>
                                            <td className="p-4 text-sm font-black text-primary">GHS {parseFloat(opt.price).toLocaleString()}</td>
                                            <td className="p-4">
                                                <button onClick={() => handleToggleActive(opt)} className={`px-2 py-0.5 rounded-full text-[8px] font-black uppercase tracking-widest cursor-pointer ${opt.isActive ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 hover:bg-emerald-500/20' : 'bg-red-500/10 text-red-500 border border-red-500/20 hover:bg-red-500/20'}`}>
                                                    {opt.isActive ? 'Active' : 'Inactive'}
                                                </button>
                                            </td>
                                            <td className="p-4 text-right space-x-2">
                                                <button onClick={() => handleEdit(opt)} className="p-1.5 text-text-muted hover:text-primary hover:bg-primary/10 rounded-lg transition-colors"><Edit2 size={16} /></button>
                                                <button onClick={() => handleDeleteClick(opt)} className="p-1.5 text-text-muted hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-colors"><Trash2 size={16} /></button>
                                            </td>
                                        </tr>
                                    ))}
                                    {options.length === 0 && (
                                        <tr><td colSpan="5" className="p-8 text-center text-xs font-bold uppercase tracking-widest text-text-muted">No categories configured.</td></tr>
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>

            {/* Delete Confirmation Modal */}
            <AnimatePresence>
                {optionToDelete && (
                    <motion.div 
                        initial={{ opacity: 0 }} 
                        animate={{ opacity: 1 }} 
                        exit={{ opacity: 0 }} 
                        className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-background/80 backdrop-blur-sm"
                    >
                        <motion.div 
                            initial={{ scale: 0.95, opacity: 0 }} 
                            animate={{ scale: 1, opacity: 1 }} 
                            exit={{ scale: 0.95, opacity: 0 }}
                            className="glass-card p-8 border border-border bg-surface max-w-md w-full shadow-2xl"
                        >
                            <div className="w-16 h-16 bg-red-500/10 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                                <Trash2 size={32} />
                            </div>
                            <h3 className="text-xl font-bold text-center mb-2">Delete Category</h3>
                            <p className="text-sm text-text-muted text-center mb-8">
                                Are you absolutely sure you want to delete the <span className="font-bold text-text">{optionToDelete.type}</span> category? This action cannot be undone.
                            </p>
                            
                            <div className="flex gap-4">
                                <button 
                                    onClick={() => setOptionToDelete(null)} 
                                    className="btn bg-surface border border-border py-3 flex-1 font-bold text-text hover:bg-surface-hover transition-colors"
                                >
                                    Cancel
                                </button>
                                <button 
                                    onClick={handleDeleteConfirm} 
                                    className="btn bg-red-500 hover:bg-red-600 text-white py-3 flex-1 font-bold shadow-lg shadow-red-500/20 transition-all"
                                >
                                    Yes, Delete
                                </button>
                            </div>
                        </motion.div>
                    </motion.div>
                )}
            </AnimatePresence>
        </div>
    );
};

export default VoucherOptionsManager;
