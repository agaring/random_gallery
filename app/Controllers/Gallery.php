<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Comment_model;
use App\Models\Image_model;
use App\Models\Delete_model;

class Gallery extends Controller
{

    public function index($firstId = null, $lastId = null, $page = 0)
    {
        // Instanciation du modèle
        $objCommentModel       = new Comment_model();
        $objImageModel         = new Image_model();
        // On fournit les variables pour la vue
        $data['title']          = "Gallery"; // titre
        $data['arrComments']    = $objCommentModel->findAll(); 
        $data['arrImages']      = $objImageModel->findall();

        $data['firstId']        = $firstId;
        $data['lastId']         = $lastId;
        $data['page']           = $page;

        // Affichage de la vue
        echo view('gallery_view',$data);
    }

    public function delete($id = 0, $page = 0, $firstId = null, $lastId = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('comment');
        $builder->delete(['id' => $id]);

        $this->index($firstId, $lastId, $page);
    }

    public function modify($id, $page, $firstid = null, $lastId = null)
    {
        
    }

    public function next($page, $lastId){
        $this->index(null, $lastId, $page);
    }

    public function previous($page, $firstId){
        $this->index($firstId, null, $page);
    }


}