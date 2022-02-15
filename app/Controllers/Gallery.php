<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Comment_model;
use App\Models\Image_model;
use App\Models\Delete_model;


class Gallery extends BaseController
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

    public function delete($id = 0)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('comment');
        $builder->delete(['id' => $id]);
        
        $this->index();
    }

    public function next($page, $lastId){
        $this->index(null, $lastId, $page);
    }

    public function previous($page, $firstId){
        $this->index($firstId, null, $page);
    }

    public function add(){
        //insertion dans la bdd
        $db = \Config\Database::connect();
        $builder = $db->table('comment');

        $imageId = $this->request->getPost('imageId');
        $comment = $this->request->getPost('comment'); 

        $data = [
            'image_id'  => $imageId,
            'text'  => $comment,
        ];


        $builder->insert($data);

        $this->index();
    }


}