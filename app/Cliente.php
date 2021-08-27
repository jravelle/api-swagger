<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *    required={"nome","email","cpf","data_nascimento"},
 *    @OA\Xml(name="Cliente"),
 *    @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 *    @OA\Property(property="nome", type="string", description="Nome do cliente"),
 *    @OA\Property(property="email", type="string", format="email", description="E-mail único do cliente", example="cliente@email.com"),
 *    @OA\Property(property="cpf", type="string", format="999.999.999-99", description="CPF do cliente", example="123.123.123-45"),
 *    @OA\Property(property="data_nascimento", type="string", format="date: Y-m-d", description="Data de nascimento do cliente", example="2000-12-25"),
 *    @OA\Property(property="status", type="boolean", description="Define a disponibilidade/visibilidade do registro."),
 * )
 *
 * Class Cliente
 *
 */
class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'cpf',
        'data_nascimento',
        'status',
    ];

    protected $dates = [
        'data_nascimento'
    ];
}
