<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloc;

class BlockController extends Controller
{
    // Définition des hauteurs par défaut comme propriété protégée de la classe
    protected $defaultBlockHeights = [
        'text_zone' => 200,
        'image' => 200,
        'titre' => 100,
        'sous_titre' => 80,
        'form' => 450,
        'contact' => 400
    ];

    protected $defaultBlockContent = [
        'text_zone' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'image' => '',
        'titre' => 'Choisissez un titre pour votre block',
        'sous_titre' => 'Choisissez un sous-titre pour votre block',
        'form' => '',
        'contact' => ''
    ];

    public function getBlockContent($type, $idPage)
    {
        $lastIdBloc = Bloc::latest('idBloc')->first()->idBloc ?? 0;

        $defaultHeightBloc = $this->defaultBlockHeights[$type] ?? 200;
        $defaultContentBloc = $this->defaultBlockContent[$type] ?? '';  

        $bloc = new \stdClass();
        $bloc->idBloc = $lastIdBloc + 1;
        $bloc->contenu = $defaultContentBloc;
        $bloc->hauteur = $defaultHeightBloc;
        $bloc->type = $type;
        $bloc->idPage = $idPage;

        return view("templates.utils2.$type", ['bloc' => $bloc]);
    }
}
