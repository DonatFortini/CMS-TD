<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Commentaire;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\Bloc;

class BackOfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSite(Request $request)
    {
        $validatedData = $request->validate([
            'site_name' => 'required|string|max:255',
            'navbar_template' => 'required|string|max:255',
            'main_template' => 'required|string|max:255',
            'footer_template' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'font-color' => 'required|string|max:255',
            'font-policy' => 'required|string|max:255',
            'description1' => 'nullable|string|max:255',
            'description2' => 'nullable|string|max:255',
            'auteur' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:1000',
        ]);

        $dns = sprintf("%s.%s", Auth::user()->email, $validatedData['site_name']);

        $site = Site::create([
            'nom' => $validatedData['site_name'],
            'dns' => $dns,
            'idUtilisateur' => Auth::user()->idUtilisateur,
            'pathNavbar' => $validatedData['navbar_template'],
            'pathFooter' => $validatedData['footer_template'],
            'pathBody' => $validatedData['main_template'],
            'couleurBackground' => $validatedData['color'],
            'couleurPolicy' => $validatedData['font-color'],
            'fontPolicy' => $validatedData['font-policy'],
            'description1' => $validatedData['description1'],
            'description2' => $validatedData['description2'],
            'auteur' => $validatedData['auteur'],
            'logo' => $validatedData['logo'],
        ]);

        if ($site) {
            return redirect()->route('backOffice', ['dns' => $site->dns])->with('success', 'Website created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create website. Please try again.');
        }
    }

    public function addPage(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'idSite' => 'required|integer',
        ]);

        $path = sprintf("%s.%s", Site::find($validatedData['idSite'])->dns, $validatedData['titre']);

        $page = Page::create([
            'nom' => $validatedData['titre'],
            'idSite' => $validatedData['idSite'],
            'dns' => $path,
        ]);

        if ($page) {
            return redirect()->route('backOffice', ['dns' => Site::find($validatedData['idSite'])->dns])->with('success', 'Page created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create page. Please try again.');
        }
    }

    public function addBloc(Request $request)
    {
        $validatedData = $request->validate([
            'blocks' => 'required|array',
            'idPage' => 'required|integer',
        ]);

        $blocksData = $validatedData['blocks'];
        $idPage = $validatedData['idPage'];

        Bloc::where('idPage', $idPage)->delete();

        foreach ($blocksData as $blockData) {
            Bloc::create([
                'idPage' => $idPage,
                'type' => $blockData['type'],
                'ordre' => $blockData['order'],
                'hauteur' => $blockData['height'],
                'contenu' => $blockData['contenu'] ?? null
            ]);
        }

        return response()->json($blocksData);
    }



    public function index($siteDns)
    {
        $site = Site::where('dns', $siteDns)->firstOrFail();

        $pages = Page::where('idSite', $site->idSite)
            ->with([
                'blocs' => function ($query) {
                    $query->orderBy('ordre', 'asc');
                }
            ])->get();

        $commentaires = Commentaire::whereIn('idPage', $pages->pluck('idPage'))->get();

        return view('backOffice', [
            'site' => $site,
            'commentaires' => $commentaires,
            'pages' => $pages,
            'dns' => $siteDns
        ]);
    }






}