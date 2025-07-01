<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublishNotificationRequest;
use App\Http\Requests\FetchRecentNotificationsRequest;
use App\Services\TeamService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ApiResponse;
    public function __construct(protected TeamService $teamService) {}

    public function index()
    {
        $teams = $this->teamService->getAllTeams();
        return $this->successResponse($teams, 'Teams retrieved successfully');
    }

    public function show($id)
    {
        $team = $this->teamService->getTeam($id);
        if (!$team) {
            return $this->errorResponse('Team not found', 404);
        }
        return $this->successResponse($team, 'Team retrieved successfully');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string']);
        $storeTeam = $this->teamService->createTeam($data);
        if (!$storeTeam) {
            return $this->errorResponse('Failed to create team', 500);
        }
        return $this->successResponse($storeTeam, 'Team created successfully', 201);

    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['name' => 'required|string']);
        $updateTeam = $this->teamService->updateTeam($id, $data);
        if (!$updateTeam) {
            return $this->errorResponse('Failed to update team', 500);
        }
        return $this->successResponse($updateTeam, 'Team updated successfully');
    }

    public function destroy($id)
    {
        $deleteTeam = $this->teamService->deleteTeam($id);
        if ($deleteTeam != 1) {
            return $this->errorResponse('Failed to delete team', 500);
        }
        return $this->successResponse(null, 'Team deleted successfully');
    }

    public function winningPercentages()
    {
        $teams = $this->teamService->getTeamsWithWinPercent();
        if (empty($teams)) {
            return $this->errorResponse('No teams found', 404);
        }
        return $this->successResponse($teams, 'Teams with winning percentages retrieved successfully');
    }
}
