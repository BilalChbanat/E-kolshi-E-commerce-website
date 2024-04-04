<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->getAll();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $path = 'uploads/';
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $file->move($path, $fileName);
        }

        $data = [
            'title' => $validatedData['title'],
            'image' => $fileName ? $path . $fileName : null,
            'quantityInStock' => $validatedData['quantityInStock'],
            'QuantityAvailable' => $validatedData['quantityInStock'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'seller' => Auth::id(),
            'category_id' => $validatedData['category_id'],
        ];

        // dd($data);

        $Product = Product::create($data);

        return redirect()->back()->with('status', 'Product Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
