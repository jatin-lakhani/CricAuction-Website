<?php

if (!function_exists('apiResponse')) {
    /**
     * Return a JSON response for API.
     *
     * @param mixed $data
     * @param int $statusCode
     * @param string|null $message
     * @return \Illuminate\Http\JsonResponse
     */
    function apiResponse($message = null, $data = [], $statusCode = 200, $success = true)
    {
        $response = [
            'success' => $success,
            'status_code' => $statusCode,
            'message' => $message
        ];
        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }
}

if (!function_exists('apiFalseResponse')) {
    /**
     * Return a JSON response for API.
     *
     * @param array $data
     * @param int $statusCode
     * @param string|null $message
     * @return \Illuminate\Http\JsonResponse
     */
    function apiFalseResponse($message = null, $data = [], $statusCode = 200, $success = false)
    {
        $response = [
            'success' => $success,
            'status_code' => $statusCode,
            'message' => $message
        ];
        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }
}

if (!function_exists('apiErrorResponse')) {
    /**
     * Return an error JSON response for API.
     *
     * @param string $errorMessage
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiErrorResponse($errorMessage, $statusCode = 500)
    {
        $response = [
            'success' => false,
            'status_code' => $statusCode,
            'message' => $errorMessage
        ];

        return response()->json($response, $statusCode);
    }
}

if (!function_exists('apiValidationError')) {
    /**
     * Return a validation error JSON response for API.
     *
     * @param mixed $errors
     * @return \Illuminate\Http\JsonResponse
     */
    function apiValidationError($errors, $statusCode = 422)
    {
        $response = [
            'success' => false,
            'status_code' => $statusCode,
            'errors' => $errors
        ];
        return response()->json($response, 422);
    }
}

if (!function_exists('apiUnauthenticatedError')) {
    /**
     * Return a unauthenticated error JSON response for API.
     *
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiUnauthenticatedError($message = null, $statusCode = 401)
    {

        $response = [
            'success' => false,
            'status_code' => $statusCode,
            'message' => $message ?? get_language_value_by_label('LBL_ANOTHER_DEVICE_LOGIN_TXT')
        ];
        return response()->json($response, 401);
    }
}

if (!function_exists('isApiRequest')) {
    /**
     * Check if the request is an API request.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return bool
     */
    function isApiRequest($request = null)
    {
        $request = $request ?: request();
        return $request->expectsJson();
    }
}

if (!function_exists('logError')) {
    function logError(\Exception $e, $message = null)
    {
        $action = \Route::currentRouteAction();
        $logMessage = $message ? "{$message} - " : '';
        $logMessage .= "Error in {$action} \n";
        $logMessage .= "Error Message => " . $e->getMessage();
        \Log::channel('daily')->error($logMessage);
    }
}