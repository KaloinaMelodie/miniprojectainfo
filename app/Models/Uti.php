<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Uti extends Model
{
    use HasFactory;
    protected $primaryKey = 'iduti';
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'uti';
    protected $fillable =['identifiant','mdp'];

    public function checklog($array)
    {
        $data = DB::Select("select * from uti where LOWER(TRIM(identifiant))=LOWER(TRIM('".$array['identifiant']."')) and mdp='".md5($array['mdp'])."'");
        if (count($data)>0) {
            return $data[0]->iduti;
        }
        return 0;
    }
}
