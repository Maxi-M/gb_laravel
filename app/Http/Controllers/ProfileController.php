<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function edit()
    {
        $user = \Auth::user();
        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->flash();

        /** @var User $user */
        $user = \Auth::user();

        $errors = [];
        $this->validator($request->all())->validate();
        if (Hash::check($request->post('old_password'), $user->password)) {
            $user->fill([
                'name' => $request->post('name'),
                'password' => Hash::make($request->post('password'))
            ]);

            if ($user->save()) {
                session()->flash('status', 'Данные пользователя успешно обновлены');
                return redirect()->route('Home');
            }
        } else {
            $errors['old_password'][] = 'Пароль введён некорректно';
        }
        return redirect()->route('profile.edit')->withErrors($errors);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }
}
