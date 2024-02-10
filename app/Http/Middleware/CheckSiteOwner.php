<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Site;

class CheckSiteOwner
{
    public function handle(Request $request, Closure $next)
    {
        $siteDns = $request->route('dns'); // Récupère le paramètre 'dns' de la route
        $site = Site::where('dns', $siteDns)->first();

        if (!$site || $site->idUtilisateur != auth()->id()) {
            // Si le site n'existe pas ou si l'utilisateur actuel n'est pas le propriétaire
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
