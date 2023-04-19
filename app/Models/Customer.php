<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];

    //Relaciones uno a muchos

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
