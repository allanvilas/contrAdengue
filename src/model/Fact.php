<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fact extends Model
{
    use SoftDeletes;

    protected $table = 'facts_options';
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'option',
        'description',
        'picture',
        'latitude',
        'longitude',
        'address'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }


}
