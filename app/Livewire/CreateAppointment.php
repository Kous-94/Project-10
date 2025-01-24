<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\User;

class CreateAppointment extends Component
{
    public $showModal = false; // Controls the visibility of the modal
    public $user_id;
    public $title;
    public $description;
    public $appointment_date;

    // Method to open the modal
    public function openModal()
    {
        $this->showModal = true;
    }

    // Method to close the modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    // Reset form fields
    public function resetForm()
    {
        $this->user_id = null;
        $this->title = null;
        $this->description = null;
        $this->appointment_date = null;
    }

    // Save the appointment
    public function store()
    {
        $validated = $this->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        Appointment::create($validated);

        // Emit an event to refresh the appointments list in the parent component
        $this->dispatch('appointmentCreated');

        // Close the modal and reset the form
        $this->closeModal();
    }

    public function render()
    {
        $users = User::all(); // Fetch users for the dropdown
        return view('livewire.create-appointment', compact('users'));
    }
}