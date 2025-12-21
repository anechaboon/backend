<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Organization;
use App\Models\Vessel;
use App\Models\ServiceLine;
use App\Models\Category;
use App\Models\TicketCCEmail;
class Ticket extends Model
{
    use SoftDeletes;

    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'contact_email',
        'assigned_to_user_id',
        'category_id',
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
        return $this->belongsTo(Vessel::class, 'vessel_id', 'id');
    }

    public function serviceLine()
    {
        return $this->belongsTo(ServiceLine::class, 'service_line_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function ccEmails()
    {
        return $this->hasMany(TicketCCEmail::class, 'ticket_id', 'id');
    }
}

