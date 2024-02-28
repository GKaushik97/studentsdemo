<?php
namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Pages_model;
use CodeIgniter\HTTP\Request;
class Pages extends BaseController
{
    public function __construct(){
        $this->car = new Pages_model;

    }
	public function index(): string
    {
        return view('page');
    }

    public function viewPage()
    {
        $std1 = $this->car->getStates();
        $data['states'] = json_decode(json_encode($std1),true);

    	if(is_file(APPPATH."Views/page.php")){
            $a = ["Apple",'Banana','Grapes','orange'];
            $data['cars'] = $this->car->find();
            print "<pre>";print_r($data['cars']);print "</pre>";
            print "<pre>";print_r($data['states']);print "</pre>";
    		return view('page',$data);
    	}else{
    		throw new PageNotFoundException;
    	}
    }
    public function details()
    {
        // $car = new Pages_model;
        $c = $this->car->getCars();
        $d = $this->Pages_model->getList();
        $a = ["Apple",'Banana','Grapes','orange'];
        print "<pre>";print_r($d);print "</pre>";
        return view('page1');
    }
}
?>