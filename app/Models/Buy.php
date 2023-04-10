<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];
    //Relación uno a muchos inversa
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    //Relación uno a muchos
    public function buydetails()
    {
        return $this->hasMany(Buydetail::class);
    }
}
