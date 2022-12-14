<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'subject'=>$this->subject,
            'body'=>$this->body,
            'status'=>$this->status== 1 ? 'ABIERTO' : 'CERRADO',

            'annexes'=>AnnexeResource::collection($this->whenLoaded('annexes')),
        ];
    }
}
