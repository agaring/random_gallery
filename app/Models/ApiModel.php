<?php

namespace App\Models;

use App\Entities\Api;
use CodeIgniter\Model;

class ApiModel extends Model
{
    protected $table = 'api';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = Api::class;

    protected $allowedFields = [
        'category', 'short_name', 'api_name', 'request_url', 'data_selector'
    ];

    protected $useSoftDeletes = false;

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getFirstByShortName(string $short_name): Api
    {
        return $this->where('short_name', $short_name)->first();
    }
}