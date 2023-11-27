<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChangelogsModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'changelogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_id',
        'affected_table',
        'value_before',
        'value_after',
        'date'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(UsersModel::class,'admin_id','id');
    }

}
