<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vessel extends Model
{
    use SoftDeletes;

    protected $table = 'vessels';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'imo_number',
        'type',
        'flag',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}

