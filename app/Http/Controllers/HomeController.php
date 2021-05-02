<?php

namespace App\Http\Controllers;

use App\Client;
use App\Sell;
use App\Message;
use Illuminate\Support\Facades\Auth;

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
        $sales = Sell::where('user_id', '=', Auth::user()->id)->get();
        $messages = Message::where('user_id', '=', Auth::user()->id)->get()->merge(Message::where('all', '=', 1)->get());
        $clients = Client::where('user_id', '=', Auth::user()->id)->get();
        return view('home', compact('sales', 'messages', 'clients'));
    }
}
