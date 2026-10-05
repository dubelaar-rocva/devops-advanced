<?php

namespace App\Http\Resources;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
{
    /** @var Track */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->resource->title,
            'duration_seconds' => $this->resource->duration_seconds,
            'popularity' => $this->resource->popularity,
            'position' => $this->resource->position,
            'artist' => new ArtistResource(
                $this->whenLoaded('artist'),
            ),
            'album' => new AlbumResource(
                $this->whenLoaded('album'),
            ),
        ];
    }
}
