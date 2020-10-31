<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function search(Request $request)
    {

        if($request->ajax())
        {
            $user = Auth::user();
            $data = User::where('first_name', 'like', $request->search)->orWhere('last_name','like',$request->search)->orWhere('email','like',$request->search)->orWhereHas('user_technology', function ($q) use ($request) {
                   $q->where('technology_name', 'like', $request->search);
                })->where('id','!=',$user->id)->get();

            $output ='';
            foreach ($data as $key => $value) {
                $output .='<tr>'.
                    '<td>'.$value->first_name.''.$value->last_name.'</td>'.
                    '<td>Connection</td>'.
                    '</tr>';

            }

             return $output;

        }

    }

    public function connections()
    {
        $user = Auth::user()->connections;
        echo "<pre>";
        print_r($user);
        echo "</pre>";
        exit;
    }
   
}
