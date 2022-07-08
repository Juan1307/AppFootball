<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class HttpService {

  private string $url;
  private string $token;

  private array $headerToken;

  public function __construct() {
    $this->url = env('FOOTBALL_URL');
    $this->token = env('FOOTBALL_TOKEN');

    $this->headerToken = ["X-Auth-Token" => $this->token];
  }

  public function currentApi(?array $headers = NULL) {
    $currentHeader = (is_null($headers)) ? $this->headerToken : $this->headerToken + $headers; 

    return Http::withHeaders($currentHeader)->baseUrl($this->url);
  } 

  public function check($response, ?string $key = NULL) {
    $currentResponse = (is_null($key)) ? $response->json() : $response->json($key);

    return ($response->status() === 429) ? ['time_out' => $response->json('message')] : $currentResponse;
  }
}
