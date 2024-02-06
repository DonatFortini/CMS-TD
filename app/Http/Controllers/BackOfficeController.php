<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assure que l'utilisateur est connecté
    }

    public function index()
    {

        return view('backOffice');
    }

    // Autres méthodes pour gérer le back-office
}