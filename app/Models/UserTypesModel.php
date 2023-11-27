<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserTypesModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(UsersModel::class,'type','id');
    }
}
