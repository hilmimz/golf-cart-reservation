<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'type',
    ];

    protected $hidden = [
        'password'
    ];

    public function user_type(): BelongsTo
    {
        return $this->belongsTo(UserTypesModel::class,'type','id');
    }

    public function changelogs(): HasMany
    {
        return $this->hasMany(ChangelogsModel::class,'admin_id','id');
    }

    public function order_passengers(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'passenger_id','id');
    }

    public function order_drivers(): HasMany
    {
        return $this->hasMany(ReservationsModel::class,'driver_id','id');
    }
}
