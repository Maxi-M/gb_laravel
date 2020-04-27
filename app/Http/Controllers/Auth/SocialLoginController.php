<?php

namespace App\Http\Controllers\Auth;

use App\Adaptors\GitHubAdaptor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Socialite;

class SocialLoginController extends Controller
{
    public function loginGitHub()
    {
        return Socialite::with('github')->redirect();
    }

    public function responseGitHub()
    {
        $user = Socialite::with('github')->user();
        $userModel = GitHubAdaptor::getUserModel($user);
        if (!$userModel->id) {
            if ($this->validator($userModel->attributesToArray())->passes()) {
                $userModel->save();
            }
        }
        \Auth::login($userModel);
        return redirect()->back();
    }

    /**
     * Get a validator for a user model we got.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => ['url'],
            'social_id' => ['required', 'max:255'],
            'auth_type' => 'in:gitHub,site,vk'
        ]);
    }
}
