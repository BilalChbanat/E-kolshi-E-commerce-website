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
                                                        <input type="number" name="quantity"
                                                            class="w-12  text-center border-0 rounded-md bg-gray-50  md:text-right edit-cart-info"
                                                            value="{{ $cart->quantity }}" min="1">
                                                    </td>

                                                    <td class="py-6 px-4">
                                                        <a href="{{ route('cart.remove', $cart->id) }}"
                                                            class="mx-8 btn btn-outline-danger btn-sm delete-product"><i
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
                                        id="subtotal">
                                        @isset($total)
                                            {{ $total }} MAD
                                        @else
                                            0
                                        @endisset
                                    </span></li>
                                <li class="flex flex-wrap gap-4 text-md py-3">Shipping <span class="ml-auto font-bold">0.00
                                        MAD</span>
                                </li>
                                <li class="flex flex-wrap gap-4 text-md py-3">Tax <span class="ml-auto font-bold">0.00
                                        MAD</span>
                                </li>
                                <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span
                                        class="ml-auto font-bold" id="total">
                                        @isset($total)
                                            {{ $total }} MAD
                                        @else
                                            0
                                        @endisset
                                        MAD
                                    </span></li>
                            </ul>
                            <button type="submit"
                                class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Check
                                out</button>
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

                        var total = 0;
                        $('.subtotal').each(function() {
                            total += parseFloat($(this).text());
                        });
                        $('#subtotal').text(total.toFixed(2) + ' MAD');
                        $('#total').text(total.toFixed(2) + ' MAD');
                    },
                    
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
            });

        });
    </script>
@endsection
