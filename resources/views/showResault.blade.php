@foreach ($products as $product)
    <div class="p-8 bg-white rounded-lg shadow-lg ">
        <div class="relative overflow-hidden">
            <img class="object-cover " src="{{ asset("$product->image") }}" alt="Product"
                style="width: 300px; height: 250px;">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <a href="{{ url('products/' . $product->id . '/detail') }}"
                    class="px-6 py-2 font-bold text-gray-900 bg-white rounded-full hover:bg-gray-300">View
                    Product</a>
            </div>
        </div>

        <h3 class="mt-4 text-xl font-bold text-gray-900">{{ $product->title }}</h3>
        @php
            if (strlen($product->description) > 150) {
                $product->shortDescription = substr($product->description, 0, 150) . '...';
            } else {
                $product->shortDescription = $product->description;
            }

        @endphp
        <p class="mt-2 text-sm text-gray-500 min-w-24 max-h-28 min-h-28">
            {{ $product->shortDescription }}</p>
        <div class="flex items-center justify-between mt-4">
            <span class="text-lg font-bold text-gray-900">{{ $product->price }} MAD</span>

            <a href="{{ route('cart.add', $product->id) }}"
                class="px-4 py-2 font-bold text-white bg-primary-100 rounded-full hover:bg-primary-300">Add
                to Cart</a>

        </div>
    </div>
@endforeach
