<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Buy extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];
    protected $dates = ['date'];
    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];
    //Relación uno a muchos inversa
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Relación uno a muchos
    public function buydetails()
    {
        return $this->hasMany(Buydetail::class);
    }
}
