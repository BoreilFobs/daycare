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

    public function show($id)
    {
        $service = Service::where('is_active', true)->findOrFail($id);

        $otherServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->orderBy('order')
            ->take(5)
            ->get();

        return view('pages.service-detail', compact('service', 'otherServices'));
    }
}
