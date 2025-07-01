<?php

namespace App\Repositories\Implementations;

use App\Models\Player;
use App\Repositories\Interfaces\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function all()
    {
        return Player::with('team')->get();
    }

    public function find($id)
    {
        return Player::with('team')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Player::create($data);
    }

    public function update($id, array $data)
    {
        $player = Player::findOrFail($id);
        $player->update($data);
        return $player;
    }

    public function delete($id)
    {
        return Player::destroy($id);
    }
}
