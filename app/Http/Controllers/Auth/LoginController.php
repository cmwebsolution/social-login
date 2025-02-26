<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function socialRedirectToProvider($provider)
    {
        return Socialite::driver($provider)->with(['prompt' => 'consent'])->redirect();
    }

    public function socialHandleProviderCallback($provider, Request $request)
    {
        // handle request for id user denied access or cancel request
        if (! empty($request->get('error'))) {
            return redirect()->route('client.login')->with('error', 'You denied the login request or Something went wrong, Please try again.');
        }
        // get the user details
        $user = Socialite::driver($provider)->user();
        $this->socialRegisterOrLoginUser($user, $provider);

        return redirect()->route('home')->with('success', 'Your are Sucessfully logged in');
    }

    protected function socialRegisterOrLoginUser($data, $provider = null)
    {
        $user = User::where('email', $data->email)->first();
        if (! $user) {
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->image = $data->avatar;
            $user->email_verified_at = now();
        }
        $providerField = "{$provider}_provider_id";
        if (empty($user->$providerField)) {
            $user->$providerField = $data->id;
            if (empty($user->image)) {
                $user->image = $data->avatar;
            }
        }
        $user->save();
        Auth::login($user);
    }
}
