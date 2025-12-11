import express from 'express';
import { supabase } from '../config/supabase.js';
import { authMiddleware } from '../middleware/auth.js';

const router = express.Router();

router.get('/birth-certificate/search', authMiddleware, async (req, res) => {
  try {
    const { national_id } = req.query;

    if (!national_id) {
      return res.status(400).json({ error: 'National ID is required' });
    }

    if (national_id !== req.user.national_id) {
      return res.status(403).json({ error: 'You can only search for your own national ID' });
    }

    const { data: certificate, error } = await supabase
      .from('users')
      .select('name, national_id, birth_date, gender, address')
      .eq('national_id', national_id)
      .maybeSingle();

    if (error || !certificate) {
      return res.status(404).json({ error: 'No record found with this national ID' });
    }

    res.json({ certificate });
  } catch (error) {
    console.error('Birth certificate search error:', error);
    res.status(500).json({ error: 'Search failed' });
  }
});

router.get('/national-id/search', authMiddleware, async (req, res) => {
  try {
    const { national_id } = req.query;

    if (!national_id) {
      return res.status(400).json({ error: 'National ID is required' });
    }

    if (national_id !== req.user.national_id) {
      return res.status(403).json({ error: 'You can only search for your own national ID' });
    }

    const { data: idCard, error } = await supabase
      .from('users')
      .select('name, national_id, birth_date, gender, address')
      .eq('national_id', national_id)
      .maybeSingle();

    if (error || !idCard) {
      return res.status(404).json({ error: 'No record found with this national ID' });
    }

    res.json({ idCard });
  } catch (error) {
    console.error('National ID search error:', error);
    res.status(500).json({ error: 'Search failed' });
  }
});

export default router;
