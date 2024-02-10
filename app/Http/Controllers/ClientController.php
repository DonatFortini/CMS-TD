<?php
namespace App\Http\Controllers;

class ClientController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $params = "burger/simple/modern";
        $paramsArray = explode('/', $params);
        return view('client', compact('paramsArray'));
    }
}
