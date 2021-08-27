<?php

namespace App\Http\Controllers\V1;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClienteRequest;
use App\Http\Resources\Cliente as ClienteResource;

class ClienteController extends Controller
{
    /**
     * @OA\Get(
     *      tags={"cliente"},
     *      summary="Retorna uma lista de clientes.",
     *      description="Retorna um objeto de clientes.",
     *      path="/api/cliente",
     *      @OA\Response(
     *          response="200",
     *          description="Uma listagem de clientes"
     *      ),
     * ),
     *
    */
    public function index()
    {
        $clientes = Cliente::where('status', true)->get();

        return ClienteResource::collection($clientes);
    }

    /**
     * @OA\Post(
     *     tags={"cliente"},
     *     path="/api/cliente",
     *     summary="Cadastra um novo cliente.",
     *     description="Cadastra um cliente.",
     *     @OA\RequestBody(
     *          required=true,
     *          description="Objeto Cliente a ser adicionado.",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Cliente")
     *          ),
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/Cliente")
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cadastro bem-sucedido.",
     *         @OA\JsonContent(ref="#/components/schemas/Cliente")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        return response()->json([
            'error' => false,
            'data' => $cliente,
            'message' => 'Cliente cadastrado com sucesso!'
        ]);
    }
}
