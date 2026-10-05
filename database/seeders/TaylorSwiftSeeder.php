<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Database\Seeder;

class TaylorSwiftSeeder extends Seeder
{
    public function run(): void
    {
        $artist = Artist::factory()->create([
            'name' => 'Taylor Swift',
            'country' => 'USA',
        ]);

        $album = Album::factory()->create([
            'artist_id' => $artist->id,
            'title' => 'The Life of a Showgirl',
            'release_date' => '2025-10-03',
        ]);

        $tracks = [
            ['The Fate of Ophelia', 3 * 60 + 46],
            ['Elizabeth Taylor', 3 * 60 + 28],
            ['Opalite', 3 * 60 + 55],
            ['Father Figure', 3 * 60 + 32],
            ['Eldest Daughter', 4 * 60 + 6],
            ['Ruin the Friendship', 3 * 60 + 40],
            ['Actually Romantic', 2 * 60 + 43],
            ['Wi$h Li$t', 3 * 60 + 27],
            ['Wood', 2 * 60 + 30],
            ['CANCELLED!', 3 * 60 + 31],
            ['Honey', 3 * 60 + 1],
            ['The Life of a Showgirl', 4 * 60 + 1],
        ];

        foreach ($tracks as $index => $data) {
            Track::factory()->create([
                'artist_id' => $artist->id,
                'album_id' => $album->id,
                'title' => $data[0],
                'duration_seconds' => $data[1],
                'position' => $index + 1,
            ]);
        }
    }
}
