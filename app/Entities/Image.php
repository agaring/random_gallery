<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * Entity representing an image
 *
 * @property int $id
 * @property int $category
 * @property string $path_to_image
 */
class Image extends Entity
{
    protected $casts = [
        'id' => 'integer',
        'category' => 'integer',
    ];

}