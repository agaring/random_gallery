<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\HTTP\CURLRequest;
use Config\Services;

/**
 * Entity used to communicate with a random images API
 * @property int $id
 * @property bool $enabled
 * @property int $category
 * @property string $short_name
 * @property string $api_name
 * @property string $request_url
 * @property string $data_selector
 *
 * @property CURLRequest $client
 */
class Api extends Entity
{
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'category' => 'integer',
    ];

    private CURLRequest $client;

    public function __construct()
    {
        $this->client = Services::curlrequest();
        parent::__construct();
    }

    public function __toString(): string
    {
        return 'Entity::Api = ' . $this->short_name . ' | ' . $this->api_name;
    }

    /**
     * Get *n* random image links
     * @param int $n Number of image
     * @return array|string|null Array of image links, null if n smaller or equal to 0
     */
    public function getImage(int $n = 1): array|string|null
    {
        if ($n === 1) {
            $response = $this->client->get('https://' . $this->request_url, ['timeout' => 3]);
            return json_decode($response->getBody())->{$this->data_selector};
        } elseif ($n > 1) {
            $arrData = [];
            $i = 0;
            while ($i < $n) {
                $arrData[] = $this->getImage();
                $i++;
            }
            return $arrData;
        }
        return null;
    }
}
