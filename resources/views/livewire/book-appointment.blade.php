<div>
    <h2>Book an Appointment</h2>

    @if($message)
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <form wire:submit.prevent="submitAppointment">
        <div class="form-group">
            <label for="product_id">Select Product:</label>
            <select id="product_id" class="form-control" wire:model="product_id">
                <option value="">Select a product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" class="form-control" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" class="form-control" wire:model="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" id="appointment_date" class="form-control" wire:model="appointment_date">
            @error('appointment_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
