<?php

namespace App\Services;

use App\Repositories\Interfaces\PlayerRepositoryInterface;
use App\Models\Player;
use Exception;

class PlayerService
{
    public function __construct(protected PlayerRepositoryInterface $playerRepo) {
        $this->playerRepo = $playerRepo;
    }

    public function getAll() { return $this->playerRepo->all(); }

    public function getById($id) { return $this->playerRepo->find($id); }

    public function create(array $data)
    {
        $teamId = $data['team_id'];


        $playerCount = Player::where('team_id', $teamId)->count();

        if ($playerCount >= 4) {
            throw new Exception('A team cannot have more than 4 players.');
        }

        return $this->playerRepo->create($data);
    }

    public function update($id, array $data) { return $this->playerRepo->update($id, $data); }

    public function delete($id) { return $this->playerRepo->delete($id); }
}
