<?php
namespace App\Models;
use CodeIgniter\Model;
class Country_model extends Model
{
    protected $table = 'country';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = [
    	'name',
    	'code',
        'image',
    	'added_at'
    ];
     // Dates
    /*protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'added_at';*/
    // Validation
    protected $validationRules = [
        'name'     => 'required|max_length[30]|alpha_numeric_space|min_length[3]',
        'code'        => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        parent::__construct();
    }
}