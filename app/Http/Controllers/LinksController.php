<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function show()
    {
        return view('links.show');
    }
    public function send(LinksRequest $request)
    {
        dd($request->all());

        $url = $request::input('url');
        $description = $request->input('description', null);
    }
}
