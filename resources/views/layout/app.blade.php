<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kolshi | Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    @include('layout.header')

    @yield('content')

    @include('layout.footer')
    <script src="./node_modules/preline/dist/preline.js"></script>
    @yield('scripts')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.edit-cart-info');

            quantityInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    const row = input.closest('tr');

                    const price = parseFloat(row.querySelector('td:nth-child(2)').textContent
                        .trim()); // Adjust the nth-child index according to your table structure
                    const quantity = parseInt(input.value);

                    const subtotal = price * quantity;

                    row.querySelector('.subtotal').innerHTML =
                        `<h4 class="text-lg font-bold text-[#333]">${subtotal.toFixed(2)} MAD</h4>`;
                });
            });
        });
    </script>

</body>

</html>
