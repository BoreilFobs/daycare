<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\PageSection;

class TeamController extends Controller
{
    public function index()
    {
        $pageSections = all_page_sections('team');

        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return view('pages.team', compact('teamMembers', 'pageSections'));
    }
}
