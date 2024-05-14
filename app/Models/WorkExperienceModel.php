<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkExperienceModel extends Model
{
    protected $table            = 'jobseekerworkexp';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jobseekerId', 'CompanyName1', 'CompanyAddress1', 'CompanyPosition1', 'CompanyDates1', 'CompanyStatus1', 'CompanyName2', 'CompanyAddress2', 'CompanyPosition2', 'CompanyDates2', 'CompanyStatus2', 'CompanyName3', 'CompanyAddress3', 'CompanyPosition3', 'CompanyDates3', 'CompanyStatus3', 'CompanyName4', 'CompanyAddress4', 'CompanyPosition4', 'CompanyDates4', 'CompanyStatus4', 'CompanyName5', 'CompanyAddress5', 'CompanyPosition5', 'CompanyDates5', 'CompanyStatus5', ];

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
