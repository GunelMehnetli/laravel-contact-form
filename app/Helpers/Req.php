<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;

class Req
{

    public static function storeToken($token)
    {
        Cache::put('api_token', $token, now()->addHours(1));
    }
    public static function getToken()
    {
        $cachedToken = Cache::get('api_token');
        return $cachedToken;
    }
    public static function destroyToken()
    {
        Cache::forget('api_token');
    }
    public static function regenerate()
    {
        self::destroyToken();
        self::loginApi();
        return self::getOrganizations();
    }

    public static function loginApi()
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
                    'Accept' => 'application/json',
                ])->withBody(json_encode([
                        'email' => 'gunel.mehnetli@gmail.com',
                        'password' => 'mDMMYnpxaWUMXhW',
                    ]), 'application/json')
            ->post('https://api.e-task.az/api/beta/auth/');
        $response->throw();
        $responseBody = $response->json();
        if (!empty($responseBody['data']['token'])) {
            $token = $responseBody['data']['token'];
            self::storeToken($token);
        } else {
            Auth::logout();
            return redirect('/login');
        }
    }
    public static function getOrganizations()
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
                    'Authorization' => 'Bearer ' . self::getToken(),
                    'Accept' => 'application/json',
                ])->get('https://api.e-task.az/api/beta/organizations');

        if ($response->status() === 401) {
            return self::regenerate();
        }
        return collect(json_decode($response->body(), true));
    }
}