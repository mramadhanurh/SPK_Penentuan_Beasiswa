<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Calon extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'calon',
            'page' => 'v_calon',
        ];
        return view('v_template', $data);
    }
}
