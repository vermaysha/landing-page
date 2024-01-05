<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Retrieves the view for the index page.
     *
     * @param Request $request the HTTP request object
     * @return View the rendered view for the index page
     */
    public function index(Request $request): View
    {
        return view('dashboard.home');
    }
}
