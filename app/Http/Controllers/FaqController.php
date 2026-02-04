<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSection;

class FaqController extends Controller
{
    public function index()
    {
        // Get FAQs from page sections
        $faqSections = PageSection::where('page', 'faq')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        // Also get homepage FAQs for reference
        $homeFaqs = PageSection::where('page', 'home')
            ->where('section_name', 'faq')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        // Combine all FAQs
        $faqs = $faqSections->merge($homeFaqs);

        return view('pages.faq', compact('faqs'));
    }
}
