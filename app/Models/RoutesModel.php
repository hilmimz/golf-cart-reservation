<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoutesModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'routes';
    protected $primaryKey = 'id';

    protected $fillable =[
        'name',
        'order',
    ];

    public function route_start_reservations(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'route_start','id');
    }

    public function route_end_reservations(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'route_end','id');
    }

    public function route_start_schedules(): HasMany
    {
        return $this->hasMany(SchedulesModel::class,'route_start','id');
    }
}
