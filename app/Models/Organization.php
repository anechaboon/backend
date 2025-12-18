<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Organization extends Model
{
    use SoftDeletes;
    
    protected $table = 'organizations';
    protected $primary_key = 'id';

    protected $fillable = [
        'title',
        'description',
        'contact_email',
        'priority',
        'organization_id',
        'vessel_id',
        'service_line_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

