<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScheduleTimeModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'schedule_time';
    protected $primaryKey = 'id';

    protected $fillable =[
        'start',
        'end',
        'golf_cart_id'
    ];

    public function schedule(): HasMany
    {
        return $this->hasMany(SchedulesModel::class,'schedule_time_id','id');
    }

    public function golf_cart(): BelongsTo
    {
        return $this->belongsTo(GolfCartsModel::class,'golf_cart_id','id');
    }
}
