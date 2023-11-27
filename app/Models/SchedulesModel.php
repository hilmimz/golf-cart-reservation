<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchedulesModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'routes';
    protected $primaryKey = 'id';

    protected $fillable =[
        'time',
        'route_start',
        'direction',
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(RoutesModel::class, 'route_start', 'id');
    }

    public function golf_cart(): BelongsTo
    {
        return $this->belongsTo(GolfCartsModel::class,'golf_cart_id','id');
    }
}
