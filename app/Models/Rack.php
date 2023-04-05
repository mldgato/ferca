<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];
    //Relaciones uno a muchos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //Relación uno a muchos inversa
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
