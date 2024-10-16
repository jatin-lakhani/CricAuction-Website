<?php

namespace App\Http\Controllers\Api;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
	public function register(Request $request)
	{
		$messages = [
			'name.required' => 'Name is required.',
			'email.required' => 'Email is required.',
			'email.unique' => 'The email has already been taken.',
			'phoneNumber.unique' => 'The phone number has already been taken.',
		];
		$validator = Validator::make($request->all(), [
			'name' => 'required|string|max:255',
			'email' => 'required|unique:users',
			'phoneNumber' => 'nullable|unique:users',
			'password' => 'required|string',
		], $messages);

		if ($validator->fails()) {
			return apiValidationError($validator->messages());
		}
		try {
			$phoneNumber = str_replace(' ', '', $request->phoneNumber);
			$user = new User();
			if ($request->hasfile('profile')) {
				$file = $request->file('profile');
				$filePath = FileUploadHelper::uploadFile($file, 'upload/profile_image');
				$user->profile = $filePath;
			}
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = $request->password;
			$user->phoneNumber = $phoneNumber;
			$user->city = $request->city;
			$user->save();
			$token = $user->createToken('token-name')->plainTextToken;
			return apiResponse('User registered successfully.', ['token' => $token]);
		} catch (\Exception $e) {
			logError($e);
			return apiErrorResponse($e->getMessage());
		}
	}

	public function login(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
		]);

		if ($validator->fails()) {
			return apiValidationError($validator->messages());
		}
		$user = User::where('email', $request->email)->first();
		if (!$user) {
			return apiErrorResponse('User not found.', 404);
		}
		if ($user->status == User::STATUS['INACTIVE']) {
			return apiFalseResponse('Your account is under verification. Please contact support for further assistance.');
		}
		if ($user->status == User::STATUS['DELETED']) {
			return apiFalseResponse('Your account seems to be deleted. Please contact support for further assistance.');
		}
		if (!Hash::check($request->password, $user->password)) {
			return apiFalseResponse('Invalid email or password');
		}
		$token = $user->createToken('token-name')->plainTextToken;
		return apiResponse('User logged in successfully', ['token' => $token]);
	}

	public function logout(Request $request)
	{
		$request->user()->currentAccessToken()->delete();
		return apiResponse('Logout Successful');
	}

	public function deleteAccount(Request $request)
	{
		$user = $request->user();

		DB::beginTransaction();
		try {
			$rides = $user->publishedRides()->where('status', 'Active')->whereHas('RideShareBooking', function ($query) {
				$query->where('status', 'Approved')->where('payment_mode', 'Card')->whereIn('trip_status', ['Pending', 'Pickup']);
			})->count();
			if ($rides) {
				return apiFalseResponse('Account cannot be deleted. Pending published ride bookings available');
			}
			$user->status = 2;
			$user->save();
			DB::commit();
			return apiResponse('Account deleted successfully');
		} catch (\Exception $e) {
			logError($e);
			return apiErrorResponse($e->getMessage());
		}
	}
}
