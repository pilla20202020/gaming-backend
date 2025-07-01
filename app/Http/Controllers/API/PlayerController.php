<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PlayerService;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class PlayerController extends Controller
{
    use ApiResponse;
    public function __construct(protected PlayerService $playerService) {}

    public function index()
    {
        $players = $this->playerService->getAll();
        return $this->successResponse($players, 'Players retrieved successfully');
    }

    public function show($id)
    {
        $player = $this->playerService->getById($id);
        if (!$player) {
            return $this->errorResponse('Player not found', 404);
        }
        return $this->successResponse($player, 'Player retrieved successfully');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'name' => 'required|string',
            'eliminations' => 'nullable|integer',
            'is_eliminated' => 'nullable|boolean',
            'is_knocked' => 'nullable|boolean',
            'is_in_zone' => 'nullable|boolean',
        ]);
        try {
            $player = $this->playerService->create($request->all());
            return $this->successResponse($player, 'Player created successfully', 201);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'name' => 'required|string',
            'eliminations' => 'nullable|integer',
            'is_eliminated' => 'nullable|boolean',
            'is_knocked' => 'nullable|boolean',
            'is_in_zone' => 'nullable|boolean',
        ]);
        $updatePlayer = $this->playerService->update($id, $data);
        if (!$updatePlayer) {
            return $this->errorResponse('Failed to update player', 500);
        }
        return $this->successResponse($updatePlayer, 'Player updated successfully');
    }

    public function destroy($id)
    {
        $deletePlayer = $this->playerService->delete($id);
        if ($deletePlayer != 1) {
            return $this->errorResponse('Failed to delete player', 500);
        }
        return $this->successResponse(null, 'Player deleted successfully');
    }
}
