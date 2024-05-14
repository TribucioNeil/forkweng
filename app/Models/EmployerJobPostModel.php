<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployerJobPostModel extends Model
{
    protected $table            = 'employerjobpost';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['employerId', 'jobTitle', 'workLocation', 'barangay', 'city', 'province', 'lat', 'lng', 'educBackground', 'jobOption', 'salary', 'jobDescription', 'jobQualification', 'remarks', 'postedDate', 'vaccination', 'sss', 'pagibig', 'philhealth', 'tin', 'otherrequirement', 'otherrequirements', 'job_status'];

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
