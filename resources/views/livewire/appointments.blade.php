<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="text-2xl font-medium text-gray-900 mb-4">Appointments</h1>

    @if (count($appointments) > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($appointments as $appointment)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $appointment['id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $appointment['user']['name'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $appointment['date'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No appointments found.</p>
    @endif
</div>
