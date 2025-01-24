<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class Appointments extends Component
{
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

    public function render()
    {
        return view('livewire.appointments');
    }
}