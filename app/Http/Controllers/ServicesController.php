<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PageSection;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->orderBy('title')
            ->get();

        return view('pages.services', compact('services'));
    }
}
