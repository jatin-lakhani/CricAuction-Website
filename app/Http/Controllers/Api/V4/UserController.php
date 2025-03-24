<?php

namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use App\Http\Resources\V4\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function get_profile(Request $request)
    {
        try {
            $user = Auth::user();
            return apiResponse('Profile get successfully', new UserResource($user));
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }
    public function update_profile(Request $request)
    {
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }
        try {
            $user = Auth::user();
            // Check if phone number is changed and already exists
            $phoneNumber = str_replace(' ', '', $request->phoneNumber);
            $old_phoneNumber = str_replace(' ', '', $user->phoneNumber);
            if (!empty($phoneNumber) && $old_phoneNumber != $phoneNumber) {
                $phoneNumberExists = User::where('phoneNumber', $request->phoneNumber)->count();
                if ($phoneNumberExists > 0) {
                    return apiErrorResponse('User with this phoneNumber already exists.', 409);
                }
            }
            if (!empty($request->email) && $user->email != $request->email) {
                $emailExists = User::where('email', $request->email)->count();
                if ($emailExists > 0) {
                    return apiErrorResponse('User with this email already exists.', 409);
                }
            }
            // if ($request->hasfile('profile')) {
            //     $file = $request->file('profile');
            //     $filePath = FileUploadHelper::uploadFile($file, 'upload/profile_image');
            //     $user->profile = $filePath;
            // }
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->has('password') && !empty($request->input('password'))) {
                $user->password = $request->password;
            }
            $user->phoneNumber = $phoneNumber;
            $user->city = $request->city;
            $user->save();
            return apiResponse('Profile data updated successfully');
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function migrateUserDate(Request $request)
    {
        set_time_limit(600);
        echo ini_get('max_execution_time');
        $jsonContent = file_get_contents(storage_path('CricAuction-UserData.json'));
        $json = json_decode($jsonContent, true);
        $usersData = $json['user'];
        if (empty($usersData)) {
            return 'No data found in table';
        }

        $batchSize = 100;
        $chunks = array_chunk($usersData, $batchSize, true);
        foreach ($chunks as $index => $batch) {
            $insertData = [];
            foreach ($batch as $uid => $user) {
                $insertData[] = [
                    'uid' => $uid ?? '',
                    'name' => $user['name'] ?? '',
                    'email' => $user['email'] ?? '',
                    'phoneNumber' => $user['phoneNumber'] ?? '',
                    'city' => $user['city'] ?? '',
                    'password' => isset($user['password']) ? bcrypt($user['password']) : '',
                    'signInType' => json_encode($user['signInType'] ?? []),
                    'firebase_token' => $user['notificationId'] ?? '',
                    'profile' => $user['image'] ?? null,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            User::upsert($insertData, ['uid'], ['name', 'email', 'phoneNumber', 'city', 'password', 'signInType', 'firebase_token', 'profile', 'email_verified_at']);
            // Optional: Log progress for each batch
            \Log::info("Processed batch {$index} with " . count($batch) . " users.");
        }
        return "Data imported successfully";


        // $insertData = [];
        // foreach ($usersData as $uid => $user) {
        //     $insertData[] = [
        //         'uid' => $uid ?? '',
        //         'name' => $user['name'] ?? '',
        //         'email' => $user['email'] ?? '',
        //         'phone_number' => $user['phoneNumber'] ?? '',
        //         'city' => $user['city'] ?? '',
        //         'password' => isset($user['password']) ? bcrypt($user['password']) : '',
        //         'signInType' => json_encode($user['signInType'] ?? []),
        //         'firebase_token' => $user['notificationId'] ?? '',
        //         'profile' => $user['image'] ?? null,
        //         'email_verified_at' => now(),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // User::upsert($insertData, ['uid'], ['name', 'email', 'phone_number', 'city', 'password', 'signInType', 'firebase_token', 'profile', 'email_verified_at']);
    }
}
