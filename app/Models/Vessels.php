<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class Organization extends Model
{
    protected $table = 'organizations';
    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'address',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

