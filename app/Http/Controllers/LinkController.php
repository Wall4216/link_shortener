<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;
use App\Models\Link;
use App\Service\LinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        $urlPrefix = $service->linkPrefixGenerate();
        $link = Link::create([
            'source_link' => $url,
            'link_key' => $urlPrefix,
            'description' => $description

        ]);

        if($link)
        {
            return back()->with('success', route('links.away', ['prefix'=>$urlPrefix]));
        }
        return back()->with('errors', 'Не удалось сохранить ссылку');
    }
    public function away(string $prefix)
    {
        $link = Link::where(['link_key' => $prefix])->first();
        if($link)
        {
            return redirect()->away($link->source_link);
        }
        throw new NotFoundHttpException('Prefix not found');
    }
}
