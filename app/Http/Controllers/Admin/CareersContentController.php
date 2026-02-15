<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareersHero;
use App\Models\CareersCulture;
use App\Models\CareersCultureCard;
use App\Models\CareersOpening;
use App\Models\CareersWhySection;
use App\Models\CareersWhyItem;
use App\Models\CareersProcess;
use App\Models\CareersProcessStep;
use App\Models\CareersCta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareersContentController extends Controller
{
    public function index()
    {
        $hero = CareersHero::first();
        $culture = CareersCulture::first();
        $cultureCards = CareersCultureCard::orderBy('order')->get();
        $openings = CareersOpening::orderBy('order')->get();
        $whySection = CareersWhySection::first();
        $whyItems = CareersWhyItem::orderBy('order')->get();
        $process = CareersProcess::first();
        $processSteps = CareersProcessStep::orderBy('order')->get();
        $cta = CareersCta::first();

        return view('admin.careers-content.index', compact('hero', 'culture', 'cultureCards', 'openings', 'whySection', 'whyItems', 'process', 'processSteps', 'cta'));
    }

    // Hero Section
    public function updateHero(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $hero = CareersHero::first() ?? new CareersHero();
        
        if ($request->hasFile('hero_image')) {
            if ($hero->hero_image) {
                Storage::disk('public')->delete($hero->hero_image);
            }
            $hero->hero_image = $request->file('hero_image')->store('heroes/careers', 'public');
        }

        $hero->fill($request->except('hero_image'));
        $hero->save();

        return redirect()->back()->with('success', 'Hero section updated successfully!');
    }

    // Culture Section
    public function updateCulture(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $culture = CareersCulture::first() ?? new CareersCulture();
        $culture->fill($request->all());
        $culture->save();

        return redirect()->back()->with('success', 'Culture section updated successfully!');
    }

    // Culture Cards
    public function storeCultureCard(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        CareersCultureCard::create($request->all());

        return redirect()->back()->with('success', 'Culture card created successfully!');
    }

    public function updateCultureCard(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        $card = CareersCultureCard::findOrFail($id);
        $card->update($request->all());

        return redirect()->back()->with('success', 'Culture card updated successfully!');
    }

    public function deleteCultureCard($id)
    {
        $card = CareersCultureCard::findOrFail($id);
        $card->delete();

        return redirect()->back()->with('success', 'Culture card deleted successfully!');
    }

    // Job Openings
    public function storeOpening(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        CareersOpening::create([
            'title' => $request->title,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'is_active' => $request->has('is_active'),
            'order' => $request->order,
        ]);

        return redirect()->back()->with('success', 'Job opening created successfully!');
    }

    public function updateOpening(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $opening = CareersOpening::findOrFail($id);
        $opening->update([
            'title' => $request->title,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'is_active' => $request->has('is_active'),
            'order' => $request->order,
        ]);

        return redirect()->back()->with('success', 'Job opening updated successfully!');
    }

    public function deleteOpening($id)
    {
        $opening = CareersOpening::findOrFail($id);
        $opening->delete();

        return redirect()->back()->with('success', 'Job opening deleted successfully!');
    }

    // Why Join Section
    public function updateWhySection(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
        ]);

        $whySection = CareersWhySection::first() ?? new CareersWhySection();
        $whySection->heading = $request->heading;
        $whySection->save();

        return redirect()->back()->with('success', 'Why Join section updated successfully!');
    }

    public function storeWhyItem(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        CareersWhyItem::create($request->all());

        return redirect()->back()->with('success', 'Why Join item created successfully!');
    }

    public function updateWhyItem(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        $item = CareersWhyItem::findOrFail($id);
        $item->update($request->all());

        return redirect()->back()->with('success', 'Why Join item updated successfully!');
    }

    public function deleteWhyItem($id)
    {
        $item = CareersWhyItem::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Why Join item deleted successfully!');
    }

    // Hiring Process
    public function updateProcess(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
        ]);

        $process = CareersProcess::first() ?? new CareersProcess();
        $process->heading = $request->heading;
        $process->save();

        return redirect()->back()->with('success', 'Hiring Process section updated successfully!');
    }

    public function storeProcessStep(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        CareersProcessStep::create($request->all());

        return redirect()->back()->with('success', 'Process step created successfully!');
    }

    public function updateProcessStep(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $step = CareersProcessStep::findOrFail($id);
        $step->update($request->all());

        return redirect()->back()->with('success', 'Process step updated successfully!');
    }

    public function deleteProcessStep($id)
    {
        $step = CareersProcessStep::findOrFail($id);
        $step->delete();

        return redirect()->back()->with('success', 'Process step deleted successfully!');
    }

    // CTA Section
    public function updateCta(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
        ]);

        $cta = CareersCta::first() ?? new CareersCta();
        $cta->fill($request->all());
        $cta->save();

        return redirect()->back()->with('success', 'CTA section updated successfully!');
    }
}
