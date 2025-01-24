<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Appointments</h1>
            <!-- Add Appointment Button -->
            <!-- <button wire:click="openModal" class="bg-gray-500 text-black px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                Add Appointment
            </button> -->
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>