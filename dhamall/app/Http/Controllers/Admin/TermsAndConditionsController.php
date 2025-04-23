<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $terms = TermsAndCondition::latest()->get();
        return view('admin.pages.terms-and-conditions.index', compact('terms'));
    }

    public function create()
    {
        return view('admin.pages.terms-and-conditions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:150',
            'Description' => 'required|string',
        ]);

        TermsAndCondition::create([
            'Title' => $request->Title,
            'Description' => $request->Description,
            'AdminId' => Auth::id(),
        ]);

        return redirect()->route('admin.terms-and-conditions.index')
            ->with('success', 'Terms and Conditions created successfully.');
    }

    public function edit(TermsAndCondition $termsAndCondition)
    {
        return view('admin.pages.terms-and-conditions.edit', compact('termsAndCondition'));
    }

    public function update(Request $request, TermsAndCondition $termsAndCondition)
    {
        $request->validate([
            'Title' => 'required|string|max:150',
            'Description' => 'required|string',
        ]);

        $termsAndCondition->update([
            'Title' => $request->Title,
            'Description' => $request->Description,
        ]);

        return redirect()->route('admin.terms-and-conditions.index')
            ->with('success', 'Terms and Conditions updated successfully.');
    }

    public function destroy(TermsAndCondition $termsAndCondition)
    {
        $termsAndCondition->delete();

        return redirect()->route('admin.terms-and-conditions.index')
            ->with('success', 'Terms and Conditions deleted successfully.');
    }
}
