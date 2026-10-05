<?php

namespace App\Http\Resources;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /** @var Album */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'release_date' => $this->resource->release_date,
            'artist' => new ArtistResource(
                $this->whenLoaded('artist'),
            ),
            'tracks' => TrackResource::collection(
                $this->whenLoaded('tracks')
            ),
        ];
    }
}
