@extends('layout.app')

@section('content')
    <div class="font-[sans-serif] bg-white py-4">
        <div class="font-[sans-serif] bg-white py-4">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-extrabold text-[#333]">Shopping Cart</h2>
                <div class="overflow-x-auto">
                    @if ($carts->isEmpty())
                        <p class="text-lg font-bold text-[#333]">Cart is empty</p>
                    @else
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
                                <form action="#" method="post">
                                    @csrf
                                    @php $total = 0 @endphp
                                    @foreach ($carts as $cart)
                                        <tr rowId="{{ $cart->id }}">
                                            <td class="py-6 px-4">
                                                <div class="flex items-center gap-6 w-max">
                                                    <div class="h-36 shrink-0">
                                                        <img src="{{ asset($cart->product->image) }}"
                                                            class="w-full h-full object-contain" />
                                                    </div>
                                                    <div>
                                                        <p class="text-lg font-bold text-[#333]">{{ $cart->product->title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-6 px-4 ">
                                                {{ $cart->product->price }} MAD
                                            </td>

                                            <td class="text-center">
                                                <input type="number" name="quantity"
                                                    class="w-12  text-center border-0 rounded-md bg-gray-50  md:text-right edit-cart-info"
                                                    value="{{ $cart->quantity }}" min="1">
                                            </td>

                                            <td class="py-6 px-4">
                                                <a class=" mx-8 btn btn-outline-danger btn-sm delete-product"><i
                                                        class="fa fa-trash-o"></i></a>
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
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                    @endif

                </div>
                <div class=" max-w-xl ml-auto mt-6">
                    <ul class="text-[#333] divide-y">
                        <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold"
                                id="subtotal">{{ $total }} MAD</span></li>
                        <li class="flex flex-wrap gap-4 text-md py-3">Shipping <span class="ml-auto font-bold">0.00
                                MAD</span>
                        </li>
                        <li class="flex flex-wrap gap-4 text-md py-3">Tax <span class="ml-auto font-bold">0.00 MAD</span>
                        </li>
                        <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span
                                class="ml-auto">{{ $total }}
                                MAD</span></li>
                    </ul>
                    <button type="submit"
                        class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Check
                        out</button>
                </div>
            </div>
        </div>

    </div>
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
                        // Handle success response (e.g., show a success message)
                        alert('Item added to cart successfully');
                    },
                    error: function(xhr, status, error) {
                        // Handle error response (e.g., display an error message)
                        alert('Error adding item to cart');
                    }
                });
            });
        });
    </script>
@endsection
