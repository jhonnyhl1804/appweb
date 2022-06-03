<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo_vehiculo;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculo';

    protected $primaryKey = "id";
    protected $fillable = ['placa', 'color', 'modelo'];
    

    public function tipo_vehiculo(){
        return $this->belongsTo(Tipo_vehiculo::class,'id_tipo');
    }

}

