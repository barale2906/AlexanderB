<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnexeResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();
        return AnnexeResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'=> 'required|max:255',
            'body'=>'required',
            'user_id'=>'required|exists:user,id',
        ]);

        $message=Message::create($request->all());

        return AnnexeResource::make($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return AnnexeResource::make($message);
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
        $request->validate([
            'subject'=> 'required|max:255',
            'body'=>'required',
            'user_id'=>'required|exists:user,id',
        ]);

        $message = Message::find($id);
        $message->update($request->all());

        return AnnexeResource::make($message);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=Message::destroy($id);

        return AnnexeResource::make($message);
    }
}
