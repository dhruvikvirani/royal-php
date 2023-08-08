<?php
namespace App\Repository;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function authenticate($request){
        $data = $request->validated();
        $path = 'token';
        $response = Helper::royalApi('POST',$path,$data);
        if(isset($response['id'])){
            $user = $response['user'];
            $user = User::updateOrCreate([
                'api_user_id' => $user['id'],
            ], [
                'api_user_id' => $user['id'],
                'email' => $user['email'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'gender' => $user['gender'],
                'is_active' => $user['active'],
                'password' => $data['password'],
                'access_token' => $response['token_key'],
            ]);
            Auth::login($user);
        }
        return $response;
    }
}