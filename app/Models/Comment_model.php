<?php

namespace App\Models;
use CodeIgniter\Model;

class Comment_model extends Model
{
    // Nom de la table à utiliser
    protected $table         = 'comment';
    // Nom du champ de la clé primaire
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    // Champs utilisables
    protected $allowedFields = ['image_id', 'text'];

    // Type de retour => Chemin de l'entité à utiliser
    protected $returnType    = 'App\Entities\Comment';

    // Utilisation ou non des dates (création / modification)
    protected $useTimestamps = false;

}