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
    
    public function getDiariaAttribute($value){
        if($this->attributes['solicitou_diarias']){
            return 'Sim, Solicitou.';
        }else{
            return 'Não';
        }
    }
    public function getIdadeAttribute(){
        $tz  = new \DateTimeZone(config('app.timezone', 'America/Recife'));
        $age = \DateTime::createFromFormat('Y-m-d', $this->attributes['nascimento'], $tz)
                    ->diff(new \DateTime('now', $tz))
                    ->y;
        return $age;
    }
    public function getNomeAnsiAttribute(){
        $value =  iconv( 'UTF-8', 'ASCII//TRANSLIT', $this->attributes['name'] );
        $value = preg_replace( '/[`^~\'"]/', null, $value);
        return $value;
    }
    
    /* Relacionamentos N:1 */
    public function campus()
	{
		return $this->belongsTo('App\Campus', 'campus_id');
    }
}
