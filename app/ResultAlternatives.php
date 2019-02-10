<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultAlternatives extends Model
{
    protected $table = 'result_alternatives';

    protected $primaryKey = 'id_alternatives';

    protected $fillable = [
    	'id_result', 'name', 'phone_number', 'address'
    ];

    public function Scores()
    {
    	return $this->hasMany('App\ResultScores', 'id_result', 'id_result')->orderBy('id_criterias','ASC');
    }

}
