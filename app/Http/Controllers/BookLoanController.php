<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookLoans = BookLoan::all();

        return $bookLoans;
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
            'loanDate' => 'required',
            'observations' => 'required',
        ]);

        $bookLoan=BookLoan::create($request->all());

        return $bookLoan;
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookLoan=BookLoan::findOrFail($id);

        return $bookLoan;
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
            'loanDate' => 'required',
            'observations' => 'required',
        ]);

        $bookLoan=BookLoan::find($id);
        $bookLoan->update($request->all());
        return $bookLoan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookLoan = BookLoan::destroy($id);

        return $bookLoan;
    }
}
