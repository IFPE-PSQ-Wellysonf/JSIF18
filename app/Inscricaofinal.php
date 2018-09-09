<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricaofinal extends Model
{
    protected $table = 'inscricoesfinais';

    protected $fillable = [
        'user_id','modalidade_id',
    ];
    /* Relacionamentos N:1 */
    public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
    }
    /* Relacionamentos N:1 */
    public function modalidade()
	{
		return $this->belongsTo('App\Modalidades', 'modalidade_id');
    }
}
