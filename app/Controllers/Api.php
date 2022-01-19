<?php

namespace App\Controllers;

use App\Models\ApiModel;

class Api extends BaseController
{

    public function index()
    {
        echo view('api_view');
    }
}