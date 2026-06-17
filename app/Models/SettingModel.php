<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'phone',
        'email',
        'address_kovur',
        'address_porur',
        'address_ashok_nagar',
        'facebook',
        'instagram',
        'youtube',
        'whatsapp',
        'booking_url'
    ];

    // Dates
    protected $useTimestamps = false; // settings table only has updated_at timestamp managed by MySQL
}
