<?php

namespace App\Models;

use CodeIgniter\Model;

class JobPreferenceModel extends Model
{
    protected $table            = 'jobseekerjobpre';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jobseekerId', 'PreferredOccu1', 'PreferredOccu2', 'PreferredOccu3', 'PreferredOccu4', 'PreferredLocation', 'PreferredLocCity1', 'PreferredLocCity2', 'PreferredLocCity3', 'PreferredLocOverseas1', 'PreferredLocOverseas2', 'PreferredLocOverseas3', 'ExpectedSalaryRange', 'PassportNo', 'ExpiryDate', ];

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
