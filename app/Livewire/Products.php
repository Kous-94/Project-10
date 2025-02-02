<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;
    public $product_id, $name, $description, $price, $quantity;
    public $showModal = false;

    // Initialize the products when the component is mounted
    public function mount()
    {
        $this->products = Product::all();
    }

    // Open modal for creating or editing a product
    public function openModal($productId = null)
    {
        $this->resetForm();
        $this->showModal = true;

        if ($productId) {
            $product = Product::find($productId);
            $this->product_id = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->quantity = $product->quantity;
        }
    }

    // Close modal
    public function closeModal()
    {
        $this->showModal = false;
    }

    // Reset the form fields
    public function resetForm()
    {
        $this->product_id = null;
        $this->name = null;
        $this->description = null;
        $this->price = null;
        $this->quantity = null;
    }

    // Create or update a product
    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        if ($this->product_id) {
            $product = Product::find($this->product_id);
            $product->update($validated);
        } else {
            Product::create($validated);
        }

        $this->products = Product::all();
        $this->closeModal();
    }

    // Delete a product
    public function delete($productId)
    {
        Product::find($productId)->delete();
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.products');  
      }
}
