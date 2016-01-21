<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;
use App\Http\Controllers\Controller;

class ApiController extends Controller {
    protected $code;
    /**
     * Set a message that something went right with the API
     *
     * @return Response
     */
    protected function setSuccess($message) {
        $arr = [
            'message' => $message,
            'code'    => $this->code,
        ];
        return response()->json($arr, $this->code);
    }
    /**
     * Set a message that something went right wrong with the API
     *
     * @return Response
     */
    protected function setError($message) {
        $arr = [
            'errors' => [
                'messgae' => $message,
                'code'    => $this->code,
            ]
        ];
        return response()->json($arr, $this->code);
    }
    /**
     * Set a status code to return with the API
     *
     * @return Response
     */
    protected function setStatusCode($code) {
        $this->code = $code;
        return $this;
    }
}
