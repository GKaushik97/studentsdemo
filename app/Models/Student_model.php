<?php
/**
 * Student Model
 */
namespace App\Models;
use CodeIgniter\Model;
class Student_model extends Model
{	
	protected $table = 'students';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $allowedFields = [
    	'name',
    	'gender',
    	'course',
    	'hobbies',
    	'document',
    	'created_at'
    ];
	
	public function __construct()
	{
		parent::__construct();
		$this->db = \Config\Database::connect('default');
	}

	public function getCourses()
	{
		return $this->db->table('course')->get()->getResultArray();
	}

	public function getHobbies()
	{
		return $this->db->table('hobbies')->get()->getResultArray();
	}
}