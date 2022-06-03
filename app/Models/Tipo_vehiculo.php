<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehiculo;

class Tipo_vehiculo extends Model
{
    use HasFactory;
    protected $table = 'tipo_vehiculo';

    protected $primaryKey = "id_tipo";
    protected $fillable = ['descripcion'];

    public function vehiculo(){
        return $this->hasMany(Vehiculo::class, 'id');
    }
}
