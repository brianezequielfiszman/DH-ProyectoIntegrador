<?php

namespace Manija\Http\Controllers\Auth;


use Manija\User;
use Manija\Categories;
use Manija\Http\Controllers\Controller;
use Manija\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Middleware\AdminMiddleware');
    }

    /**
 * Handle a registration request for the application.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function register(Request $request)
{
    $validator = $this->validator($request->all());
    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }

    $user = $this->create($request->all());
    $categories = $user->category;

    return redirect($this->redirectPath())->with('userCreated', true);
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
            'name'     => 'required|alpha|max:20',
            'lastName' => 'required|alpha|max:20',
            'category' => 'required|in:1,2,3',
            'password' => 'required|min:6|confirmed',
            'email'    => 'required|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => ucfirst($data['name']),
            'lastName' => ucfirst($data['lastName']),
            'category_id' => $data['category'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
