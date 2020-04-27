<?php


namespace App\Adaptors;


use App\Models\User;

class GitHubAdaptor implements SocialNetworkAdaptor
{

    public static function getUserModel($user): User
    {
        /** @var User $userModel */
        if ($userModel = User::query()->where('email', $user->email)->first()) {
            return $userModel;
        }
        $userModel = new User();

        $userModel->fill([
            'social_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'auth_type' => 'gitHub',
            'avatar' => $user->avatar,
        ]);

        return $userModel;
    }
}
