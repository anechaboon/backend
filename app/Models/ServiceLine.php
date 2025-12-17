<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class ServiceLine extends Model
{
    protected $table = 'service_lines';
    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
}

