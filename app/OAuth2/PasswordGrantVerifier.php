<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 23/12/2016
 * Time: 00:59
 */

namespace CodeDelivery\OAuth2;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}