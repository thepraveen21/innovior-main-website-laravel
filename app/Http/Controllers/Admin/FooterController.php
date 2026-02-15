<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        
        return view('admin.footer.index', compact('footer'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string|max:1000',
            'facebook_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'copyright_text' => 'nullable|string|max:500',
        ]);

        $footer = Footer::firstOrNew();
        $footer->fill($validated)->save();
        
        return redirect()->route('admin.footer.index')->with('success', 'Footer updated successfully.');
    }
}
