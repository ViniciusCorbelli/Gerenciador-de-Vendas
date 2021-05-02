<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\MessageRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages = new Message();
        $users = User::all();
        return view('admin.messages.create', compact('messages', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $data = $request->all();
        $data['sender_id'] = Auth::user()->id;
        $data['date'] = date('d/m/Y H:i');
        if ($data['user_id'] == "all") {
            $data['user_id'] = null;
            $data['all'] = '1';
        }
        Message::create($data);
        return redirect()->route('messages.index')->with('success', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $users = User::all();
        return view('admin.messages.edit', compact('message', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Message $message)
    {
        $message->update($request->all());
        return redirect()->route('messages.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', true);
    }
}
