<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Repository\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $authRepo;
    public function __construct(AuthRepositoryInterface $authRepo)
    {   
        $this->authRepo = $authRepo;
    }
    public function index(){
        return view('Auth.login');
    }
    public function authenticate(AuthRequest $request)
    {
        $response =  $this->authRepo->authenticate($request);
        if(isset($response['id'])){
            return redirect()->route('authors.index');
        }
        session()->flash('invalid', 'Invalid Username Or Password!');
        return view('Auth.login');
    }

    public function logout(){
        User::where('id', auth()->id())->update(['access_token' => null]);
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile(){
        return view('Auth.profile');
    }
}
