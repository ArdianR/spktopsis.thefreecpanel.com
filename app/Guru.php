<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'name', 'jenis_kelamin', 'alamat',
    ];

    public function BobotGuru()
    {
    	return $this->hasMany('App\BobotGuru', 'id_guru')->orderBy('id_kriteria','ASC');
    }
}
