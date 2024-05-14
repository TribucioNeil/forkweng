<?php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table            = 'jobseekerlanguage';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jobseekerId','EnglishRead', 'EnglishWrite', 'EnglishSpeak', 'EnglishUnderstand', 'FilipinoRead', 'FilipinoWrite', 'FilipinoSpeak', 'FilipinoUnderstand', 'OthersLanguage', 'OthersRead', 'OthersWrite', 'OthersSpeak', 'OthersUnderstand', ];

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
