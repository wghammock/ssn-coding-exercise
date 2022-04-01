<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Primes;

class PrimeChecker extends Controller
{

    // /**
    //  * Show the profile for a given user.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\View\View
    //  */
    // public function show($id)
    // {
    //     return view('user.profile', [
    //         'user' => User::findOrFail($id)
    //     ]);
    // }

    public function request()
    {
        // return Input::get('equipment_url');
        return "made it here";
    }
}
