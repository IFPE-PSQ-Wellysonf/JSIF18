<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','campus_id','siape','cpf','cod_uorg','nome_uorg','nome','nascimento','situacao_vinculo','endereco_logradouro','endereco_numero','endereco_complemento','endereco_bairro','endereco_cep','endereco_municipio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /* Relacionamentos N:1 */
    public function campus()
	{
		return $this->belongsTo('App\Campus', 'campus_id');
    }
}
