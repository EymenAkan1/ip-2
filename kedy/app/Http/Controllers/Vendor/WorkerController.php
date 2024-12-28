<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::where('vendor_id', auth()->id())->get();
        return view('vendor.workers.index', compact('workers'));
    }

    public function create()
    {
        return view('vendor.workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string|max:50',
        ]);

        Worker::create([
            'vendor_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        return redirect()->route('vendor.workers.index')->with('success', 'Çalışan başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $worker = Worker::where('vendor_id', auth()->id())->findOrFail($id);
        return view('vendor.workers.edit', compact('worker'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string|max:50',
        ]);

        $worker = Worker::where('vendor_id', auth()->id())->findOrFail($id);
        $worker->update($request->only(['name', 'email', 'phone', 'role']));

        return redirect()->route('vendor.workers.index')->with('success', 'Çalışan başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $worker = Worker::where('vendor_id', auth()->id())->findOrFail($id);
        $worker->delete();

        return redirect()->route('vendor.workers.index')->with('success', 'Çalışan başarıyla silindi.');
    }
}
