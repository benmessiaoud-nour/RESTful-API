<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Faundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController{
use AuthorizesRequests;
}

