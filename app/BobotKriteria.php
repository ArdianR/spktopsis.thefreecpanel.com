<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    protected $table = 'bobot_kriteria';

    protected $primaryKey = 'id_bobot_kriteria';

    protected $fillable = [
        'id_kriteria', 'bobot'
    ];

    public function Kriteria()
    {
      return $this->belongsTo('App\Kriteria', 'id_kriteria');
    }

    // public function Guru()
    // {
    //   return $this->belongsTo('App\Guru', 'id_guru');
    // }

}
