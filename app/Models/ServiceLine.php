<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ServiceLine extends Model
{
    use SoftDeletes;
    
    protected $table = 'service_lines';
    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'description',
        'service_code',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
}

