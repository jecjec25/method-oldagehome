<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'acceptbooking';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['establishment','lastname', 'outcomes','description','amount_raised','acknowledgement','firstname', 'middlename', 'contactnum', 'event', 'prefferdate', 'Time', 'equipment', 'comments', 'status', 'usersignsId' ];

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


    public function isAvailable($startDate, $endDate)
    {
        // Check if there are any overlapping reservations
        $query = $this->where("prefferdate BETWEEN '$startDate' AND '$endDate'")
                      ->orWhere("alterdate BETWEEN '$startDate' AND '$endDate'")
                      ->countAllResults();

        return $query == 0; // If count is 0, dates are available
    }
}
