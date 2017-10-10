<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        try {

            $client = new GuzzleHttpClient();

            $apiRequest = $client->request('GET', 'https://swapi.co/api/people/', [
                'query' => ['search' => $request->name],
            ]);

            $data = json_decode($apiRequest->getBody()->getContents());

            return view('character', [
                'data' => reset($data->results)
            ]);

        } catch (RequestException $re) {
            //For handling exception
        }
        return null;
    }
}
