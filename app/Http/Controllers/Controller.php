<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function ok($data)
    {
        if (is_object($data)) {
            $data = json_decode(json_encode($data), true);
        }
        return Response::create($data, Response::HTTP_OK);
    }
}
