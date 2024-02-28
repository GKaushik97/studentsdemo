<?php
/**
 * Api RestFUll
 */
namespace App\Controllers;
use App\Models\Student_model;
use CodeIgniter\API\ResponseTrait;
class Api extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		$this->student = new Student_model;
	}
	public function index()
	{
		$data = array(
			'name' => 'kaushik',
			'Age' => 20,
			'location' => 'Hyderabad',
			'City' => 'Telangana',
		);
		$student_info = $this->student->find();
		return $this->respond($student_info);
	}

	public function getDetails()
	{
		$info_data = array(
			1 => array(
				'name' => 'BENZ',
				'Model' => '2023',
				'color' => 'BLACK',
				'plateno' => $this->generateOtp(),
			),
			2 => array(
				'name' => 'BMW',
				'Model' => '2024',
				'color' => 'GREY',
				'plateno' => $this->generateOtp(),
			),
		);
		return $this->respond($info_data);
	}
	public function generateOtp()
	{
		$otp = '';
		for($i =1 ; $i <=6; $i++) {
			$otp.= mt_rand(1,9);
		}
		return $otp;
	}
}