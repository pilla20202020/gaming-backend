<?php

namespace App\Repositories\Implementations;

use App\Models\Team;
use App\Repositories\Interfaces\TeamRepositoryInterface;


class TeamRepository implements TeamRepositoryInterface
{
    public function all()
    {
        return Team::with('players')->get();
    }

    public function find($id)
    {
        return Team::with('players')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Team::create($data);
    }

    public function update($id, array $data)
    {
        $team = Team::findOrFail($id);
        $team->update($data);
        return $team;
    }

    public function delete($id)
    {
        return Team::destroy($id);
    }

    public function getWithWinPercentage(): array
    {
        $teams = Team::with('players')->get();
        $totalPoints = 0;

        foreach ($teams as $team) {
            $points = 1;
            foreach ($team->players as $player) {
                if (!$player->is_eliminated) $points += 15;
                $points += $player->eliminations * 2;
                if ($player->is_knocked) $points -= 2;
                if ($player->is_in_zone) $points += 2;
            }
            $team->raw_points = $points;
            $totalPoints += $points;
        }

        foreach ($teams as $team) {
            $team->win_percent = $totalPoints > 0
                ? round(($team->raw_points / $totalPoints) * 100, 2)
                : 0;
        }

        $sortedTeams = $teams->sortByDesc('win_percent')->values();

        return $sortedTeams->toArray();
    }

}
