<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotGuru extends Model
{
    protected $table = 'bobot_guru';

    protected $primaryKey = 'id_bobot_guru';

    protected $fillable = [
        'id_guru', 'id_kriteria', 'bobot'
    ];

    public function Guru()
    {
      return $this->belongsTo('App\Guru', 'id_guru');
    }

    // public function Kriteria()
    // {
    //   return $this->belongsTo('App\Kriteria', 'id_kriteria');
    // }
}
