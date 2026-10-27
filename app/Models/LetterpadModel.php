<?php

namespace App\Models;

use CodeIgniter\Model;

class LetterpadModel extends Model
{
    protected $table            = 'letterpads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'to_name',
        'designation',
        'location',
        'regards_name',
        'regards_role',
        'provider_name',
        'provider_designation',
        'regards_closing',
        'description',
        'reference_no',
        'letter_date'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
