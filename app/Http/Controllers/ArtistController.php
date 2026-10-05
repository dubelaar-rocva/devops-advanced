<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistController extends Controller
{
    public function index(): JsonResource
    {
        return ArtistResource::collection(
            Artist::query()
                ->with([
                    'albums',
                ])
                ->paginate(10)
        );
    }

    public function show(string $id): JsonResource
    {
        return new ArtistResource(
            Artist::query()
                ->with([
                    'albums',
                ])
                ->findOrFail($id),
        );
    }
}
