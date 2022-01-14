<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use Defuse\Crypto\Key;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\KeyProtectedByPassword;

class PasswordController extends Controller
{

    public function overview()
    {

        $controller = "company";
        $recordId = "1";
        $salt = "{$controller}-{$recordId}";
        $hashPre = md5( $controller );
        $hashPro = md5( $recordId );

        $password = 'Test123!Test123!';

        $combinedPassword = "{$hashPre}{$password}{$hashPro}";

        dd(
            $controller,
            $recordId,
            $password,
            $combinedPassword,
            str_replace( $hashPre, '', str_replace( $hashPro, '', $combinedPassword ) ),
        );


        /*
        $salt = "company_1";
        $password = "Test123!Test123!";

        $encryptedPassword = Crypto::encrypt($password, $this->getDefuseKey());
        $decryptedPassword = Crypto::decrypt($encryptedPassword, $this->getDefuseKey());

        $protectedToken = KeyProtectedByPassword::createRandomPasswordProtectedKey($password);
        $protectedTokenEncoded = $protectedToken->saveToAsciiSafeString();
        $decodedToken = KeyProtectedByPassword::loadFromAsciiSafeString($protectedTokenEncoded);

        $password = "YoussriIsBijnaWeg";

        $aToken = Key::loadFromAsciiSafeString( $protectedTokenEncoded );

        $encryptedPasswordToken = Crypto::encrypt($password, $aToken);
        $decryptedPasswordToken = Crypto::decrypt($encryptedPassword, $aToken);

        $protected_key_bytes = $encryptedPassword = Crypto::encrypt($password, $this->getDefuseKey());

        dd(

            $encryptedPassword,
            $decryptedPassword,

            $encryptedPasswordToken,
            $decryptedPasswordToken,

        );
        */

        /*
        $password = "company_1";

        // Global Key
        $protected_key = KeyProtectedByPassword::createRandomPasswordProtectedKey($password);

        // Key for password
        $protected_key_encoded = $protected_key->saveToAsciiSafeString();

        $givenPassword = "Test123!Test123!";

        $defuseKeyKey = Key::loadFromAsciiSafeString( $protected_key_encoded );
        $defuseKey = $this->getDefuseKey();

//        $encryptedPassword = Crypto::encrypt($givenPassword, $protected_key);
//        $decryptedPassword = Crypto::decrypt($givenPassword, $protected_key);

        dd(
            $protected_key,
            $protected_key_encoded,
            $givenPassword,
            $defuseKeyKey,
            $defuseKey,
//            $encryptedPassword,
//            $decryptedPassword,
        );

        */
        /*
        $password = "COMPANY-1--Test123!Test123!";
        $encryptedPassword = Crypto::encrypt($password, $this->getDefuseKey());
        $decryptedPassword = Crypto::decrypt($encryptedPassword, $this->getDefuseKey());

        $storedEncryptedPassword = "def50200c410dfb37072f750d998ff8b5a6d00b40f8f1e1f8486b5e2e8fb0579f467d8e91106a84888183ead57dba9ffaf4c06a03c93c81af9c1ccb2099a124d113fc4922412474906254632773bf240f76286bda481120c6dcb3f125d9179c4ec74d053";
        $decryptedStoredEncryptedPassword = Crypto::decrypt($storedEncryptedPassword, $this->getDefuseKey());

        dd(
            $password,
            $encryptedPassword,
            $decryptedPassword,
            $storedEncryptedPassword,
            $decryptedStoredEncryptedPassword
        );
        */






        /*

        $crypt = Crypto::encrypt("Test123!Test123!", $this->getDefuseKey());

        $protected_key = KeyProtectedByPassword::createRandomPasswordProtectedKey("Peter!123");
        $protected_key_encoded = $protected_key->saveToAsciiSafeString();

        dd( $protected_key, $protected_key_encoded, Crypto::decrypt($protected_key_encoded, $this->getDefuseKey()) );

        //dd( $crypt, Crypto::decrypt($crypt, $this->getDefuseKey()) );
        */
    }

    /**
     * @return \Defuse\Crypto\Key
     * @throws \Defuse\Crypto\Exception\BadFormatException
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     */
    private function getDefuseKey()
    {
        return Key::loadFromAsciiSafeString( Config::get('app.defuse') );
    }
}
