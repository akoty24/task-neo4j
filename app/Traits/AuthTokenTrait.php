<?php

namespace App\Traits;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

trait AuthTokenTrait
{
    public function getUserId($token){
        $user_id= DB::table('personal_access_tokens')->where('token', $token)->value( 'tokenable_id');
        return $user_id;

    }
    public function getUser($token){
       $user_id= DB::table('personal_access_tokens')->where('token', $token)->value( 'tokenable_id');
       $user=User::where('id',$user_id)->first();
       return $user;

    }
    public function createToken($tokenableId)
    {
        $name = 'API Token';
        $token = hash('sha256', Str::random(60));
        DB::table('personal_access_tokens')->insert([
            'name' => $name,
            'token' => $token,
            'tokenable_id' => $tokenableId,
            'tokenable_type' => 'App\Models\User',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $token;
    }

    public function checkToken($token)
    {
        return DB::table('personal_access_tokens')->where('token', $token)->exists();
    }

    public function checkTokenByTokenableId($tokenableId)
    {
        return DB::table('personal_access_tokens')->where('tokenable_id', $tokenableId)->exists();
    }

    public function deleteTokenByTokenableId($tokenableId)
    {
        DB::table('personal_access_tokens')->where('tokenable_id', $tokenableId)->delete();
    }


    public function deleteToken($token)
    {
        DB::table('personal_access_tokens')->where('token', $token)->delete();
    }
}
