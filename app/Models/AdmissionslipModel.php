<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmissionslipModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adminsionsliptbl';
    protected $primaryKey       = 'slipId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['scId', 'casenum', 'birthplace', 'nameCom', 'addressCom', 'contactCom', 'RelationClient', 'nameRef',
                                    'addressRef', 'contactRef', 'Num1A', 'Num1D', 'Num2A', 'Num2D', 'Num3A', 'Num3D', 'Num4A', 'Num4D',
                                    'Num5A', 'Num5D', 'Num6A', 'Num6D', 'Num7A', 'Num7D', 'Num8A', 'Num8D', 'Num9A', 'Num9D', 'Num10A', 'Num10D', 
                                    'Num11A', 'Num11D', 'Num12A', 'Num12D', 'Num13A', 'Num13D', 'Num14A', 'Num14D', 'Num15A', 'Num15D', 
                                    'inventoriedby', 'turnoverto', 'receivedby', 'referringparty', 'socialworker'];

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
