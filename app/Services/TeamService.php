<?php

namespace App\Services;

use App\Repositories\Interfaces\TeamRepositoryInterface;

class TeamService
{
    public function __construct(protected TeamRepositoryInterface $teamRepository) {}

    public function getAllTeams() { return $this->teamRepository->all(); }

    public function getTeam($id) { return $this->teamRepository->find($id); }

    public function createTeam(array $data) { return $this->teamRepository->create($data); }

    public function updateTeam($id, array $data) { return $this->teamRepository->update($id, $data); }

    public function deleteTeam($id) { return $this->teamRepository->delete($id); }

    public function getTeamsWithWinPercent() { return $this->teamRepository->getWithWinPercentage(); }
}
