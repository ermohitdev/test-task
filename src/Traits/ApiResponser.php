<?php

namespace App\Traits;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ApiResponser {
    protected function successResponse($data, $message = null, $code = 200)
	{
		return$this->json([
			'status'=> 'Success', 
			'message' => $message, 
			'data' => $data
		], $code);
	}

	protected function errorResponse($message = null, $code)
	{
		return$this->json([
			'status'=>'Error',
			'message' => $message,
			'data' => null
		], $code);
	}
}