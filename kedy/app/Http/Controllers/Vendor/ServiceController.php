<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('vendor_id', auth()->id())->get();
        return view('vendor.services.index', compact('services'));
    }

    public function create()
    {
        return view('vendor.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create([
            'vendor_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('vendor.services.index')->with('success', 'Hizmet başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $service = Service::where('vendor_id', auth()->id())->findOrFail($id);
        return view('vendor.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::where('vendor_id', auth()->id())->findOrFail($id);
        $service->update($request->only(['name', 'description', 'price']));

        return redirect()->route('vendor.services.index')->with('success', 'Hizmet başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $service = Service::where('vendor_id', auth()->id())->findOrFail($id);
        $service->delete();

        return redirect()->route('vendor.services.index')->with('success', 'Hizmet başarıyla silindi.');
    }
}
