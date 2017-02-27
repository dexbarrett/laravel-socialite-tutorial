<?php

namespace App\Http\Controllers;

use App\LoginUser;
use Illuminate\Http\Request;
use App\Exceptions\SocialAuthException;

class LoginController extends Controller
{
    protected $loginUser;

    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    public function showLoginPage()
    {
       return view('login');
    }

    public function showDashboard()
    {
        return view('dashboard');
    }

    public function auth($provider)
    {
        return $this->loginUser->authenticate($provider);
    }
 
    public function login($provider)
    {
        try {
            $this->loginUser->login($provider);
            return redirect()->action('LoginController@showDashBoard');
        } catch (SocialAuthException $e) {
            return redirect()->action('LoginController@showLoginPage')
                ->with('flash-message', $e->getMessage());
        }
    }
 
    public function logout()
    {
       auth()->logout();
       return redirect()->to('/'); 
    }
}