<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Product;

class CreateAppointment extends Component
{
    public $showModal = false;
    public $user_id;
    public $product_id; // Add product_id
    public $title;
    public $description;
    public $appointment_date;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->user_id = null;
        $this->product_id = null; // Reset product_id
        $this->title = null;
        $this->description = null;
        $this->appointment_date = null;
    }

    public function store()
    {
        $validated = $this->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id', // Validate product_id
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        Appointment::create($validated);

        $this->dispatch('appointmentCreated');

        $this->closeModal();
    }

    public function render()
    {
        $users = User::all();
        $products = Product::all(); // Fetch products for dropdown

        return view('livewire.create-appointment', compact('users', 'products'));
    }
}
