<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;
use App\Models\Link;
use App\Service\LinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function show()
    {
        return view('links.show');
    }
    public function send(LinksRequest $request, LinkService $service)
    {

        $url = $request->input('url');
        $description = $request->input('description', null);

        $urlPrefix = $service->get(linkPrefixGenerate());
        $link = Link::create([
            'source_link' => $url,
            'link_key' => $urlPrefix,
            'description' => $description

        ]);

        if($link)
        {
            return back()->with('success', route('links.away', ['prefix'=>$urlPrefix]));
        }
    }
}
