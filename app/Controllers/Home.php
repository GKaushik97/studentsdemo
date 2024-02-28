<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function pages($a = "Rohit"): string
    {
        $data['as'] = $a;
        return view('page',$data);
    }

    public function cricket() {
        echo "My favourite Sport is Cricket";
    }
}
