<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        $c_password = $request->input('c_password');

        if (strcmp($password, $c_password) == 0) {
            $accounts = Account::where('email', $email)->get();

            if (count($accounts) <= 0) {
                $account = new Account;
                $account->fname = $fname;
                $account->lname = $lname;
                $account->email = $email;
                $account->password = md5($password);

                // $request->session()->flash('message', 'Thanks for signing up. Welcome to our community. We are happy to have you on board.');
                $account->save();

                // return redirect('/loginpage');
                return back()->with('success', 'Register account successfully');
            } else {
                // $request->session()->flash('taken', 'username is already taken.');
                return redirect('/loginpage/create');
            }
        } else {
            return "Password is not match";
        }
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
