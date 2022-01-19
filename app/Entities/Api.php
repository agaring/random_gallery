<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Config\Services;

/**
 * @property int $id
 * @property int $category
 * @property string $short_name
 * @property string $api_name
 * @property string $request_url
 * @property string $data_selector
 */
class Api extends Entity
{
    protected $casts = [
        'id' => 'integer',
        'category' => 'integer',
    ];
}