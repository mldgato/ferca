<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saledetail extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];

    //Relación uno a muchos inversa
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
