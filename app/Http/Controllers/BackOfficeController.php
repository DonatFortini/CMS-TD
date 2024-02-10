<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Commentaire;
use App\Models\Page;

class BackOfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSite(Request $request)
    {
        $validatedData = $request->validate([
            'website_name' => 'required|string|max:255',
        ]);

        $site = Site::create([
            'nom' => $validatedData['website_name'],
            'dns' => sprintf("%s/%s", auth()->user()->nom, $validatedData['website_name']),
            'idUtilisateur' => auth()->user()->getAuthIdentifier(),
        ]);

        if ($site) {
            return redirect()->route(sprintf('backOffice/%s', $site->dns));
        } else {
            return redirect()->back()->with('error', 'Failed to create website. Please try again.');
        }
    }


    public function index($siteDns)
    {
        $site = Site::where('dns', $siteDns)->first();
    
        if (!$site) {
            abort(404, 'Site not found');
        }
    
        // Récupérez les objets Page complets au lieu des ID
        $pages = Page::where('idSite', $site->idSite)->get();
    
        $commentaires = Commentaire::whereIn('idPage', $pages->pluck('idPage'))->get();
    
        return view('backOffice', [
            'site' => $site,
            'commentaires' => $commentaires,
            'pages' => $pages,
            'dns' => $siteDns
        ]);
    }

    public function createSite()
    {
        // Vous pouvez passer des données supplémentaires à la vue si nécessaire, comme une liste de templates disponibles
        return view('createSite');
    }
    
    
    

  
}