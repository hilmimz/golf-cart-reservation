<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchedulesModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'schedules';
    protected $primaryKey = 'id';

    protected $fillable =[
        'time',
        'route_start',
        'schedule_time_id'
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(RoutesModel::class, 'route_start', 'id');
    }
    public function schedule_time(): BelongsTo
    {
        return $this->belongsTo(ScheduleTimeModel::class,'schedule_time_id','id');
    }

    public function route_start_reservations(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'route_start','id');
    }

    public function route_end_reservations(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'route_end','id');
    }
}
