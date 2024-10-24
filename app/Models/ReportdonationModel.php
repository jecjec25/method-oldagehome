<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportdonationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reportdonation';
    protected $primaryKey       = 'donation_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['date', 'donor_name', 'donation_type', 'amount', 'project_supported'];

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

    public function index()
    {
        $model = new ReportdonationModel();
        $data['donations'] = $model->findAll();

        return view('donations_chart', $data);
    }
}
