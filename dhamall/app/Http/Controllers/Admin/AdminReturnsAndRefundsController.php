<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnsAndRefunds;
use Illuminate\Http\Request;

class AdminReturnsAndRefundsController extends Controller
{
    public function index()
    {
        $policies = ReturnsAndRefunds::all();
        return view('admin.pages.returns-refunds.index', compact('policies'));
    }

    public function create()
    {
        return view('admin.pages.returns-refunds.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PolicyType' => 'required|in:Returns,Refunds',
            'Description' => 'required|string',
        ]);

        ReturnsAndRefunds::create([
            'PolicyType' => $validated['PolicyType'],
            'Description' => $validated['Description'],
            'AdminId' => auth()->user()->id, // Assuming admin authentication
        ]);

        return redirect()->route('admin.returns-refunds.index')->with('success', 'Policy added successfully!');
    }

    public function edit($id)
    {
        $policy = ReturnsAndRefunds::findOrFail($id);
        return view('admin.pages.returns-refunds.edit', compact('policy'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'PolicyType' => 'required|in:Returns,Refunds',
            'Description' => 'required|string',
        ]);

        $policy = ReturnsAndRefunds::findOrFail($id);
        $policy->update($validated);

        return redirect()->route('admin.returns-refunds.index')->with('success', 'Policy updated successfully!');
    }

    public function destroy($id)
    {
        $policy = ReturnsAndRefunds::findOrFail($id);
        $policy->delete();

        return redirect()->route('admin.returns-refunds.index')->with('success', 'Policy deleted successfully!');
    }
}
