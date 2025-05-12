<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VarianResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->product_uuid,
            'name' => $this->name,
            'price' => $this->product_price,
            'handle' => $this->product_handle,
            'images' => ImageResource::collection($this->images),
            'variants' => VariantResource::collection($this->variants),
        ];

    }
}
