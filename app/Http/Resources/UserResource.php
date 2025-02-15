<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'posts' => PostResource::collection($this->whenLoaded('posts')),
            $this->mergeWhen($this->posts->count() == 1, [
                'new_attribute' => 'attribute value'
            ])
        ];
    }
}
