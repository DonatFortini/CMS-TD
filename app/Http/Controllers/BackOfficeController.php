<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

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


    public function index()
    {
        $pages = Site::find(1)->pages;
        $commentaires = Site::find(1)->commentaires;
        return view('backOffice');
    }

    // Autres méthodes pour gérer le back-office
}