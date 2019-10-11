<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

abstract class ApiController extends Controller
{

    /**
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return void response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function respondOK($message = null)
    {
        $this->setStatusCode(Response::HTTP_OK);

        if ($message) {
            return $this->respond([
                'status'        => 'success',
                'status_code'   => $this->getStatusCode(),
                'message'       => $message,
            ]);
        }
        else {
            return $this->respond([
                'status'        => 'success',
                'status_code'   => $this->getStatusCode(),
            ]);
        }
    }

    public function respondCreated($message, $data = null)
    {
        $res = array(
            'status'      => 'success',
            'status_code' => Response::HTTP_CREATED,
            'message'     => $message,
        );

        if (!is_null($data))
            $res['data'] = $data;

        return $this->respond($res);
    }

    public function respondNotFound($message = 'Not Found!')
    {
        $this->setStatusCode(Response::HTTP_NOT_FOUND);

        return $this->respond([
            'status'        => 'error',
            'status_code'   => Response::HTTP_NOT_FOUND,
            'message'       => $message,
        ]);
    }

    public function respondInternalError($message)
    {
        $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);

        return $this->respond([
            'status'        => 'error',
            'status_code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message'       => $message,
        ]);
    }

    public function respondWithError($message)
    {
        $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);

        return $this->respond([
            'status'        => 'error',
            'status_code'   => $this->getStatusCode(),
            'message'       => $message,
        ]);
    }

    public function respondFailedDependency($message)
    {
        $this->setStatusCode(Response::HTTP_FAILED_DEPENDENCY);

        return $this->respond([
            'status'        => 'error',
            'status_code'   => Response::HTTP_FAILED_DEPENDENCY,
            'message'       => $message,
        ]);
    }

    public function respondUnprocessableEntity($message)
    {
        $this->setStatusCode(Response::HTTP_FAILED_DEPENDENCY);

        return $this->respond([
            'status'        => 'error',
            'status_code'   => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'       => $message,
        ]);
    }

    public function respondPreconditionFail($message)
    {
        $this->setStatusCode(Response::HTTP_PRECONDITION_FAILED);

        return $this->respond([
            'status'        => 'error',
            'status_code'   => Response::HTTP_PRECONDITION_FAILED,
            'message'       => $message,
        ]);
    }

    public function respondValidationError($message, $errors)
    {
        return $this->respond([
            'status'        => 'error',
            'status_code'   => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'       => $message,
            'data'          => $errors
        ]);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }
}
