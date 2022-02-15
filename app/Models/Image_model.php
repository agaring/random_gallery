<?php

namespace App\Models;
use CodeIgniter\Model;

class Image_model extends Model
{
    // Nom de la table à utiliser
    protected $table         = 'image';
    // Nom du champ de la clé primaire
    protected $primaryKey    = 'id';
    // Champs utilisables
    protected $allowedFields = ['category', 'path_to_image'];

    // Type de retour => Chemin de l'entité à utiliser
    protected $returnType    = 'App\Entities\Image';

    // Utilisation ou non des dates (création / modification)
    protected $useTimestamps = false;

}