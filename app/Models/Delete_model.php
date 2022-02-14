<?php

namespace App\Models;
use CodeIgniter\Model;

class Delete_model extends Model
{
    // Nom de la table à utiliser
    protected $table         = 'comment';
    // Nom du champ de la clé primaire
    protected $primaryKey    = 'id';
    // Champs utilisables
    protected $allowedFields = ['image_id', 'text'];

    // Type de retour => Chemin de l'entité à utiliser
    protected $returnType    = 'App\Entities\Comment_entity';

    // Utilisation ou non des dates (création / modification)
    protected $useTimestamps = false;

    function delete_comment($id){
        $this->rg_db->where('id', $id);
        $this->rg_db->delete('comment');
    }
}


?>