<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookLoanResource;
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
        $bookLoans = BookLoan::included()
                                ->filter()
                                ->sort()
                                ->getOrPaginate();

        return BookLoanResource::collection($bookLoans);
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
            'user_id'=>'required|exists:user,id',
            'book_id'=>'required|exists:book,id',
        ]);

        $bookLoan=BookLoan::create($request->all());

        return BookLoanResource::make($bookLoan);
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

        return BookLoanResource::make($bookLoan);
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
            'user_id'=>'required|exists:user,id',
            'book_id'=>'required|exists:book,id',
        ]);

        $bookLoan=BookLoan::find($id);
        $bookLoan->update($request->all());
        return BookLoanResource::make($bookLoan);
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

        return BookLoanResource::make($bookLoan);
    }
}
