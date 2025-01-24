<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class Appointments extends Component
{
    // Properties for the modal
    public $showAppointmentModal = false; // Controls the visibility of the modal
    public $selectedAppointment; // Stores the selected appointment data

    public $appointments;

    protected $listeners = ['appointmentCreated' => 'refreshAppointments'];

    public function mount()
    {
        $this->refreshAppointments();
    }

    public function refreshAppointments()
    {
        // Fetch all appointments with user data
        $this->appointments = Appointment::with('user')->get();
    }


    // View Appointment
    public function viewAppointment($id)
    {
        $this->selectedAppointment = Appointment::with('user')->find($id);
        $this->showAppointmentModal = true; // Show the modal
    }

    // Delete Appointment
    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        // Refresh the appointments list
        $this->refreshAppointments();

        // Show a success message
        $this->dispatch('show-success-alert', message: 'Appointment deleted successfully.');
    }

    // Close Modal
    public function closeModal()
    {
        $this->showAppointmentModal = false; // Hide the modal
        $this->selectedAppointment = null; // Clear the selected appointment
    }


    public function render()
    {
        return view('livewire.appointments');
    }
}
