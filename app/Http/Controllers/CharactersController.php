<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class CharactersController extends Controller
{
    public function index(Request $request)
    {

        try {

            $client = new GuzzleHttpClient();
            $url = 'https://swapi.co/api/people/';
            $results = [];
            $cont = 0;
            do {
                $apiRequest = $client->request('GET', $url);
                $data = json_decode($apiRequest->getBody()->getContents());
                if (isset($data->results) && !empty($data->results)) {
                    $results = array_merge($results, $data->results);
                } else {
                    break;
                }
                $url = $data->next;
                $cont++;
                sleep(2);
            } while(!empty($data->next) && $cont < 1); //until 5 because we want 50

            //sort if needed
            if (isset($request->sort) && !empty($request->sort)) {
                usort($results, function ($x, $y) use ($request) {
                    if ($x->{$request->sort} == $y->{$request->sort}) {
                        return 0;
                    }
                    return ($x->{$request->sort} < $y->{$request->sort}) ? -1 : 1;
                });
            }

            return view('characters', [
                'data' => (object) [
                    "results" => $results,
                    "filter" => (isset($request->sort) && !empty($request->sort)) ? $request->sort : null
                ]
            ]);

        } catch (RequestException $re) {
            //For handling exception
        }
        return null;
    }
}
