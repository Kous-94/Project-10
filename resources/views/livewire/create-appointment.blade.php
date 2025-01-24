<div>
    <!-- Button to Open Modal -->
    <button wire:click="openModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
        Add Appointment
    </button>

    <!-- Modal -->
    @if ($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-1/2">
            <h2 class="text-xl font-bold mb-4">Add Appointment</h2>
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                    <select wire:model="user_id" id="user_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input wire:model="title" type="text" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea wire:model="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="appointment_date" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                    <input wire:model="appointment_date" type="datetime-local" id="appointment_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    @error('appointment_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" wire:click="closeModal" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200">Save</button> 
                </div>
            </form>
        </div>
    </div>
@endif
</div>