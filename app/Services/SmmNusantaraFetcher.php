<?php

namespace App\Services;

use App\Models\Service;
use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SmmNusantaraFetcher
{
    protected $apiUrl;
    protected $apiId;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.smmnusantara.url');
        $this->apiId  = config('services.smmnusantara.api_id');
        $this->apiKey = config('services.smmnusantara.api_key');
    }

    public function fetchAndStoreServices()
    {
        $client = new Client();

        try {
            // Log Permintaan API
            Log::info('API Request:', [
                'url' => $this->apiUrl,
                'method' => 'POST',
                'params' => [
                    'api_id' => $this->apiId,
                    'api_key' => $this->apiKey,
                ],
            ]);

            $response = $client->request('POST', $this->apiUrl, [
                'form_params' => [
                    'api_id'  => $this->apiId,
                    'api_key' => $this->apiKey,
                ],
                'timeout' => 10,
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody(), true);

            // Log Respon API
            Log::info('API Response:', [
                'status_code' => $statusCode,
                'body'        => $body,
            ]);

            if ($statusCode === 200 && isset($body['status']) && $body['status'] === true) {
                foreach ($body['services'] as $serviceData) {
                    // Cek atau buat kategori
                    $category = Category::firstOrCreate(
                        ['name' => $serviceData['category']],
                        ['name' => $serviceData['category']]
                    );

                    // Simpan atau update data ke database
                    Service::updateOrCreate(
                        ['id' => $serviceData['id']], // Asumsi 'id' unik dari API
                        [
                            'name'        => $serviceData['name'],
                            'type'        => $serviceData['type'],
                            'category_id' => $category->id,
                            'price'       => $serviceData['price'],
                            'min'         => $serviceData['min'],
                            'max'         => $serviceData['max'],
                            'refill'      => $serviceData['refill'],
                            'description' => $serviceData['description'],
                        ]
                    );
                }

                return [
                    'status' => true,
                    'message' => 'Data layanan berhasil diambil dan disimpan.'
                ];
            } else {
                $errorMsg = $body['msg'] ?? 'Gagal mengambil data dari API.';
                return [
                    'status' => false,
                    'message' => $errorMsg
                ];
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // Error 4xx
            $response = $e->getResponse();
            $body     = json_decode($response->getBody(), true);
            $errorMsg = $body['msg'] ?? 'Terjadi kesalahan saat mengakses API.';

            Log::error('Client Error:', [
                'error_message' => $errorMsg,
            ]);

            return [
                'status' => false,
                'message' => 'Client Error: ' . $errorMsg
            ];
        } catch (\Exception $e) {
            // Error lainnya (timeout, dsb.)
            Log::error('Exception:', [
                'error_message' => $e->getMessage(),
            ]);

            return [
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];
        }
    }
}
