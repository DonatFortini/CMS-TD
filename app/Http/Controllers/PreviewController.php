<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function preview(Request $request)
    {
        $navbarTemplate = $request->query('navbar', 'burger');
        $mainTemplate = $request->query('main', 'complex');
        $footerTemplate = $request->query('footer', 'complex');

        $pages = collect([
            (object)['dns' => '#', 'nom' => 'Article 1'],
            (object)['dns' => '#', 'nom' => 'Article 2'],
            (object)['dns' => '#', 'nom' => 'Article 3'],
        ]);

        return view('preview', [
            'navbar' => $navbarTemplate,
            'main' => $mainTemplate,
            'footer' => $footerTemplate,
            'pages' => $pages,
        ]);
    }
}
