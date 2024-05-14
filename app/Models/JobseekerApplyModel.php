<?php

namespace App\Models;

use CodeIgniter\Model;

class JobseekerApplyModel extends Model
{
    protected $table            = 'jobseekerapplydata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['resume', 'jobseekerId', 'jobPostId', 'jobTitle', 'status', 'typeEmployment', 'salary', 'location', 'employerId', 'fullname', 'vaccination', 'sss', 'pagibig', 'philhealth', 'tin', 'otherrequirements'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dateApplied';
    protected $updatedField  = 'dateUpdated';
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
