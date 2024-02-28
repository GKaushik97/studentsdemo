<?php

namespace App\Controllers;
use App\Models\Student_model;
use CodeIgniter\HTTP\Files\UploadedFile;

class Student extends BaseController
{
    public function __construct()
    {
        $this->student = new Student_model;
        helper('form');
    }

    public function index(): string
    {
        echo base_url();
        // echo $_SERVER['DOCUMENT_ROOT'].WEBROOT;exit;
        $data['students'] = $this->student->findAll();
        $course = $this->student->getCourses();
        $hobbi = $this->student->getHobbies();
        foreach($hobbi as $key => $hob) {
            $data['hobbies1'][$hob['id']] = $hob;
        }
        foreach ($course as $key => $value) {
            $data['courses'][$value['id']] = $value;
        }
        $data = array(
            'title' => 'Program',
            'layout' => 1,
            'page_title' => 'Students',
            'content' => view("student/student",$data),
            'js' => [],
            'css' => [],
        );
        return view('template/default', $data);
    }

    /**
     * To Add Student
     */ 
    public function addStudent()
    {
        $data['courses'] = $this->student->getCourses();
        $data['hobbies1'] = $this->student->getHobbies();
        // print_r($data['courses']); exit();
        return view('student/student_add',$data);
    }

    public function insertStudent()
    {
        if(isset($_POST['hobbies']) and !empty($_POST['hobbies'])){
            $data['imp_hobbies'] = implode(",",$_POST['hobbies']);
        }
        $validation = \config\Services::validation();
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'course' => 'required',
            'hobbies' => 'required',
            'document' =>[
                'rules'=>[
                    'uploaded[document]',
                    'is_image[document]',
                    'max_size[document,1024]',
                ],
            ],
        ];
        $check = $this->validate($rules);
        if(!$check){
            $data['errors'] = $validation->getErrors();
            $data['courses'] = $this->student->getCourses();
            $data['hobbies1'] = $this->student->getHobbies();
            return view('student/student_add',$data);
        }else{
            if($this->request->getMethod() == 'post' and $this->request->getVar(csrf_token()) === csrf_hash()) {
                $file = $this->request->getFile('document');
                if($file->isValid()){
                    $imgName = $file->getName();
                    $file->move('public/assets/documents/',$imgName);
                }
                $insert_data = array(
                    'name' => $this->request->getVar('name'),
                    'gender' => $this->request->getVar('gender'),
                    'course' => $this->request->getVar('course'),
                    'hobbies' => implode(',',$this->request->getVar('hobbies')),
                    'document' => $imgName,
                    'created_at' => date('Y-m-d H:i'),
                );
                $add = $this->student->insert($insert_data);
                if($add){
                    return redirect()->to('http://localhost/ci4/public/student')->with('status1','Record Inserted Successfully');
                }else{
                    echo "Data Not Inserted";
                }
            }else {
                echo "CSRF Token is Invalid";
            }
        }
    }

    //To edit the Student
    public function editStudent()
    {
        $id = $this->request->getGet('id');
        $data['courses'] = $this->student->getCourses();
        $data['hobbies'] = $this->student->getHobbies();
        $data['studentsedit'] = $this->student->find($id);
        return view('student/student_edit',$data);
    }

    //To send Email
    public function sendEmail()
    {

        $email = \Config\Services::email();

        // Email settings (you can also set these in the config file)
        $email->setFrom('gudakaushik@gmail.com', 'Guda Kaushik');
        $email->setTo('gudakaushik@gmail.com');
        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');
        if($email->send()){
            echo "Email Sent Successfully";
        }else {
            echo $email->printDebugger(['headers']);
        };
    }
}
