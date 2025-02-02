<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class BookAppointment extends Component
{
    public $product_id;
    public $title;
    public $description;
    public $appointment_date;
    public $message = '';

    protected $rules = [
        'product_id' => 'required|exists:products,id', // Assuming you have a Product model
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'appointment_date' => 'required|date|after:today',
    ];

    public function submitAppointment()
    {
        // Validate the input
        $this->validate();

        // If the user is logged in, use their user_id, otherwise, set it as null
        $user_id = Auth::check() ? Auth::id() : null;

        // Store the appointment in the database
        Appointment::create([
            'user_id' => $user_id,
            'product_id' => $this->product_id,
            'title' => $this->title,
            'description' => $this->description,
            'appointment_date' => $this->appointment_date,
        ]);

        // Show success message and reset form fields
        $this->message = 'Your appointment has been successfully booked!';
        $this->reset();
    }

    public function render()
    {
        $products = \App\Models\Product::all(); // Fetch all products
        return view('livewire.book-appointment', compact('products'));
    }
}
