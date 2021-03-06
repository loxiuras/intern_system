<?php

namespace App\Models;

use App\Services\PasswordService;
use Defuse\Crypto\Exception\BadFormatException;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
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
        'name',
        'username',
        'password',
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
     * Decrypting the password value in an SQL select;
     *
     * @param $key
     * @return string|null
     */
    public function getPasswordAttribute($key)
    {
        $type     = $this->attributes['type'] ?: null;
        $recordId = $this->attributes['record_id'] ?: null;

        return !empty( $type ) && !empty( $recordId ) ? (new PasswordService( $type, $recordId ))->decrypt( $key ) : "";
    }

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

        return Password::where($where)->orderBy('name')->get();
    }
}
