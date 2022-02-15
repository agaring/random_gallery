<?php

namespace App\Controllers;

use App\Models\ApiModel;

/**
 * Api controller
 */
class Api extends BaseController
{
    /**
     * Return a table of all API in project
     */
    public function index(): string
    {
        $arrApi = (new ApiModel())->findAll();

        return view('api/api_list', [
            'title' => 'Liste des Apis',
            'arrApi' => $arrApi
        ]);
    }
}
