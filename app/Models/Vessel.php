<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class Vessel extends Model
{
    protected $table = 'vessels';
    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'address',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}

