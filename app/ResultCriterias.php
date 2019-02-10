<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultCriterias extends Model
{
    protected $table = 'result_criterias';

    protected $primaryKey = 'id_criterias';

    protected $fillable = [
    	'id_result', 'name', 'weight'
    ];

    public function Scores()
    {
    	return $this->hasMany('App\ResultScores', 'id_result', 'id_result');
    }

}
