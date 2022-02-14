<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Comment_model;
use App\Models\Image_model;
use App\Models\Delete_model;

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

        $data['firstId']        = null;
        $data['lastId']         = null;
        $data['page']           = 0;


        // Affichage de la vue
        echo view('gallery_view',$data);
    }

    public function delete($id, $page, $firstid)
    {
        $objDeleteModel = new Delete_model();
        $objDeleteModel->delete_student_id($id);
    }

    public function modify($id, $page, $firstid)
    {
        
    }

    public function next($page, $lastId){
        $objCommentModel       = new Comment_model();
        $objImageModel         = new Image_model();

        $data['title']          = "Gallery"; // titre
        $data['arrComments']    = $objCommentModel->findAll(); 
        $data['arrImages']      = $objImageModel->findall();

        $data['page']           = $page;
        $data['lastId']         = $lastId;


        echo view('gallery_view', $data);  
    }

    public function previous($page, $firstId){
        $objCommentModel       = new Comment_model();
        $objImageModel         = new Image_model();

        $data['title']          = "Gallery"; // titre
        $data['arrComments']    = $objCommentModel->findAll(); 
        $data['arrImages']      = $objImageModel->findall();

        $data['page']           = $page;
        $data['firstId']        = $firstId;
        $data['lastId']         = null ;


        echo view('gallery_view', $data);  
    }


}