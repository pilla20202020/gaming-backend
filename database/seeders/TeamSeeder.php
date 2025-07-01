<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            'Manchester United',
            'Chelsea',
            'Arsenal',
            'Liverpool',
        ];

        foreach ($teams as $teamName) {
            Team::create(['name' => $teamName]);
        }
    }
}
