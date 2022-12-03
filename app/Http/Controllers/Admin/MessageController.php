<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.message',compact('messages'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $data = Message::find($id);
        $data->status = 'Read';
        $data->save();
        return view('admin.message_edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Message::find($id);
        $data->note = $request->note;
        $data->save();

        return redirect()->route('admin_message')->with('success','Message Updated');
    }

    public function destroy($id)
    {
        $messages = Message::find($id);
        $messages->delete();

        return redirect()->route('admin_message')->with('info','Message Delete');

    }
}
