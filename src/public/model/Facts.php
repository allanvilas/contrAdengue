<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facts extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'facts_options';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'option',
        'description',
        'picture',
        'latitude',
        'longitude'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
