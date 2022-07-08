<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\HttpService;

class Competitions extends Controller
{
  public function index(HttpService $http) {
    
    $response = $http->currentApi()->get('/competitions/');
    return $http->check($response, 'competitions'); //we can pass a key 
  }

  public function subindex($idx, HttpService $http) {
    settype($idx, "int");

    $response = $http->currentApi()->get('/competitions/'.$idx.'/teams');
    return $http->check($response);
  }
  
}
