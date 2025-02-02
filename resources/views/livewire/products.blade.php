<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Products</h1>
            <button wire:click="openModal" class="bg-green-500 text-white px-4 py-2 rounded">Add Product</button>
        </div>
    </div>

    @if ($products->isEmpty())
        <p class="text-gray-600">No products found.</p>
    @else
        <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Description</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Price</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Quantity</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-3 px-4 text-sm text-gray-700">{{ $product->name }}</td>
                            <td class="py-3 px-4 text-sm text-gray-700">{{ $product->description ?? 'N/A' }}</td>
                            <td class="py-3 px-4 text-sm text-gray-700">{{ $product->price }}</td>
                            <td class="py-3 px-4 text-sm text-gray-700">{{ $product->quantity }}</td>
                            <td class="py-3 px-4 text-sm text-gray-700">
                                <button wire:click="openModal({{ $product->id }})" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition duration-200">Edit</button>
                                <button wire:click="delete({{ $product->id }})" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-200 ml-2">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Modal for Creating/Editing Product -->
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg w-1/2">
                <h2 class="text-xl font-bold mb-4">{{ $product_id ? 'Edit Product' : 'Create Product' }}</h2>

                <form wire:submit.prevent="store">
                    <div class="mb-4">
                        <label class="block text-gray-700">Product Name</label>
                        <input type="text" wire:model="name" class="w-full border-gray-300 rounded-lg">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <textarea wire:model="description" class="w-full border-gray-300 rounded-lg"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Price</label>
                        <input type="number" wire:model="price" class="w-full border-gray-300 rounded-lg">
                        @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Quantity</label>
                        <input type="number" wire:model="quantity" class="w-full border-gray-300 rounded-lg">
                        @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end mt-4">
                        <button wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
