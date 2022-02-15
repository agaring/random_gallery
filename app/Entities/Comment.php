<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * Entity representing a comment
 * @property int $id
 * @property int $image_id
 * @property string $text
 */
class Comment extends Entity
{
    protected $casts = [
        'id' => 'integer',
        'image_id' => 'integer',
    ];

    public function __toString(): string
    {
        return 'Entity::Comment['. $this->id .']=\''. substr($this->text, 0, 10) .'\'';
    }


}