<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnexeResource;
use App\Models\Annexe;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnexeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annexes=Annexe::all();

        return AnnexeResource::collection($annexes);
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
            'file'=>'required|max:2048',
            'message_id'=>'required|exists:messages,id'
        ]);

        $anexos=$request->file('file')->store('public/anexos');

        $url=Storage::url($anexos);

        $annexe = Annexe::create([
            'route'=>$url,
            'message_id'=>$request->message_id,
        ]);

        return AnnexeResource::make($annexe);
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
