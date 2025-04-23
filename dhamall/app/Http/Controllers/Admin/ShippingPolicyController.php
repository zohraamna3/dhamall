<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingPolicyController extends Controller
{
    public function index()
    {
        $policies = ShippingPolicy::latest()->get();
        return view('admin.pages.shipping-policy.index', compact('policies'));
    }

    public function create()
    {
        return view('admin.pages.shipping-policy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:150',
            'Description' => 'required|string',
        ]);

        ShippingPolicy::create([
            'Title' => $request->Title,
            'Description' => $request->Description,
            'AdminId' => Auth::id(),
        ]);

        return redirect()->route('admin.shipping-policy.index')
            ->with('success', 'Shipping Policy created successfully.');
    }

    public function edit(ShippingPolicy $shippingPolicy)
    {
        return view('admin.pages.shipping-policy.edit', compact('shippingPolicy'));
    }

    public function update(Request $request, ShippingPolicy $shippingPolicy)
    {
        $request->validate([
            'Title' => 'required|string|max:150',
            'Description' => 'required|string',
        ]);

        $shippingPolicy->update([
            'Title' => $request->Title,
            'Description' => $request->Description,
        ]);

        return redirect()->route('admin.shipping-policy.index')
            ->with('success', 'Shipping Policy updated successfully.');
    }

    public function destroy(ShippingPolicy $shippingPolicy)
    {
        $shippingPolicy->delete();

        return redirect()->route('admin.shipping-policy.index')
            ->with('success', 'Shipping Policy deleted successfully.');
    }
}
