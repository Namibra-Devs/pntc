const express = require('express');
const router = express.Router();
const { protect, authorize } = require('../middleware/authMiddleware');
const {
    getAllInvoices,
    createInvoice,
    recordManualPayment,
    getPurchasedVouchers,
    getVoucherOptions,
    createVoucherOption,
    updateVoucherOption,
    deleteVoucherOption
} = require('../controllers/financeController');

// Public route
router.get('/voucher-options', getVoucherOptions);

// Protected routes
router.use(protect);
router.use(authorize('accountant', 'admin'));

router.get('/invoices', getAllInvoices);
router.get('/vouchers', getPurchasedVouchers);
router.post('/invoices', createInvoice);
router.post('/payments', recordManualPayment);

// Voucher Options CRUD
router.post('/voucher-options', createVoucherOption);
router.put('/voucher-options/:id', updateVoucherOption);
router.delete('/voucher-options/:id', deleteVoucherOption);

module.exports = router;
