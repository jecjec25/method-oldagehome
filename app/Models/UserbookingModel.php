<?php

namespace App\Models;

use CodeIgniter\Model;

class UserbookingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'userbooking';
    protected $primaryKey       = 'bookingId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lastname', 'firstname', 'middlename', 'contactnum', 'status', 'event', 'prefferdate', 'alterdate', 'equipment', 'comments','usersignsId', 'description', 'amount_raised', 'outcomes', 'acknowledgements'];

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