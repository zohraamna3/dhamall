<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $policies = PrivacyPolicy::latest()->get();
        return view('admin.pages.privacy-policy.index', compact('policies'));
    }

    public function create()
    {
        return view('admin.pages.privacy-policy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:150',
            'Description' => 'required|string',
        ]);

        PrivacyPolicy::create([
            'Title' => $request->Title,
            'Description' => $request->Description,
            'AdminId' => Auth::id(),
        ]);

        return redirect()->route('admin.privacy-policy.index')
            ->with('success', 'Privacy Policy created successfully.');
    }

    public function edit(PrivacyPolicy $privacyPolicy)
    {
        return view('admin.pages.privacy-policy.edit', compact('privacyPolicy'));
    }

    public function update(Request $request, PrivacyPolicy $privacyPolicy)
    {
        $request->validate([
            'Title' => 'required|string|max:150',
            'Description' => 'required|string',
        ]);

        $privacyPolicy->update([
            'Title' => $request->Title,
            'Description' => $request->Description,
        ]);

        return redirect()->route('admin.privacy-policy.index')
            ->with('success', 'Privacy Policy updated successfully.');
    }

    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        $privacyPolicy->delete();

        return redirect()->route('admin.privacy-policy.index')
            ->with('success', 'Privacy Policy deleted successfully.');
    }
}
