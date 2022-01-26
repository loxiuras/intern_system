<?php

namespace App\Models;

use App\Services\TimeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'create_user_id',
        'updated_user_id',
        'title',
        'description',
        'invoice_description',
        'invoice_price',
        'invoice_time',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * ToDo: Create attribute get for InvoiceTime;
     *
     * @param $key
     */
    public function getTitleAttribute($key)
    {
        $invoiceTime = $this->attributes['invoice_time'];

        $hours = (new TimeService( $invoiceTime ))->transformHours();
        $minutes = (new TimeService( $invoiceTime ))->transformMinutes();

        $this->attributes['invoice_time_hours'] = $hours;
        $this->attributes['invoice_time_minutes'] = $minutes;

        return $this->attributes['title'];
    }
}
