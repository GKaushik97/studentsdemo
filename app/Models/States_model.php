<?php
namespace App\Models;
use CodeIgniter\Model;
class States_model extends Model
{
    protected $table = 'state';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = [
    	'name',
    	'code',
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
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function getCountries()
    {
    	return $this->db->table('country')->get()->getResult();
    }
    public function getStateCountries()
    {
    	return $this->db->table('state')->select('state.name as state_name,country.name')->join('country','country.id=state.id')->get()->getResult();
    }
    public function countryInsert($data)
    {
    	return $this->db->table('country')->insert($data);
    }
    public function courseInsert($data)
    {
    	return $this->db->table('course')->insert($data);
    }
    public function stateInsert($data)
    {
    	return $this->db->table('state')->insert($data);
    }
}