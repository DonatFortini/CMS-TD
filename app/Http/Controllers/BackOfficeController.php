<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Commentaire;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageService;

class BackOfficeController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->middleware('auth');
        $this->imageService = $imageService;
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
        ]);
    
        $dns = sprintf("%s.%s",  Auth::user()->email, $validatedData['site_name']);

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
        ]);
    
        if ($site) {
            $filename = Auth::user()->email . '_' . $validatedData['site_name'];
            $this->imageService->generateImage($validatedData['site_name'], $filename);

            return redirect()->route('backOffice', ['dns' => $site->dns])->with('success', 'Website created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create website. Please try again.');
        }
    }
    
    
    public function index($siteDns)
    {
        $site = Site::where('dns', $siteDns)->firstOrFail();
    
        $pages = Page::where('idSite', $site->idSite)->with('blocs')->get();
    
        $commentaires = Commentaire::whereIn('idPage', $pages->pluck('idPage'))->get();
    
        return view('backOffice', [
            'site' => $site,
            'commentaires' => $commentaires,
            'pages' => $pages,
            'dns' => $siteDns
        ]);
    }


    
    
    

  
}