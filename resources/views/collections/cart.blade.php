@extends('layout.app')

@section('content')
    <div class="font-[sans-serif] bg-white py-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-extrabold text-[#333]">Shopping Cart</h2>
            <div class="overflow-x-auto">
                @if (empty(session('cart')))
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
                                @foreach (session('cart') as $id => $details)
                                    <tr rowId="{{ $id }}">
                                        <td class="py-6 px-4">
                                            <div class="flex items-center gap-6 w-max">
                                                <div class="h-36 shrink-0">
                                                    <img src="{{ asset($details['image']) }}"
                                                        class="w-full h-full object-contain" />
                                                </div>
                                                <div>
                                                    <p class="text-lg font-bold text-[#333]">{{ $details['title'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-4 ">
                                            {{ $details['price'] }} MAD
                                        </td>

                                        <td class="text-center">
                                            <input type="number" name="quantity"
                                                class="w-12  text-center border-0 rounded-md bg-gray-50  md:text-right edit-cart-info"
                                                value="{{ $details['quantity'] }}" min="1">
                                        </td>

                                        <td class="py-6 px-4">
                                            <a class=" mx-8 btn btn-outline-danger btn-sm delete-product"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class="py-6 px-4 subtotal">
                                            <h4 class="text-lg font-bold text-[#333]">
                                                {{ $details['price'] * $details['quantity'] }} MAD
                                            </h4>
                                        </td>
                                        @php
                                            $subtotal = $details['price'] * $details['quantity'];
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
                    <li class="flex flex-wrap gap-4 text-md py-3">Shipping <span class="ml-auto font-bold">0.00 MAD</span>
                    </li>
                    <li class="flex flex-wrap gap-4 text-md py-3">Tax <span class="ml-auto font-bold">0.00 MAD</span>
                    </li>
                    <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">{{ $total }}
                            MAD</span></li>
                </ul>
                <button type="submit"
                    class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Check
                    out</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".edit-cart-info").change(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ route('update.shopping.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId"),
                        quantity: ele.val(),
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $(".delete-product").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Do you really want to delete?")) {
                    $.ajax({
                        url: '{{ route('delete.cart.product') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("rowId")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });

            // DOMContentLoaded event listener
            document.addEventListener('DOMContentLoaded', function() {
                // Select the input element
                var quantityInputs = document.querySelectorAll('.edit-cart-info');

                quantityInputs.forEach(function(quantityInput) {
                    // Add click event listener to each input
                    quantityInput.addEventListener('change', function() {
                        var quantity = parseInt(this.value);
                        if (!isNaN(quantity) && quantity > 0) {
                            var rowId = this.closest('tr').getAttribute('rowId');
                            $.ajax({
                                url: '{{ route('update.shopping.cart') }}',
                                method: 'PATCH', // Ensure PATCH method is used
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id: rowId,
                                    quantity: quantity
                                },
                                success: function(response) {
                                    // Handle success response
                                },
                                error: function(xhr, status, error) {
                                    // Handle error response
                                }
                            });

                        } else {
                            // Show an error message or handle invalid input
                            console.log('Invalid quantity');
                        }
                    });
                });

                // Select the plus and minus buttons
                var plusButtons = document.querySelectorAll('.bi-plus');
                var minusButtons = document.querySelectorAll('.bi-dash');

                // Add click event listener to each plus button
                plusButtons.forEach(function(plusButton) {
                    plusButton.addEventListener('click', function() {
                        var quantityInput = this.closest('tr').querySelector(
                            '.edit-cart-info');
                        var currentQuantity = parseInt(quantityInput.value);
                        if (!isNaN(currentQuantity)) {
                            quantityInput.value = currentQuantity + 1;
                        }
                    });
                });

                // Add click event listener to each minus button
                minusButtons.forEach(function(minusButton) {
                    minusButton.addEventListener('click', function() {
                        var quantityInput = this.closest('tr').querySelector(
                            '.edit-cart-info');
                        var currentQuantity = parseInt(quantityInput.value);
                        if (!isNaN(currentQuantity) && currentQuantity > 1) {
                            quantityInput.value = currentQuantity - 1;
                        }
                    });
                });
            });
        });
    </script>
@endsection
