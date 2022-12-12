<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookLoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'loanDate'=>$this->loanDate,
            'scheduledReturnDate'=>$this->scheduledReturnDate,
            'returnDate'=>$this->returnDate,
            'observations'=>$this->observations,
            'status'=>$this->status== 1 ? 'ABIERTO' : 'CERRADO',
        ];
    }
}