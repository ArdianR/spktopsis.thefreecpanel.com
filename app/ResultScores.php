<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultScores extends Model
{
    protected $table = 'result_scores';

    protected $primaryKey = 'id_scores';

    protected $fillable = [
    	'id_result', 'id_alternatives', 'id_criterias', 'score'
    ];
}
