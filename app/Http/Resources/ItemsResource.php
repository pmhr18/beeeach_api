<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource extends JsonResource
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
            'item_id' => $this->id,
            'item_name' => $this->name,
            'country' => $this->country,
            'prefecture' => $this->prefecture,
            'color' => $this->color,
            'style' => $this->style,
            'abv' => $this->abv,
            'type' => $this->type,
            'brewery' => $this->brewery,
            'tastes' => $this->tastes,
            'containers' => $this->containers,
        ];
    }
}
