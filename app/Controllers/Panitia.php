<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Panitia extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'panitia',
            'page' => 'v_panitia',
        ];
        return view('v_template', $data);
    }
}
