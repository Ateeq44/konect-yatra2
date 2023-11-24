<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Gurdwara;
use App\Models\News;
use App\Models\Events;
use App\Models\User;
use App\Models\Hotels;
use App\Models\Locations;
use App\Models\Gallery;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['all_packages'] = Package::all();
        $data['gurdwaras'] = Gurdwara::take(8)->get();
        $data['hotels'] = Hotels::all();
        $data['news'] = News::all();
        $data['events'] = Events::all();
        $data['locations'] = Locations::all();
        $data['gallery'] = Gallery::all();
        return view('home', $data);
    }

    public function our_info()
    {
        $data['all_packages'] = Package::all();
        $data['gurdwaras'] = Gurdwara::all();
        $data['events'] = Events::all();
        $data['gallery'] = Gallery::all();
        return view('our-info', $data);
    }

    public function showLoginForm(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
       
            $credentials = $request->only('email', 'password');
            if (\Auth::attempt($credentials)) {
                return redirect(url("user/user_dashboard"))->withSuccess('You have Successfully loggedin');
            }
      
            return redirect("login")->withError('Oppes! You have entered invalid credentials');
        }
        return view('auth.login');
    }

    public function showRegisterForm(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
               
            $data = $request->all();
            $check = $this->create($data);
             
            return redirect(url("user/user_dashboard"))->withSuccess('Great! You have Successfully loggedin');
        }
        return view('auth.register');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'role' => $data['role']
        ]);
    }

    public function visa_form()
    {
        $data['all_packages'] = Package::all();
        return view('visa-form', $data);
    }

    public function gurdwaras()
    {
        $data['all_packages'] = Package::all();
        $gurdwaras = Gurdwara::all();
        $all_data = [];
        $all_state = [];
        foreach ($gurdwaras as $key => $value) {
            if (!empty($value->state)) {
                array_push($all_state, $value->state);
            }
        }
        $all_state = array_unique($all_state);
        foreach ($all_state as $key => $value) {
            $state_gurdwaras['state'] = $value;
            $state_gurdwaras['gurdwaras'] = Gurdwara::where("state", $value)->get();
            array_push($all_data, $state_gurdwaras);
        }
        $data['gurdwaras'] = $all_data;
        return view('gurdwaras', $data);
    }
}
