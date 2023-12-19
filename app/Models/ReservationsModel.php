<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationsModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable =[
        'route_start',
        'route_end',
        'direction',
        'passenger_id',
        'driver_id',
        'date',
        'token',
        'status'
    ];

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(UsersModel::class,'passenger_id','id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(UsersModel::class,'driver_id','id');
    }

    public function route_start(): BelongsTo
    {
        return $this->belongsTo(SchedulesModel::class,'route_start','id');
    }

    public function route_end(): BelongsTo
    {
        return $this->belongsTo(SchedulesModel::class,'route_end','id');
    }

    public function golf_cart(): BelongsTo
    {
        return $this->belongsTo(GolfCartsModel::class,'golf_cart_id','id');
    }
}
