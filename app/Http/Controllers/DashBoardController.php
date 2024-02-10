<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Assurez-vous d'importer votre modèle Site ou le modèle approprié
use App\Models\Site; // Remplacez 'Site' par le nom réel de votre modèle de sites

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Récupérez les sites de l'utilisateur actuellement authentifié
        // Remplacez 'user_id' par la clé étrangère appropriée dans votre table de sites, si différente
        $sites = Site::where('idUtilisateur', auth()->id())->get();

        // Passez les sites à la vue
        return view('dashboard', compact('sites'));
    }
    
}
