<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketCCEmail extends Model
{
    use SoftDeletes;

    protected $table = 'ticket_cc_emails';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ticket_id',
        'cc_email',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}

