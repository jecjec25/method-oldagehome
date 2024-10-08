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
    protected $allowedFields    = ['establishment', 'lastname', 'firstname','Time', 'middlename', 'contactnum', 'status', 'event', 'prefferdate', 'Time', 'equipment', 'comments', 'usersignsId', 'description', 'amount_raised', 'outcomes', 'acknowledgement'];

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


    public function getDisabledDates()
    {
        // Fetch disabled dates from the 'reservations' table
        $query = $this->select('prefferdate')->distinct()->findAll();

        // Extract the dates from the query result
        $disabledDates = [];
        foreach ($query as $row) {
            $disabledDates[] = date('d-m-Y', strtotime($row['prefferdate']));
        }

        return $disabledDates;
    }


    public function getBookingsByMonth()
    {
        // // Log the query to debug
        // $sql = $this->select('YEAR(prefferdate) AS year, MONTH(prefferdate) AS month, COUNT(*) AS total_bookings')
        //     ->groupBy('YEAR(prefferdate), MONTH(prefferdate)')
        //     ->orderBy('YEAR(prefferdate)', 'ASC')
        //     ->orderBy('MONTH(prefferdate)', 'ASC')
        //     ->getCompiledSelect();
        // log_message('debug', 'SQL Query: ' . $sql);

        // Execute the query
        $result = $this->select('YEAR(prefferdate) AS year, MONTH(prefferdate) AS month, COUNT(*) AS total_bookings')
            ->groupBy('YEAR(prefferdate), MONTH(prefferdate)')
            ->orderBy('YEAR(prefferdate)', 'ASC')
            ->orderBy('MONTH(prefferdate)', 'ASC')
            ->findAll();

        // // Log the result to debug
        // log_message('debug', 'Query Result: ' . print_r($result, true));

        return $result;
    }


    public function getGenderDistribution()
    {
        return $this->select('gender, COUNT(*) AS count')
            ->groupBy('gender')
            ->orderBy('gender')
            ->findAll();
    }

}
