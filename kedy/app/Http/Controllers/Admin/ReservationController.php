<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user')->paginate(10); // Kullanıcı bilgileriyle birlikte al
        return view('admin.reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::with('user')->findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_start_time' => 'required',
            'reservation_end_time' => 'required',
            'duration_type' => 'required',
            'reservation_status' => 'required',
            'price' => 'required',
        ]);

        Reservation::create([
            'reservation_start_time' => $request->reservation_start_time,
            'reservation_end_time' => $request->reservation_end_time,
            'duration_type' => $request->duration_type,
            'reservation_status' => $request->reservation_status,
            'price' => $request->price
        ]);

        return redirect()->route('admin.reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'reservation_start_time' => 'required',
            'reservation_end_time' => 'required',
            'duration_type' => 'required',
            'reservation_status' => 'required',
            'price' => 'required',
        ]);

        Reservation::update([
            'reservation_start_time' => $request->reservation_start_time,
            'reservation_end_time' => $request->reservation_end_time,
            'duration_type' => $request->duration_type,
            'reservation_status' => $request->reservation_status,
            'price' => $request->price
        ]);

    }

    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Rezervasyon başarıyla silindi.');
    }
}
