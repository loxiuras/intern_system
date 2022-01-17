<?php

namespace App\Services;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Exception\BadFormatException;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException;
use Defuse\Crypto\Key;
use Illuminate\Support\Facades\Config;

class PasswordService
{

    /** @var string|null */
    private ?string $controller = null;

    /** @var int|null */
    private ?int $recordId = null;

    /**
     * @param string $controller
     * @param int $recordId
     */
    public function __construct( string $controller, int $recordId )
    {
        $this->controller = $controller;
        $this->recordId = $recordId;
    }

    /**
     *
     * @throws EnvironmentIsBrokenException|BadFormatException
     */
    public function encrypt( string $password ): string
    {
        return Crypto::encrypt($this->hash($password), $this->getDefuseKey());
    }

    /**
     * @param string $password
     * @return string|null
     */
    public function decrypt( string $password ): ?string
    {
        try {
            return $this->unhash(Crypto::decrypt($password, $this->getDefuseKey()));
        } catch (BadFormatException | EnvironmentIsBrokenException $e) {
        } catch (WrongKeyOrModifiedCiphertextException $e) {
            return null;
        }
    }

    /**
     * Hashes the given string;
     *
     * @param string $password
     * @return string
     */
    private function hash( string $password ): string
    {
        return md5( $this->controller ).$password.md5( $this->recordId );
    }

    /**
     * Unhashes the given hash;
     *
     * @param string $password
     * @return string
     */
    private function unhash( string $password ): string
    {
        return str_replace( md5( $this->controller ), "", str_replace( md5( $this->recordId ), "", $password ) );
    }

    /**
     * Gets Defuse key from config;
     *
     * @return Key
     * @throws BadFormatException
     * @throws EnvironmentIsBrokenException
     */
    private function getDefuseKey(): Key
    {
        return Key::loadFromAsciiSafeString( Config::get('app.defuse') );
    }

    /**
     * Generates a random password with the provided length;
     *
     * @param int $length
     * @return string
     */
    public function generate( int $length = 15 ): string
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-', ceil($length/strlen($x)) )),1,$length);
    }
}
