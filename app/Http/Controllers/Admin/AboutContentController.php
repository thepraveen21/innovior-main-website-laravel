<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHero;
use App\Models\AboutOverview;
use App\Models\AboutMvv;
use App\Models\AboutWhy;
use App\Models\AboutWhyItem;
use App\Models\AboutCulture;
use App\Models\AboutCultureHighlight;
use App\Models\AboutOffices;
use App\Models\AboutOfficeLocation;
use App\Models\AboutPartners;
use App\Models\AboutPartnerItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutContentController extends Controller
{
    public function index()
    {
        $hero = AboutHero::first() ?? new AboutHero();
        $overview = AboutOverview::first() ?? new AboutOverview();
        $mvv = AboutMvv::first() ?? new AboutMvv();
        $why = AboutWhy::first() ?? new AboutWhy();
        $whyItems = AboutWhyItem::where('about_why_id', $why->id ?? 0)->orderBy('order')->get();
        $culture = AboutCulture::first() ?? new AboutCulture();
        $cultureHighlights = AboutCultureHighlight::where('about_culture_id', $culture->id ?? 0)->orderBy('order')->get();
        $offices = AboutOffices::first() ?? new AboutOffices();
        $officeLocations = AboutOfficeLocation::where('about_offices_id', $offices->id ?? 0)->orderBy('order')->get();
        $partners = AboutPartners::first() ?? new AboutPartners();
        $partnerItems = AboutPartnerItem::where('about_partners_id', $partners->id ?? 0)->orderBy('order')->get();

        return view('admin.about-content.index', compact(
            'hero', 'overview', 'mvv', 'why', 'whyItems', 
            'culture', 'cultureHighlights', 'offices', 'officeLocations', 
            'partners', 'partnerItems'
        ));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'subtitle' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $hero = AboutHero::first();
        
        if ($request->hasFile('hero_image')) {
            if ($hero && $hero->hero_image) {
                Storage::disk('public')->delete($hero->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('heroes/about', 'public');
        }

        if ($hero) {
            $hero->update($validated);
        } else {
            AboutHero::create($validated);
        }

        return back()->with('success', 'Hero section updated successfully!');
    }

    public function updateOverview(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'stat1_number' => 'required|string|max:255',
            'stat1_label' => 'required|string|max:255',
            'stat2_number' => 'required|string|max:255',
            'stat2_label' => 'required|string|max:255',
            'stat3_number' => 'required|string|max:255',
            'stat3_label' => 'required|string|max:255',
            'stat4_number' => 'required|string|max:255',
            'stat4_label' => 'required|string|max:255',
        ]);

        $overview = AboutOverview::first();
        if ($overview) {
            $overview->update($validated);
        } else {
            AboutOverview::create($validated);
        }

        return back()->with('success', 'Overview section updated successfully!');
    }

    public function updateMvv(Request $request)
    {
        $validated = $request->validate([
            'mission_title' => 'required|string|max:255',
            'mission_description' => 'nullable|string',
            'mission_icon' => 'required|string|max:255',
            'vision_title' => 'required|string|max:255',
            'vision_description' => 'nullable|string',
            'vision_icon' => 'required|string|max:255',
            'values_title' => 'required|string|max:255',
            'values_description' => 'nullable|string',
            'values_icon' => 'required|string|max:255',
        ]);

        $mvv = AboutMvv::first();
        if ($mvv) {
            $mvv->update($validated);
        } else {
            AboutMvv::create($validated);
        }

        return back()->with('success', 'Mission, Vision & Values updated successfully!');
    }

    public function updateWhy(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        $why = AboutWhy::first();
        if ($why) {
            $why->update($validated);
        } else {
            AboutWhy::create($validated);
        }

        return back()->with('success', 'Why section heading updated successfully!');
    }

    public function storeWhyItem(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $why = AboutWhy::first();
        if (!$why) {
            $why = AboutWhy::create(['heading' => 'Why Choose Innovior', 'subtitle' => 'We bring more than just code to the table.']);
        }

        $validated['about_why_id'] = $why->id;
        AboutWhyItem::create($validated);

        return back()->with('success', 'Why item added successfully!');
    }

    public function updateWhyItem(Request $request, $id)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $item = AboutWhyItem::findOrFail($id);
        $item->update($validated);

        return back()->with('success', 'Why item updated successfully!');
    }

    public function deleteWhyItem($id)
    {
        AboutWhyItem::findOrFail($id)->delete();
        return back()->with('success', 'Why item deleted successfully!');
    }

    public function updateCulture(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $culture = AboutCulture::first();
        if ($culture) {
            $culture->update($validated);
        } else {
            AboutCulture::create($validated);
        }

        return back()->with('success', 'Culture section updated successfully!');
    }

    public function storeCultureHighlight(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $culture = AboutCulture::first();
        if (!$culture) {
            $culture = AboutCulture::create(['heading' => 'Our Team & Culture', 'description' => '']);
        }

        $validated['about_culture_id'] = $culture->id;
        AboutCultureHighlight::create($validated);

        return back()->with('success', 'Culture highlight added successfully!');
    }

    public function deleteCultureHighlight($id)
    {
        AboutCultureHighlight::findOrFail($id)->delete();
        return back()->with('success', 'Culture highlight deleted successfully!');
    }

    public function updateOffices(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        $offices = AboutOffices::first();
        if ($offices) {
            $offices->update($validated);
        } else {
            AboutOffices::create($validated);
        }

        return back()->with('success', 'Offices section heading updated successfully!');
    }

    public function storeOfficeLocation(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'contact1_icon' => 'nullable|string|max:255',
            'contact1_text' => 'nullable|string|max:255',
            'contact2_icon' => 'nullable|string|max:255',
            'contact2_text' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $offices = AboutOffices::first();
        if (!$offices) {
            $offices = AboutOffices::create(['heading' => 'Our Presence', 'subtitle' => 'Connecting with clients locally and globally.']);
        }

        $validated['about_offices_id'] = $offices->id;
        AboutOfficeLocation::create($validated);

        return back()->with('success', 'Office location added successfully!');
    }

    public function updateOfficeLocation(Request $request, $id)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'contact1_icon' => 'nullable|string|max:255',
            'contact1_text' => 'nullable|string|max:255',
            'contact2_icon' => 'nullable|string|max:255',
            'contact2_text' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $location = AboutOfficeLocation::findOrFail($id);
        $location->update($validated);

        return back()->with('success', 'Office location updated successfully!');
    }

    public function deleteOfficeLocation($id)
    {
        AboutOfficeLocation::findOrFail($id)->delete();
        return back()->with('success', 'Office location deleted successfully!');
    }

    public function updatePartners(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        $partners = AboutPartners::first();
        if ($partners) {
            $partners->update($validated);
        } else {
            AboutPartners::create($validated);
        }

        return back()->with('success', 'Partners section heading updated successfully!');
    }

    public function storePartnerItem(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $partners = AboutPartners::first();
        if (!$partners) {
            $partners = AboutPartners::create(['heading' => 'Strategic Partners', 'subtitle' => 'Collaborating with industry leaders.']);
        }

        $validated['about_partners_id'] = $partners->id;
        AboutPartnerItem::create($validated);

        return back()->with('success', 'Partner item added successfully!');
    }

    public function updatePartnerItem(Request $request, $id)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $item = AboutPartnerItem::findOrFail($id);
        $item->update($validated);

        return back()->with('success', 'Partner item updated successfully!');
    }

    public function deletePartnerItem($id)
    {
        AboutPartnerItem::findOrFail($id)->delete();
        return back()->with('success', 'Partner item deleted successfully!');
    }
}
