<?php

namespace Core\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
