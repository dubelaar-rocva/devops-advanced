<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaylistResource;
use App\Models\Playlist;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistController extends Controller
{
    public function index(): JsonResource
    {
        return PlaylistResource::collection(
            Playlist::query()
                ->paginate(10)
        );
    }

    public function show(string $id): JsonResource
    {
        return new PlaylistResource(
            Playlist::query()
                ->with([
                    'tracks',
                ])
                ->findOrFail($id),
        );
    }
}
