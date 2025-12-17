<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
    protected $table = 'tickets';
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

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
    
    public function vessel()
    {
        return $this->belongsTo(Vessels::class, 'vessel_id', 'id');
    }

    public function serviceLine()
    {
        return $this->belongsTo(ServiceLine::class, 'service_line_id', 'id');
    }
}

