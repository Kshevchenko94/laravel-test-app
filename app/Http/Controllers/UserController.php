<?php

namespace App\Http\Controllers;

use App\Events\UserSettingsSaved;
use App\Http\Requests\UserSettingsRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @param UserSettingsRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateSettings(UserSettingsRequest $request, int $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $userSettingCreated = $user->userSettings()->updateOrCreate([
            'senderMethod' => $request->get('senderMethod')
        ]);
        event(new UserSettingsSaved($userSettingCreated));
        return response()->json($user);
    }
}
