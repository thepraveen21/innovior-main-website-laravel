<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::first();
        
        return view('admin.header.index', compact('header'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'nullable|image|max:2048',
            'logo_alt_text' => 'nullable|string|max:255',
        ]);

        $header = Header::firstOrNew();
        
        if ($request->hasFile('logo')) {
            if ($header->logo) {
                Storage::disk('public')->delete($header->logo);
            }
            $validated['logo'] = $request->file('logo')->store('header', 'public');
        }

        $header->fill($validated)->save();
        
        return redirect()->route('admin.header.index')->with('success', 'Header updated successfully.');
    }
}
