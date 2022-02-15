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

    public function fillDb(string $apiShortname, ?int $nb = null)
    {
        $api = (new ApiModel())->getFirstByShortName($apiShortname);
        $imageLinks = [];

        if (isset($api) && isset($nb)) {
            $imageLinks = $api->getImageLinks($nb);

            $imageModel = new Image_model();
            foreach ($imageLinks as $imageLink) {
                $image = new Image();
                $image->category = $api->category;
                $image->path_to_image = $imageLink;
                try {
                    $imageModel->save($image);
                } catch (\ReflectionException $e) {
                    return view('api/error_fill_db', [
                        'api' => $api,
                        'title' => 'Erreur pendant la sauvergarde',
                        'message' => $e->getMessage(),
                    ]);
                }
            }
            return view('api/fill_db_result', [
                'imageLinks' => $imageLinks,
            ]);
        }
        return view('api/error_fill_db', [
            'title' => 'Pas d\'Api pour le nom donné',
            'message' => 'Aucune Api trouvé avec ce nom: '. $apiShortname,
        ]);
    }
}
