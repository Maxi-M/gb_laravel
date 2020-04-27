<?php


namespace App\Adaptors;


use App\Models\User;

interface SocialNetworkAdaptor
{
    public static function getUserModel($user): User;
}
