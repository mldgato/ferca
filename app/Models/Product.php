<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];
    //Relación uno a muchos inversa
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function measure()
    {
        return $this->belongsTo(Measure::class);
    }
    //relación uno a uno polimórfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    //Relación uno a muchos
    public function buydetails()
    {
        return $this->hasMany(Buydetail::class);
    }

    public function saledetails()
    {
        return $this->hasMany(Saledetail::class);
    }

    //Formato de moneda
    public function presentPrice()
    {
        return 'Q. ' . number_format($this->price, 2, '.', ',');
    }

    public function presentCost()
    {
        return 'Q. ' . number_format($this->cost, 2, '.', ',');
    }

    public function subtotal($precio, $cantidad)
    {
        $subtotal = $precio * $cantidad;
        return 'Q. ' . number_format($subtotal, 2, '.', ',');
    }
}
