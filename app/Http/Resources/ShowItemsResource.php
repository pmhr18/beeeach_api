<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowItemsResource extends JsonResource
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
            'country' => $this->country['name'],
            'prefecture' => $this->prefecture['name'],
            'brewery' => $this->brewery['name'],
            'tastes' => $this->whenLoaded('tastes', $this->tastes->pluck('name')->toArray()),
            'containers' => $this->whenLoaded('containers', $this->containers->pluck('name')->toArray()),
            'color' => $this->color['name'],
            'style' => $this->style['name'],
            'abv' => $this->abv['name'],
            'type' => $this->type['name'],
        ];
    }
}
