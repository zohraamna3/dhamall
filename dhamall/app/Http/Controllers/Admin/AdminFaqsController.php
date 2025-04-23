<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;

class AdminFaqsController extends Controller
{
    public function index()
    {
        $faqs = Faqs::all(); // Retrieve all FAQs for listing
        return view('admin.pages.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.pages.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Question' => 'required|string|max:255',
            'Answer' => 'required|string',
        ]);

        Faqs::create([
            'Question' => $validated['Question'],
            'Answer' => $validated['Answer'],
            'AdminId' => auth()->user()->id, // Assuming admin is authenticated
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ added successfully!');
    }

    public function edit($id)
    {
        $faq = Faqs::findOrFail($id);
        return view('admin.pages.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Question' => 'required|string|max:255',
            'Answer' => 'required|string',
        ]);

        $faq = Faqs::findOrFail($id);
        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy($id)
    {
        $faq = Faqs::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
    }
}
