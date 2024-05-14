<?php

namespace App\Models;

use CodeIgniter\Model;

class OthersSkillsModel extends Model
{
    protected $table            = 'jobseekerskills';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jobseekerId', 'AutoMechanic', 'Beautician', 'CarpentryWork', 'ComputerLiterate', 'DomesticChores', 'Driver', 'Electrician', 'Embroidery', 'Gardening', 'Masonry', 'PainterArtist', 'PaintingJobs', 'Photography', 'Plumbing', 'SewingDresses', 'Stenography', 'Tailoring', 'OthersSkill'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
