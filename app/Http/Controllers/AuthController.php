<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
//use Request;


use ActivationService;



class AuthController extends Controller
{

    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        
        $this->activationService = $activationService;
    }



    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            //auth()->login($user);
            //return redirect($this->redirectPath());

        Auth::login($user);
        return redirect()->route('main');

        }
        abort(404);


    }


   public function postSignUp(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = new User();
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->pass_sendviaemail = $request['password'];



        $test = $this->activationService->sendActivationMail($user);


    return redirect('/signin')->with('status', 'We sent you an activation code. Check your email.');

    //return redirect('/login')->with('status', 'email send : '. $test);



        //$user->roles()->attach(Role::where('name', 'User')->first());
       // Auth::login($user);
        //return redirect()->route('main');
    }

    public function postAdminAddUser(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = new User();
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->pass_sendviaemail = $request['password'];


        $test = $this->activationService->sendActivationMail($user);


        return redirect()->back();
    }



    public function getSignUpPage()
    {
        return view('auth.signup');
    }

    public function getSignInPage()
    {
        return view('auth.signin');
    }



    public function postSignIn(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('main');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('main');
    }

    public function show($id)
    {
        $task = user::findOrFail($id);

        return view('tasks.show')->withTask($task);
    }



    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('admin');
        }
        return \View::make('editview', compact('user'));
    }


    public function update($id, Request $request)
        {
            $article = user::findOrFail($id);

            $article->update($request->all());

            //return redirect('admin');

            return redirect()->route('admin')->with('mes', 'This is a Test Messageeeee!');

        }
    



    public function destroy($id)
    {
        $data = user::findOrFail($id);
        $data->delete();

        return redirect()->back();
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
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',

            'password' => 'required|min:6',
            //'password' => 'required|min:6|confirmed',
        ]);
    }


}