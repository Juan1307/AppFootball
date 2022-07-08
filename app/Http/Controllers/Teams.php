<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\HttpService;

class Teams extends Controller
{
  public function index(HttpService $http) {
    $response = $http->currentApi()->get('/teams/');
    return $http->check($response,'teams');
  }
}
