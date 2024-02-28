<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\States_model;
class States extends BaseController
{
    public function __construct()
    {
        $this->state = new States_model;
        helper('form');
    }
    public function index()
    {
        $limit = 10;
        $page_no = 1;
        $offset = ($page_no - 1)*$limit;
        $data['states'] = $this->state->findAll($limit,$offset);
        $data['trecords'] = $this->state->countAllResults();
        $data['params'] = array(
            'rows' => $limit,
            'page' => $page_no,
            'offset' => $offset,
        );
        $data = array(
            'title' => 'States',
            'layout' => 1,
            'page_title' => 'States',
            'content' => view("state/home",$data),
            'js' => [],
            'css' => [],
        );
        return view('template/default', $data);
        /*$data['params'] = array(
            'page_title' => "The States And Countries",
            'page_heading' => "States List",
            'rows' => $limit,
            'page' => $page_no,
            'offset' => $offset,
        );*/
        // print_r($data['params']);
        
        // return view('state/home',$data);

    }
    public function indexBody()
    {
        $limit = 10;
        $page_no = $this->request->getGet('page');
        $offset = ($page_no - 1)*$limit;
        $data['params'] = array(
            'page_title' => "The States And Countries",
            'page_heading' => "States List",
            'rows' => $limit,
            'page' => $page_no,
            'offset' => $offset,
        );

         print_r($data['params']);
        $data['states'] = $this->state->findAll($limit,$offset);
        echo $this->state->getLastQuery();
        $data['trecords'] = $this->state->countAllResults();
        return view('state/state',$data);
    }
    public function getStates()
    {
        $states = $this->state->findAll();
        $countries = $this->state->getStateCountries();
        print "<pre>";
        echo SITE_URL;
        print_r($countries);
    }

    public function stateAdd()
    {
        return view('state/state_add');
    }


    public function stateInsert()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'code' => $this->request->getVar('code'),
            'added_at' => date('Y-m-d')
        ];
        $validation = \config\Services::validation();
        $rules = [
            'name'=>'required',
            'code'=>'required',
        ];
        $check = $this->validate($rules);
        if(!$check){
            $data['errors'] = $validation->getErrors();
            return view('state/state_add',$data);
        }else{
            if($this->request->getMethod() == 'post'){
                $insert = $this->state->insert($data);
                echo $this->state->getLastQuery();
                if($insert){
                    return redirect()->to('http://localhost/ci4/public/states')->with('status','Record Inserted Successfully');
                }else {
                    echo "Not Inserted";
                }
            }else {
                echo "The Method not Accepted";
            }
        }
    }

    public function stateEdit()
    {
        $id = $this->request->getGet('id');
        $data['stateupdate'] = $this->state->find($id);
        echo $this->state->getLastQuery();
        return view('state/state_upate',$data);
    }


    public function stateUpdate()
    {
        $id = $this->request->getPost('id');
        $data = [
            'name' => 'Kolkata',
            'code' => '123',
            'added_at' => date('Y-m-d')
        ];
        if($this->request->getMethod() == 'post'){
            $update = $this->state->update($id,$data);
            echo $this->state->getLastQuery();
            if($update){
                return redirect()->to('http://localhost/ci4/public/states')->with('status','Record Updated Successfully');
            }else {
                echo "Not Updated";
            }
        }else {
            echo "The Method not Accepted";
        }
    }

    public function countryAdd()
    {
        return view('state/country_add');
    }
}