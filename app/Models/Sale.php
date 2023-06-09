<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];

    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    //Relación uno a muchos
    public function saledetails()
    {
        return $this->hasMany(Saledetail::class);
    }
}
