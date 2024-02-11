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
        
        return view('siteView', [
            'site' => $site,
            'pages' => $pages
        ]);
    }
}
