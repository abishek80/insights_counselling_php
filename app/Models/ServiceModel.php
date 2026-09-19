<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'sub_title',
        'slug',
        'meta_title',
        'meta_description',
        'short_description',
        'long_description',
        'what_is_section',
        'benefits',
        'symptoms',
        'types_help',
        'approach',
        'why_choose',
        'when_seek_help',
        'image',
        'secondary_image',
        'cta',
        'icon',
        'price',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
