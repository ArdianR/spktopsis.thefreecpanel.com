<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'name', 'type'
    ];

    public function BobotKriteria()
    {
    	return $this->hasMany('App\BobotKriteria', 'id_kriteria');
    }

    public function BobotGuru()
    {
    	return $this->hasMany('App\BobotGuru', 'id_guru');
    }

}
