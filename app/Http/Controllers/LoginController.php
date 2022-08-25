<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = config('api.base_url');
    }

    public function auth(Request $request)
    {
        $base_url = $this->base_url;
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!'
        ]);
        try {
            $key = config('api.key');
            $secret_key = config('api.secret_key');
            $pwd = config('api.padding') . $request->password;
            $password = base64_encode(openssl_encrypt($pwd, 'aes-128-ecb', $secret_key, OPENSSL_PKCS1_PADDING));
            $result = Http::withHeaders([
                'key' => $key
            ])->post($base_url."Users/UserLogin", [
                "username" => $request->username,
                "password" => $password,
            ]);
            if ($result->status() === 200) {
                $data = $result['data'];
                Session::put('username', $data['data_user']['username']);
                Session::put('jenis_user', $data['data_user']['jenis_user']);
                Session::put('name', $data['data_user']['nama_user']);
                Session::put('token', $data['token']);
                return redirect('/dashboard');
            } else {
                $message = $result['desc'];
                return redirect()->back()->with('message',$message);
            }
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return redirect()->back()->with('message',$message);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
