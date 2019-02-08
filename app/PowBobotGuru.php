<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowBobotGuru extends Model
{
    protected $table = 'pow_bobot_guru';

    protected $primaryKey = 'id_pow_bobot_guru';

    protected $fillable = [
        'id_guru', 'id_kriteria', 'bobot'
    ];

    public function Guru()
    {
      return $this->belongsTo('App\Guru', 'id_guru');
    }
}
