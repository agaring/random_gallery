<?php

namespace App\Models;

use App\Entities\Api;
use CodeIgniter\Model;

/**
 * Model of random Images Api
 */
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

    /**
     * Get a random image API from a short name
     * @param string $short_name Short name of API
     * @return ?Api A random images API
     * @noinspection PhpIncompatibleReturnTypeInspection
     */
    public function getFirstByShortName(string $short_name): ?Api
    {
        return $this->where('short_name', $short_name)->first();
    }
}
