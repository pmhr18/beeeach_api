<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowBreweriesResource extends JsonResource
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
            'brewery_id' => $this->id,
            'brewery_name' => $this->name,
            'formal_name' => $this->formal_name,
            'store_info' => $this->whenLoaded('store_info', $this->store_info->pluck('name')->toArray()),
            'address' => $this->address,
            'access' => $this->access,
            'country' => $this->country['name'],
            'prefecture' => $this->prefecture['name'],
            'items' => $this->whenLoaded('item', function () {
                return $this->item->map(function ($item) {
                    return [
                        'item_id' => $item->id,
                        'item_name' => $item->name,
                        'style' => $item->style->name,
                    ];
                });
            }),
        ];
        
    }
}
