<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GolfCartsModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'golf_carts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function schedules(): HasMany
    {
        return $this->hasMany(SchedulesModel::class,'golf_cart_id','id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'golf_cart_id','id');
    }
}
