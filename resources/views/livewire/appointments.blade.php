<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Appointments</h1>
            @livewire('create-appointment')
        </div>
    </div>

    @if ($appointments->isEmpty())
    <p class="text-gray-600">No appointments found.</p>
    @else
    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Title</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Description</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">User</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($appointments as $appointment)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $appointment->title }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $appointment->description ?? 'N/A' }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">
                        {{ $appointment->appointment_date->format('Y-m-d H:i') }}
                    </td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $appointment->user->name }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">
                        <!-- View Button -->
                        <button wire:click="viewAppointment({{ $appointment->id }})" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition duration-200">
                            View
                        </button>
                        <!-- Delete Button -->
                        <button
                            wire:confirm="Are you sure you want to delete this appointment?"
                            wire:click="deleteAppointment({{ $appointment->id }})"
                            class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-200 ml-2">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div>
        <!-- Table and other content -->

        <!-- Modal for Viewing Appointment Details -->
        @if ($showAppointmentModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg w-1/2">
                <h2 class="text-xl font-bold mb-4">Appointment Details</h2>
                <div>
                    <p><strong>Title:</strong> {{ $selectedAppointment->title }}</p>
                    <p><strong>Description:</strong> {{ $selectedAppointment->description ?? 'N/A' }}</p>
                    <p><strong>Date:</strong> {{ $selectedAppointment->appointment_date->format('Y-m-d H:i') }}</p>
                    <p><strong>User:</strong> {{ $selectedAppointment->user->name }}</p>
                </div>
                <div class="flex justify-end mt-4">
                    <button wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Close</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    function confirmDelete(appointmentId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger Livewire's deleteAppointment method
                Livewire.dispatch('delete-appointment', { id: appointmentId });
            }
        });
    }

    // Listen for the success event
    Livewire.on('show-success-alert', (message) => {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            confirmButtonColor: '#3085d6',
        });
    });
</script>