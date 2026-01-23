<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactHero;
use App\Models\ContactInfo;
use App\Models\ContactInfoCard;
use App\Models\ContactFormSettings;
use App\Models\ContactMap;
use Illuminate\Http\Request;

class ContactContentController extends Controller
{
    public function index()
    {
        $hero = ContactHero::first();
        $info = ContactInfo::first();
        $infoCards = ContactInfoCard::orderBy('order')->get();
        $formSettings = ContactFormSettings::first();
        $map = ContactMap::first();

        return view('admin.contact-content.index', compact('hero', 'info', 'infoCards', 'formSettings', 'map'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'background_image' => 'nullable|image|max:2048'
        ]);

        $hero = ContactHero::first();
        
        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('contact', 'public');
            $validated['background_image'] = $path;
        }

        if ($hero) {
            $hero->update($validated);
        } else {
            ContactHero::create($validated);
        }

        return redirect()->route('admin.contact-content.index')->with('success', 'Hero section updated successfully');
    }

    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $info = ContactInfo::first();
        
        if ($info) {
            $info->update($validated);
        } else {
            ContactInfo::create($validated);
        }

        return redirect()->route('admin.contact-content.index')->with('success', 'Contact info updated successfully');
    }

    public function storeInfoCard(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'icon_color' => 'required|string|max:50',
            'order' => 'required|integer'
        ]);

        ContactInfoCard::create($validated);

        return redirect()->route('admin.contact-content.index')->with('success', 'Info card added successfully');
    }

    public function updateInfoCard(Request $request, ContactInfoCard $card)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'icon_color' => 'required|string|max:50',
            'order' => 'required|integer'
        ]);

        $card->update($validated);

        return redirect()->route('admin.contact-content.index')->with('success', 'Info card updated successfully');
    }

    public function deleteInfoCard(ContactInfoCard $card)
    {
        $card->delete();
        return redirect()->route('admin.contact-content.index')->with('success', 'Info card deleted successfully');
    }

    public function updateFormSettings(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'submit_button_text' => 'required|string|max:100',
            'success_message' => 'required|string'
        ]);

        $settings = ContactFormSettings::first();
        
        if ($settings) {
            $settings->update($validated);
        } else {
            ContactFormSettings::create($validated);
        }

        return redirect()->route('admin.contact-content.index')->with('success', 'Form settings updated successfully');
    }

    public function updateMap(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'map_embed_url' => 'required|string'
        ]);

        $map = ContactMap::first();
        
        if ($map) {
            $map->update($validated);
        } else {
            ContactMap::create($validated);
        }

        return redirect()->route('admin.contact-content.index')->with('success', 'Map section updated successfully');
    }
}
