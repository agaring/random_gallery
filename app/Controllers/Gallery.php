<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Comment_model;
use App\Models\Image_model;

class Gallery extends Controller
{
    public function index()
    {
        // Instanciation du modèle
        $objCommentModel       = new Comment_model();
        $objImageModel         = new Image_model();
        // On fournit les variables pour la vue
        $data['title']          = "Gallery"; // titre
        $data['arrComments']    = $objCommentModel->findAll(); 
        $data['arrImages']      = $objImageModel->findall();
        // Affichage de la vue
        echo view('gallery_view',$data);


    }
}