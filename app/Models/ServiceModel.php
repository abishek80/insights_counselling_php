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
        'benefits_intro',
        'symptoms',
        'symptoms_intro',
        'types_help',
        'types_intro',
        'approach',
        'approach_intro',
        'why_choose',
        'why_choose_intro',
        'when_seek_help',
        'when_seek_outro',
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
