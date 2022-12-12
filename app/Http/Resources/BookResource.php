<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title'=>$this->title,
            'author'=>$this->author,
            'publication'=>$this->publication,
            'review'=>$this->review,
            'observations'=>$this->observations,
            'status'=>$this->status,

            'messages'=>MessageResource::collection($this->whenLoaded('messages')),

            'bookloans'=>BookLoanResource::collection($this->whenLoaded('bookloans')),

        ];
    }
}