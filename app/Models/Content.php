<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'record_id',
        'title',
        'description',
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
     * @param string $type
     * @param int    $recordId
     * @param bool   $onlyActive
     *
     * @return mixed
     */
    public static function getAllFromType( string $type, int $recordId, bool $onlyActive = true )
    {
        $where = [];
        $where[] = ['type', '=', $type];
        $where[] = ['record_id', '=', $recordId];
        if ( $onlyActive ) $where[] = ['active', '=', 1];

        return Content::where($where)->orderBy('id')->get();
    }
}
