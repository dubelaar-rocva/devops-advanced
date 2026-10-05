<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumController extends Controller
{
    public function index(): JsonResource
    {
        return AlbumResource::collection(
            Album::query()
                ->with([
                    'artist',
                ])
                ->paginate(10)
        );
    }

    public function show(string $id): JsonResource
    {
        return new AlbumResource(
            Album::query()
                ->with([
                    'artist',
                    'tracks' => fn ($query) => $query->orderBy('position')->orderBy('id'),
                ])
                ->findOrFail($id),
        );
    }
}
