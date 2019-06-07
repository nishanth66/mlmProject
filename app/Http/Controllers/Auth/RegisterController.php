<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $k=1;
        $j = 6;
        while($k != 0)
        {
            $string = "";
            for ($i = 0; $i < $j; $i++)
            {
                srand((double)microtime() * 1234567);
                $x = mt_rand(0, 2);
                switch ($x)
                {
                    case 0:
                        $string .= chr(mt_rand(97, 122));
                        break;
                    case 1:
                        $string .= chr(mt_rand(65, 90));
                        break;
                    case 2:
                        $string .= chr(mt_rand(48, 57));
                        break;
                }
            }
            if (User::where('referring_code', 'like', $string)->exists())
            {
                if ($i > 999)
                {
                    $j++;
                }

                $i = 1;
            }
            else
            {
                $i = 1;
                while ($i != 0)
                {
                    $rand = mt_rand(100000, 999999);
                    if (User::where('user_id', $rand)->exists())
                    {
                        $i++;
                    }
                    else
                    {
                        $k=0;
                        $i = 0;
                        return User::create([
                            'fname' => $data['fname'],
                            'lname' => $data['lname'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['password']),
                            'referal_id' => $data['referal_id'],
                            'user_id' => $rand,
                        ]);
                    }
                }
            }
        }
    }
}
