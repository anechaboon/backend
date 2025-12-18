<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vessel extends Model
{
    use SoftDeletes;

    protected $table = 'vessels';
    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'address',
        'imo_number',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}

