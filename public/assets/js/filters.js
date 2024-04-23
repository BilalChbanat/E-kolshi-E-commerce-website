$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $("#categories").change(function () {
        var categorieId = $(this).val();
        console.log(categorieId);
        $.ajax({
            type: "POST", // Change this to POST
            url: "/searchBycategorie",
            data: {
                categorie: categorieId,
            },
            success: function (response) {
                console.log(response.products);
                displayProducts(response.products);
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });
});

function displayProducts(products) {
    let articleContainer = document.getElementById("product_container");
    articleContainer.innerHTML = "";
    products.forEach((product) => {
        if (product.description.length > 150) {
            product.shortDescription =
                product.description.substring(0, 150) + "...";
        } else {
            product.shortDescription = product.description;
        }
        articleContainer.innerHTML += `
        <div class="p-8 bg-white rounded-lg shadow-lg">
            <div class="relative overflow-hidden">
                <img class="object-cover" src="http://127.0.0.1:8000/${product.image}" alt="Product" style="width: 300px; height: 250px;">
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="px-6 py-2 font-bold text-gray-900 bg-white rounded-full hover:bg-gray-300">View Product</button>
                </div>
            </div>

            <h3 class="mt-4 text-xl font-bold text-gray-900">${product.title}</h3>
            <p class="mt-2 text-sm text-gray-500 min-w-24 max-h-28 min-h-28">${product.shortDescription}</p>
            <div class="flex items-center justify-between mt-4">
                <span class="text-lg font-bold text-gray-900">${product.price} MAD</span>
                <button class="px-4 py-2 font-bold text-white bg-primary-100 rounded-full hover:bg-primary-300">Add to Cart</button>
            </div>
        </div>
        `;
    });
}

