<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        switch (\Auth::user()->getRole()) {
            case "administrador":
                return "Admin";
            case "cliente":
                return "Cliente";
            default:
                return "No tienes rol";
        }
    }
}
