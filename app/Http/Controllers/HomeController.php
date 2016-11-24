<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
  public function index(Request $request)

{

  $items = [];

  if($request->has('username')){

$client = new \GuzzleHttp\Client;
$url = sprintf('https://www.instagram.com/%s/media', $request->input('username'));
     $response = $client->get($url);
     $items = json_decode((string) $response->getBody(), true)['items'];
  }
  return view('welcome',compact('items'));
}

}
