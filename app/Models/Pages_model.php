<?php
/**
 * PagesModel
 */
namespace App\Models;

use CodeIgniter\Model;
class Pages_model extends Model
{
	protected $table = 'country';
	protected $allowedFields    = [
        'name',
        'code',
    ];
	protected $table1 = 'state';
	public function __construct()
	{
		parent::__construct();
		$this->db = \Config\Database::connect('default');

	}
	public function getStates()
	{
		return $this->db->table($this->table1)->get()->getResult();
	}
}

	/*
	public function getCountries()
	{
		$qry = $this->db->query("select * from country");
		return $qry->getResult();
	}
	public function getCars(){
		$cars = ['BMW','FORD','TATA','BENZ'];
		$grp1 = array(
			1=> array(
				'id'=>1,
				'name'=> 'MPC',
			),
			2=> array(
				'id' => 2,
				'name' => 'BiPC',
			),
		);
		return $grp1;
	}

	public function getList(){
		$games = [
			1=>[
				'id'=>1,
				'name'=>'Pubg',
			],
			2=>[
				'id'=>2,
				'name'=>'GTA',
			],
		];
		foreach ($games as $key => $value) {
			$game[$value['id']] = $value['name'];
		}
		return $game;
	}
}*/