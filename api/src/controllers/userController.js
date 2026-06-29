const { User, Role } = require('../models');

// @desc    Get user profile
// @route   GET /api/user/profile
// @access  Private
const getProfile = async (req, res) => {
    try {
        const user = await User.findByPk(req.user.id, {
            attributes: { exclude: ['password'] },
            include: [{ model: Role, attributes: ['name'] }]
        });

        if (!user) {
            return res.status(404).json({ message: 'User not found' });
        }

        res.json(user);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

// @desc    Update user profile
// @route   PUT /api/user/profile
// @access  Private
const updateProfile = async (req, res) => {
    try {
        const user = await User.findByPk(req.user.id);

        if (!user) {
            return res.status(404).json({ message: 'User not found' });
        }

        // Only allow updating specific fields
        const updatableFields = ['firstName', 'lastName', 'otherNames', 'phoneNumber', 'gender', 'dateOfBirth', 'placeOfBirth', 'religion', 'hometown', 'district', 'region', 'maritalStatus', 'languagesSpoken', 'homeAddress', 'postalAddress', 'guardianName', 'guardianAddress', 'guardianOccupation', 'guardianContact', 'ghanaPostGps'];

        updatableFields.forEach(field => {
            if (req.body[field] !== undefined) {
                if (['gender', 'maritalStatus', 'dateOfBirth'].includes(field) && req.body[field] === '') {
                    user[field] = null;
                } else {
                    user[field] = req.body[field];
                }
            }
        });

        await user.save();

        // Return updated user without password
        const updatedUser = await User.findByPk(req.user.id, {
            attributes: { exclude: ['password'] },
            include: [{ model: Role, attributes: ['name'] }]
        });

        res.json({ message: 'Profile updated successfully', user: updatedUser });
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

// @desc    Update user password
// @route   PUT /api/user/password
// @access  Private
const updatePassword = async (req, res) => {
    const { currentPassword, newPassword } = req.body;

    try {
        const user = await User.findByPk(req.user.id);

        if (!user) {
            return res.status(404).json({ message: 'User not found' });
        }

        // Check if current password matches
        const isMatch = await user.comparePassword(currentPassword);
        if (!isMatch) {
            return res.status(400).json({ message: 'Incorrect current password' });
        }

        // Update to new password
        user.password = newPassword;
        await user.save();

        res.json({ message: 'Password updated successfully' });
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

module.exports = {
    getProfile,
    updateProfile,
    updatePassword
};
