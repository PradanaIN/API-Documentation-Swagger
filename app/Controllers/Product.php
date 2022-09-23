<?php

namespace App\Models;

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="RESTful API Documentation", 
 * version="1.0", 
 * description="Web service adalah suatu metode komunikasi antar dua perangkat elektronik lewat world wide web. Web service membantu kita dalam mengkonversiaplikasi kita menjadi aplikasi berbasis web. Saat ini terdapat 2 macam web service yaitu web service yang menggunakan SOAP dan WSDL, dan web service yang menggunakan REST, atau lebih dikenal dengan RESTful web service.",
 * 
 * )
 */

class Product extends ResourceController
{
    use ResponseTrait;

    // all users
    /**
     * @OA\Get(
     *     path="/product",
     * 	   summary = "Get all product",
     * 	   tags = {"GET"},
     *     @OA\Response(response="200", description="Data is successfully retrieved")
     * )
     */
    public function index()
    {
        $model = new ProductModel();
        $data['produk'] = $model->orderBy('id', 'DESC')->findAll();

        return $this->respond($data);
    }

    // create
    /**
     * @OA\Post(
     *     path="/product",
     * 	   summary = "Add new product",
     * 		@OA\RequestBody(
     * 			@OA\MediaType(
     * 				mediaType = "application/x-www-form-urlencoded",
     * 				@OA\Schema(
     * 					@OA\Property(
     * 						property = "nama_produk",
     * 						type = "string"
     * 					),
     * 					@OA\Property(
     * 						property = "harga",
     * 						type = "integer"
     * 					)
     * 				)
     * 			)
     * 		),
     * 	   tags = {"POST"},
     *     @OA\Response(response="201", description="Data is successfully updated")
     * )
     */
    public function create()
    {
        $model = new ProductModel();
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
        ];

        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];

        return $this->respondCreated($response);
    }

    // single user
    /**
     * @OA\Get(
     *     path="/product/{Id}",
     * 	   summary = "Get product by Id",
     * 	   tags = {"GET"},
     * 		@OA\Parameter(
     * 			name = "Id",
     * 			in = "path",
     * 			required = true,
     * 			description = "The id will be passed to {Id} to get the certain product"
     * 		),
     *     @OA\Response(response="200", description="Data is successfully retrieved"),
     *     @OA\Response(response="404", description="Data not found")
     * )
     */
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->first();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    // update
    /**
     * @OA\Put(
     *     path="/product/{Id}",
     * 	   summary = "Update product data by Id",
     * 		@OA\Parameter(
     * 			name = "Id",
     * 			in = "path",
     * 			required = true,
     * 			description = "The id will be passed to {Id} to select the certain product"
     * 		),
     * 		@OA\RequestBody(
     * 			@OA\MediaType(
     * 				mediaType = "application/x-www-form-urlencoded",
     * 				@OA\Schema(
     * 					@OA\Property(
     * 						property = "nama_produk",
     * 						type = "string"
     * 					),
     * 					@OA\Property(
     * 						property = "harga",
     * 						type = "integer"
     * 					)
     * 				)
     * 			)
     * 		),
     * 	   tags = {"Put"},
     *     @OA\Response(response="200", description="Data is successfully retrieved")
     * )
     */
    public function update($id = null)
    {
        $model = new ProductModel();
        // $id = $this->request->getVar('id');
        $data = [
            'nama_produk' => $this->request->getRawInput()['nama_produk'],
            'harga'  => $this->request->getRawInput()['harga'],
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }

    // delete
    /**
     * @OA\Delete(
     *     path="/product/{Id}",
     * 	   summary = "Delete product by Id",
     * 		@OA\Parameter(
     * 			name = "Id",
     * 			in = "path",
     * 			required = true,
     * 			description = "The id will be passed to {Id} to delete the certain product"
     * 		),
     * 	   tags = {"Delete"},
     *     @OA\Response(response="200", description="Data is successfully retrieved")
     * )
     */
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->delete($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    public function APIDocumentation()
    {
        require("../vendor/autoload.php");

        $openapi = \OpenApi\Generator::scan(['../app/Controllers/product.php']);

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        return $this->respond(json_decode($openapi->toJSON()));
    }
}
