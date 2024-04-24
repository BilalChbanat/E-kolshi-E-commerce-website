@extends('layout.app')

@section('content')

    @if ($carts->isEmpty())
        <div class="relative z-10">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="flex items-center justify-center font-bold pt-8 text-2xl">
                                Cart is empty
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <a href="{{ route('/') }}"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Go
                                    back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="font-[sans-serif] bg-white py-4">
                <div class="font-[sans-serif] bg-white py-4">
                    <div class="max-w-7xl mx-auto">
                        <h2 class="text-3xl font-extrabold text-[#333] mb-4">Shopping Cart</h2>
                        <div class="overflow-x-auto">
                            @if ($carts->isEmpty())
                                <p class="text-lg font-bold text-[#333]">Cart is empty</p>
                            @else
                                @if (session('error'))
                                    <div id="alert-additional-content-2"
                                    class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50   "
                                    role="alert">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <h3 class="text-lg font-medium">Oops somthing went wrong</h3>
                                    </div>
                                    <div class="mt-2 mb-4 text-sm">
                                        {{ session('error') }}
                                    </div>
                                    <div class="flex">
                                        <button type="button"
                                            class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center">
                                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 14">
                                                <path
                                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                            </svg>
                                            Contact us for more information
                                        </button>
                                    </div>
                                </div>
                                @endif
                                <table class="mt-12 w-full border-collapse divide-y" id='cart'>
                                    <thead class="whitespace-nowrap text-left">
                                        <tr>
                                            <th class="text-base text-gray-500 p-4">Description</th>
                                            <th class="text-base text-gray-500 p-4">Price</th>
                                            <th class="text-base text-gray-500 p-4">Quantity</th>
                                            <th class="text-base text-gray-500 p-4">Remove</th>
                                            <th class="text-base text-gray-500 p-4">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="whitespace-nowrap divide-y">

                                        @php $total = 0 @endphp
                                        @foreach ($carts as $cart)
                                            <form action="{{ route('cart.update', $cart->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <tr rowId="{{ $cart->id }}">
                                                    <td class="py-6 px-4">
                                                        <div class="flex items-center gap-6 w-max">
                                                            <div class="h-36 shrink-0">
                                                                <img src="{{ asset($cart->product->image) }}"
                                                                    class="w-full h-full object-contain" />
                                                            </div>
                                                            <div>
                                                                <p class="text-lg font-bold text-[#333]">
                                                                    {{ $cart->product->title }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="py-6 px-4 price">
                                                        {{ $cart->product->price }} MAD
                                                    </td>

                                                    <td class="text-center">
                                                        <button type="submit">
                                                            <input type="number" name="quantity"
                                                                class="w-12  text-center border-0 rounded-md bg-gray-50  md:text-right edit-cart-info"
                                                                value="{{ $cart->quantity }}" min="1">
                                                        </button>
                                                    </td>

                                                    <td class="py-6 px-4">
                                                        <a href="{{ route('cart.remove', $cart->id) }}"
                                                            class="mx-8 btn btn-outline-danger btn-sm delete-product"
                                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                                            <i class="fa-solid fa-trash" style="color: #d22525;"></i>
                                                        </a>

                                                    </td>

                                                    <td class="py-6 px-4 subtotal">
                                                        <h4 class="text-lg font-bold text-[#333]">
                                                            {{ $cart->product->price * $cart->quantity }} MAD
                                                        </h4>
                                                    </td>
                                                    @php
                                                        $subtotal = $cart->product->price * $cart->quantity;
                                                        $total += $subtotal;
                                                    @endphp
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                        <div class=" max-w-xl ml-auto mt-6">
                            <ul class="text-[#333] divide-y">
                                <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold"
                                        id="subtotal">
                                        @isset($total)
                                            {{ $total }} MAD
                                        @else
                                            0
                                        @endisset
                                    </span></li>
                                <li class="flex flex-wrap gap-4 text-md py-3">Shipping <span
                                        class="ml-auto font-bold">0.00
                                        MAD</span>
                                </li>
                                <li class="flex flex-wrap gap-4 text-md py-3">Tax <span class="ml-auto font-bold">0.00
                                        MAD</span>
                                </li>
                                <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span
                                        class="ml-auto font-bold" id="total">
                                        @isset($total)
                                            {{ $total }}
                                        @else
                                            0
                                        @endisset
                                        MAD
                                    </span></li>
                            </ul>
                            <form action="{{ route('pay.order') }}" method="post">
                                @csrf
                                <input type="hidden" name="total" value="{{ $total }}">
                                <button type="submit"
                                    class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Check
                                    out</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
    @endif

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('form').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        updateTotal(); // Update total after successful form submission
                    }
                });
            });

            $('.edit-cart-info').change(function() {
                var row = $(this).closest('tr');
                var cartItemId = row.attr('rowId');
                var quantity = parseInt($(this).val());

                $.ajax({
                    url: '/cart/update/' + cartItemId,
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        quantity: quantity
                    },
                    success: function(response) {
                        var price = parseFloat(row.find('.price').text().trim());
                        var subtotal = price * quantity;
                        row.find('.subtotal').text(subtotal.toFixed(2) + ' MAD');
                        updateTotal(); // Update total after successful quantity update
                    }
                });
            });

            $('.delete-product').click(function() {
                var row = $(this).closest('tr');
                var price = parseFloat(row.find('.price').text().trim());
                var quantity = parseInt(row.find('.edit-cart-info').val());
                var subtotal = price * quantity;

                var total = parseFloat($('#subtotal').text()) - subtotal;

                $('#subtotal').text(total.toFixed(2) + ' MAD');
                $('#total').text(total.toFixed(2) + ' MAD');

                row.remove();
                updateTotal(); // Update total after successful item deletion
            });

            function updateTotal() {
                var total = 0;
                $('.subtotal').each(function() {
                    total += parseFloat($(this).text());
                });
                $('#subtotal').text(total.toFixed(2) + ' MAD');
                $('#total').text(total.toFixed(2) + ' MAD');
            }
        });
    </script>
@endsection
