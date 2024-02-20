<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Page;
use Illuminate\Http\Request;

class SiteViewController extends Controller
{
    public function showSite($dns)
    {
        $site = Site::where('dns', $dns)->firstOrFail();
        $pages = Page::where('idSite', $site->idSite)->get();
        $pages = collect(json_decode($pages));
        $orientation = $site->pathNavbar == "vertical" ? "flex" : "flex-col";
        
        return view('siteView', [
            'site' => $site,
            'pages' => $pages,
            'orientation' => $orientation,
        ]);
    }

    public function showPage($dns)
    {
        $page = Page::where('dns', $dns)
                    ->with('blocs')
                    ->firstOrFail();
        $isViewMode = true;
        $site = Site::where('idSite', $page->idSite)->firstOrFail();

        return view('pageView', [
            'page' => $page,
            'site' => $site,
            'isViewMode' => $isViewMode
        ]);
    }
}