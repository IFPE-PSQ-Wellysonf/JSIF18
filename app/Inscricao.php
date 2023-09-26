<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';

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
