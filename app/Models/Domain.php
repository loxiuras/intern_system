<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'domain_name',
        'parent_id',
        'active',
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
     * Calculation for the order sequence based on parent IDs
     *
     * @return void
     */
    public static function calculateSequence(): void
    {
        $sequence = 0;

        $domains = Domain::whereNull('parent_id')->orderBy('name')->get();

        foreach ( $domains as $domain ) {
            $id = $domain->id;

            $domain->sequence = $sequence++;
            $domain->save();

            $subDomains = Domain::where('parent_id', '=', $id)->orderBy('name', 'asc')->get();
            if ( $subDomains ) {
                foreach ( $subDomains as $subDomain ) {
                    $subDomain->sequence = $sequence++;
                    $subDomain->save();
                }
            }
        }
    }
}
