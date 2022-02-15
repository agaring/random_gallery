<?php

namespace App\Controllers;

use App\Entities\Image;
use App\Models\ApiModel;
use App\Models\Image_model;

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

        return view('api/list', [
            'title' => 'Liste des Apis',
            'arrApi' => $arrApi
        ]);
    }

    /**
     * Test an api
     *
     * @param $apiShortname string
     * @return string
     */
    public function test(string $apiShortname, int $nb = 5): string
    {
        $api = (new ApiModel())->getFirstByShortName($apiShortname);
        $imageLinks = [];

        if (isset($api)) {
            $imageLinks = $api->getImageLinks($nb);
        }

        return view('api/test', [
            'api' => $api,
            'imageLinks' => $imageLinks,
        ]);
    }
}
