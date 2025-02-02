<div>
    <button wire:click="openModal" class="bg-green-500 text-white px-4 py-2 rounded">Create Appointment</button>

    @if ($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-1/2">
            <h2 class="text-xl font-bold mb-4">Create Appointment</h2>

            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label class="block text-gray-700">User</label>
                    <select wire:model="user_id" class="w-full border-gray-300 rounded-lg">
                        <option value="">Select a User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Product</label>
                    <select wire:model="product_id" class="w-full border-gray-300 rounded-lg">
                        <option value="">Select a Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Title</label>
                    <input type="text" wire:model="title" class="w-full border-gray-300 rounded-lg">
                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Description</label>
                    <textarea wire:model="description" class="w-full border-gray-300 rounded-lg"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Appointment Date</label>
                    <input type="datetime-local" wire:model="appointment_date" class="w-full border-gray-300 rounded-lg">
                    @error('appointment_date') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
