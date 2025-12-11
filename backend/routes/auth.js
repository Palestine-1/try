import express from 'express';
import bcrypt from 'bcryptjs';
import jwt from 'jsonwebtoken';
import { body, validationResult } from 'express-validator';
import { supabase } from '../config/supabase.js';
import multer from 'multer';
import path from 'path';

const router = express.Router();

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, 'uploads/');
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + path.extname(file.originalname));
  }
});

const upload = multer({
  storage,
  limits: { fileSize: 2 * 1024 * 1024 },
  fileFilter: (req, file, cb) => {
    const allowedTypes = /jpeg|jpg|png|pdf/;
    const extname = allowedTypes.test(path.extname(file.originalname).toLowerCase());
    const mimetype = allowedTypes.test(file.mimetype);

    if (mimetype && extname) {
      return cb(null, true);
    }
    cb(new Error('Invalid file type. Only JPEG, PNG and PDF allowed.'));
  }
});

router.post('/register', upload.single('file'), [
  body('name').trim().isLength({ min: 4, max: 255 }).withMessage('Name must be between 4 and 255 characters'),
  body('email').isEmail().normalizeEmail().withMessage('Invalid email address'),
  body('password').isLength({ min: 8 }).withMessage('Password must be at least 8 characters'),
  body('phone_number').trim().isLength({ max: 20 }).withMessage('Phone number too long'),
  body('address').trim().notEmpty().withMessage('Address is required'),
  body('gender').isIn(['male', 'female']).withMessage('Gender must be male or female'),
  body('national_id').isLength({ min: 14, max: 14 }).isNumeric().withMessage('National ID must be exactly 14 digits'),
  body('birth_date').isDate().withMessage('Invalid birth date')
], async (req, res) => {
  try {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }

    const { name, email, password, phone_number, address, gender, national_id, birth_date } = req.body;

    const { data: existingUser } = await supabase
      .from('users')
      .select('id')
      .or(`email.eq.${email},national_id.eq.${national_id}`)
      .maybeSingle();

    if (existingUser) {
      return res.status(400).json({ error: 'Email or National ID already exists' });
    }

    const hashedPassword = await bcrypt.hash(password, 10);
    const filePath = req.file ? `/uploads/${req.file.filename}` : null;

    const { data: userData, error: userError } = await supabase
      .from('users')
      .insert({
        name,
        email,
        password: hashedPassword,
        phone_number,
        address,
        file: filePath,
        gender,
        national_id,
        birth_date
      })
      .select()
      .single();

    if (userError) {
      return res.status(400).json({ error: userError.message });
    }

    const token = jwt.sign(
      { id: userData.id, email: userData.email, national_id: userData.national_id },
      process.env.JWT_SECRET,
      { expiresIn: '7d' }
    );

    res.status(201).json({
      message: 'User registered successfully',
      token,
      user: {
        id: userData.id,
        name: userData.name,
        email: userData.email,
        national_id: userData.national_id
      }
    });
  } catch (error) {
    console.error('Registration error:', error);
    res.status(500).json({ error: 'Registration failed' });
  }
});

router.post('/login', [
  body('email').isEmail().normalizeEmail().withMessage('Invalid email'),
  body('password').notEmpty().withMessage('Password is required')
], async (req, res) => {
  try {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }

    const { email, password } = req.body;

    const { data: userData, error: queryError } = await supabase
      .from('users')
      .select('id, name, email, password, national_id')
      .eq('email', email)
      .maybeSingle();

    if (queryError || !userData) {
      return res.status(401).json({ error: 'Invalid credentials' });
    }

    const passwordMatch = await bcrypt.compare(password, userData.password);

    if (!passwordMatch) {
      return res.status(401).json({ error: 'Invalid credentials' });
    }

    const token = jwt.sign(
      { id: userData.id, email: userData.email, national_id: userData.national_id },
      process.env.JWT_SECRET,
      { expiresIn: '7d' }
    );

    res.json({
      message: 'Login successful',
      token,
      user: {
        id: userData.id,
        name: userData.name,
        email: userData.email,
        national_id: userData.national_id
      }
    });
  } catch (error) {
    console.error('Login error:', error);
    res.status(500).json({ error: 'Login failed' });
  }
});

export default router;
