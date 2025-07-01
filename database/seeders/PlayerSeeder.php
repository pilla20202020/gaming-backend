<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Team;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $players = [
            'Manchester United' => [
                [
                    'name' => 'Bruno Fernandes', 'eliminations' => 5,
                    'is_eliminated' => false, 'is_knocked' => true, 'is_in_zone' => true
                ],
                [
                    'name' => 'Marcus Rashford', 'eliminations' => 4,
                    'is_eliminated' => false, 'is_knocked' => false, 'is_in_zone' => true
                ],
                [
                    'name' => 'Casemiro', 'eliminations' => 3,
                    'is_eliminated' => true, 'is_knocked' => false, 'is_in_zone' => false
                ],
                [
                    'name' => 'Lisandro Martínez', 'eliminations' => 2,
                    'is_eliminated' => false, 'is_knocked' => true, 'is_in_zone' => true
                ],
            ],
            'Chelsea' => [
                [
                    'name' => 'Raheem Sterling', 'eliminations' => 4,
                    'is_eliminated' => true, 'is_knocked' => false, 'is_in_zone' => true
                ],
                [
                    'name' => 'Reece James', 'eliminations' => 2,
                    'is_eliminated' => false, 'is_knocked' => false, 'is_in_zone' => false
                ],
                [
                    'name' => 'Enzo Fernández', 'eliminations' => 3,
                    'is_eliminated' => true, 'is_knocked' => false, 'is_in_zone' => false
                ],
                [
                    'name' => 'Mykhailo Mudryk', 'eliminations' => 1,
                    'is_eliminated' => false, 'is_knocked' => false, 'is_in_zone' => true
                ],
            ],
            'Arsenal' => [
                [
                    'name' => 'Bukayo Saka', 'eliminations' => 6,
                    'is_eliminated' => true, 'is_knocked' => false, 'is_in_zone' => false
                ],
                [
                    'name' => 'Martin Ødegaard', 'eliminations' => 5,
                    'is_eliminated' => false, 'is_knocked' => true, 'is_in_zone' => true
                ],
                [
                    'name' => 'Gabriel Jesus', 'eliminations' => 3,
                    'is_eliminated' => false, 'is_knocked' => false, 'is_in_zone' => false
                ],
                [
                    'name' => 'William Saliba', 'eliminations' => 2,
                    'is_eliminated' => true, 'is_knocked' => false, 'is_in_zone' => true
                ],
            ],
            'Liverpool' => [
                [
                    'name' => 'Mohamed Salah', 'eliminations' => 7,
                    'is_eliminated' => true, 'is_knocked' => false, 'is_in_zone' => true
                ],
                [
                    'name' => 'Virgil van Dijk', 'eliminations' => 2,
                    'is_eliminated' => false, 'is_knocked' => false, 'is_in_zone' => false
                ],
                [
                    'name' => 'Trent Alexander-Arnold', 'eliminations' => 3,
                    'is_eliminated' => false, 'is_knocked' => true, 'is_in_zone' => true
                ],
                [
                    'name' => 'Luis Díaz', 'eliminations' => 4,
                    'is_eliminated' => false, 'is_knocked' => false, 'is_in_zone' => false
                ],
            ],
        ];

        foreach ($players as $teamName => $teamPlayers) {
            $team = Team::where('name', $teamName)->first();
            if (!$team) continue;

            foreach ($teamPlayers as $p) {
                Player::create([
                    'name'           => $p['name'],
                    'eliminations'   => $p['eliminations'],
                    'team_id'        => $team->id,
                    'is_eliminated'  => $p['is_eliminated'],
                    'is_knocked'     => $p['is_knocked'],
                    'is_in_zone'     => $p['is_in_zone'],
                ]);
            }
        }
    }
}
