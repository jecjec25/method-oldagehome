<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tblscdetails';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['slipId', 'lastname', 'firstname', 'middlename', 'nickname', 'DateBirth', 'gender', 'marital_stat', 'ContNum', 'ComAdd', 'ProfPic','EmergencyAdd','EmergencyContNum', 'RegDate', 'scstatus', 'departuredate', 'reasonleft', 'datedeath', 'InputedDate', 'causedeath', 'adminId'];

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

    public function getGenderDistribution()
    {
        return $this->select('gender, COUNT(*) AS count')
            ->groupBy('gender')
            ->orderBy('gender')
            ->findAll();
    }
}

