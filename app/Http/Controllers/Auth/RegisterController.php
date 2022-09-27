<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'business_name' => ['required', 'string', 'max:255'],
            // 'cover' => ['image', 'max:1024', 'nullable'],
            'address' => ['required', 'max:60000'],
            'vat' => ['required', 'string', 'max:20'],
            'slug' => ['required', 'string', 'max:255', 'unique'],
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
        return view('');
        $slug = $this->getSlugFromBusinessName($data['business_name']);

        $data = [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'business_name' => $data['business_name'],
            // 'cover' => $data['cover'],
            'address' => $data['address'],
            'vat' => $data['vat'],
            'slug' => $slug
        ];
        
        $new_user = new User();
        $new_user->fill($data);
        $new_user->save();
        
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'business_name' => $data['business_name'],
            // 'cover' => $data['cover'],
            'address' => $data['address'],
            'vat' => $data['vat'],
            'slug' => $slug
        ]);
    }

    protected function getSlugFromBusinessName($business_name) {

        // saving in a variable the slugged version of the $business_name
        $slug_to_save = Str::slug($business_name, '-');

        // saving the base version of the slugged title in a variable
        $base_slug = $slug_to_save;

        // check if the slug already exists in the database
        $existing_slug = User::where('slug', '=', $slug_to_save)->first();

        // setting the while '$counter' to 1
        $counter = 1;

        // start a while cycle untill '$existing_slug' is !== null
        while($existing_slug) {
            // appending the '$counter' to '$slug_to_save'
            $slug_to_save = $base_slug . '-' . $counter;

            // check if even the slug with the '$counter' appended exists in the database
            $existing_slug = User::where('slug', '=', $slug_to_save)->first();

            // if not we increment the '$counter' and we "restart" the while cycle
            $counter++;
        }

        // when the '$existing_slug' is !== null we return '$slug_to_save'
        return $slug_to_save;
    }
}
