<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function index() {
        return view('auth.customAuth');
    }

    public function dashboard() {
        if ( Auth::check() ) {
            return view('layout.default');
        }
        // return $this->signOut();
        return redirect('login');
    }

    public function login( Request $request ) {
        $credentials = $request->only('email', 'password');

        if ( Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'status' => true ]) ) {
            $user = User::where('email', '=', $credentials['email'])->first();

            Session::put('s_id', $user['id']);
            Session::put('s_name', $user['name']);
            Session::put('s_email', $user['email']);
            Session::put('s_created_at', $user['created_at']);
            Session::put('s_updated_at', $user['updated_at']);
            // Session::put('s_img', $user['profile']);
            $msg = array(
                'status' => '1',    // success
                'message' => 'You have Logged in successfully!'
            );
            echo json_encode($msg);
        } else {
            $msg = array(
                'status' => '0',    // error
                'message' => 'Credentials is not correct'
            );
            echo json_encode($msg);
        }

        return;
    }

    public function checkIfUserExist( $email ) {
        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            return false;
        }
        return true;
    }

    public function create(array $data) {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make( $data['password'] )
        ]);
    }

    public function registeration( Request $request ) {
        $data = $request->all();
        if ( $this->checkIfUserExist($data['email']) ) {
            $msg = array(
                'status' => '2',    // user is already exist
                'message' => 'User already exist.'
            );
            echo json_encode($msg);
            return;
        }
        $check = $this->create($data);
        $msg = array(
            'status' => '1',   // success
            'message' => $check
        );
        echo json_encode($msg);
        return;
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        $msg = array(
            'status' => '1',
            'message' => 'You have logouted!'
        );
        echo json_encode($msg);
        return redirect('admin');
    }

    public function changePassword( Request $request ) {
        $data = $request->all();
        $user = Auth::user();
        if ( Hash::check( $data['password'], $user->password ) ) {
            $user = User::where('name', '=', $request->input('name'))->update(['password' =>  Hash::make($data['newPassword']) ]);
            $msg = array(
                'status' => '1',        // success
                'message' => 'Password reseted newly! You must use this password from now.'
            );
            echo json_encode($msg);
            return;
        }
        $msg = array(
            'status' => '0',            // failed
            'message' => 'Input Password correctly! Current Password is not correct!'
        );
        echo json_encode($msg);
        return;
    }




}
