<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSection;
use App\Models\TeamMember;
use App\Models\Service;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        return view('pages.about', compact('teamMembers', 'services'));
    }
}
