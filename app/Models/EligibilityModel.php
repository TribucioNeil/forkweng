<?php

namespace App\Models;

use CodeIgniter\Model;

class EligibilityModel extends Model
{
    protected $table            = 'jobseekereligibility';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jobseekerId', 'EligibilityTitle1', 'EligibilityRating1', 'EligibilityDate1', 'EligibilityTitle2', 'EligibilityRating2', 'EligibilityDate2', 'LicenseTitle1', 'LicenseUntil1', 'LicenseTitle2', 'LicenseUntil2'];

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
