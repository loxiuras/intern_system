<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TicketUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ticket_id',
        'user_id',
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
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getAllUserTickets( int $userId, int $minStatus = 0, int $maxStatus = 0, $usePlanningRows = true )
    {
        $where = [];
        $where[] = ["ticket_users.user_id", "=", $userId];
        if ( !empty( $minStatus ) ) $where[] = ["tickets.status", ">=", $minStatus];
        if ( !empty( $maxStatus ) ) $where[] = ["tickets.status", "<=", $maxStatus];
        if ( !empty( $usePlanningRows ) ) $where[] = ["tickets.show_in_planning_rows", "1"];

        return TicketUser::select(
            ["*", "companies.name as companyName"]
        )
            ->where($where)
            ->join('tickets', 'tickets.id', '=', 'ticket_users.ticket_id')
            ->join('companies', 'companies.id', '=', 'tickets.company_id')
            ->orderBy("tickets.urgent_level", "desc")->orderBy("tickets.scheduled_date", "asc")
            ->get();
    }
}
