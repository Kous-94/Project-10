<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
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
            'product_id' => 'required|exists:products,id',  // Ensure product exists in the 'products' table
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);
        
        $validated['user_id'] = User::first()->id;

        // Create appointment with validated data
        $appointment = Appointment::create($validated);

        return response()->json($appointment, 201);
    }


    public function show(Appointment $appointment)
    {
        return $appointment->load('user');
    }

    public function update(Request $request, Appointment $appointment)
    {
        // Validate the input data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'appointment_date' => 'required|date',
            'product_id' => 'required|exists:products,id',  // Validate that the product exists
        ]);
    
        // Update the appointment with the validated data
        $appointment->update($validated);
    
        return response()->json($appointment);
    }
    

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
