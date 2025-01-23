<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::with('user')->get();
    }

    public function showAppointmentsPage()
{
    $appointments = Appointment::with('user')->get(); // Fetch appointments with user data
    return view('appointments.index', compact('appointments'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        $appointment = Appointment::create($validated);

        return response()->json($appointment, 201);
    }

    public function show(Appointment $appointment)
    {
        return $appointment->load('user');
    }

    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update($request->only(['title', 'description', 'appointment_date']));
        return response()->json($appointment);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
