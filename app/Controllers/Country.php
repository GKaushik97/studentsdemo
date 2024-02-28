<?php
/**
 * Country Controller
 */
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Country_model;
use CodeIgniter\HTTP\Files\UploadedFile;
class Country extends BaseController
{
	public function __construct()
	{
		$this->country = new Country_model;
        helper('form');
	}
	public function index()
	{
		$data['countries'] = $this->country->findAll();
		return view('state/country',$data);
		// print "<pre>";print_r($data['countries']);
	}

	public function add()
	{
		return view('state/add');
	}
	public function countryInsert()
	{
		$validation = \config\Services::validation();
	    $rules = [
	        'name'=>'required|min_length[6]',
	        'code'=>'required',
	        'image' =>[
	        	'rules'=>[
	        		'is_image[image]',
	        		'max_size[image,1024]',
	        	],
	        ],
	    ];
	    $check = $this->validate($rules);
	    if(!$check){
	    	$data['errors'] = $validation->getErrors();
	    	return view('state/add',$data);
	    }else{
		    if($this->request->getMethod() == 'post'){
		    	$file = $this->request->getFile('image');
		    	if($file->isValid() && ! $file->hasMoved()){
		    		$imageName = $file->getRandomName();
		    		$file->move('public/images/',$imageName);
		    	}
		    	$insert_data = [
		    	    'name' => $this->request->getVar('name'),
		    	    'code' => $this->request->getVar('code'),
		    	    'image' => $imageName,
		    	    'document' => $file->getName('document'),
		    	    'added_at' => date('Y-m-d'),
		    	];
		    	/*Print "<pre>"; print_r($insert_data); print "</pre>";
		    	Print "<pre>"; print_r($file); print "</pre>";
		    	Print "<pre>"; print_r($_FILES); print "</pre>";
		    	exit();*/
		    	$insert = $this->country->insert($insert_data);
		    	// echo $this->country->getLastQuery();exit();
		    	if($insert){
		    		return redirect()->to('http://localhost/ci4/public/country')->with('status','Country Inserted Successfully');
		    	}else{
		    		echo "Not Inserted";
		    	}    
		    }else {
		    	echo "No Method Found";
		    }
		}
	}
}

