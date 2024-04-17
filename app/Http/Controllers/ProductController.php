<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    public function show(int $id)
    {
        $user = Auth::user();
        $product = $this->productRepository->getById($id);
        return view('dashboard.products.show', compact('product', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('dashboard.products.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpeg,jpg,webp',
            'quantityInStock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $path = 'uploads/Products/';
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
            'ref' => Str::random(22),
            'category_id' => $validatedData['category_id']
        ];

        $this->productRepository->create($data);

        return redirect()->back()->with('status', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product = $this->productRepository->getById($id);
        $user = Auth::user();
        $categories = Category::all();
        return view('dashboard.products.edit', compact('user', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpeg,jpg,webp',
            'quantityInStock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $path = 'uploads/Products/';
        $fileName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $file->move($path, $fileName);

            $product = $this->productRepository->getById($id);
            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
        }

        $data = [
            'title' => $validatedData['title'],
            'image' => $fileName ? $path . $fileName : null,
            'quantityInStock' => $validatedData['quantityInStock'],
            'QuantityAvailable' => $validatedData['quantityInStock'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'seller' => Auth::id(),
            'category_id' => $validatedData['category_id']
        ];

        $this->productRepository->update($id, $data);

        return redirect()->back()->with('status', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->productRepository->delete($id);

        return redirect()->back()->with('status', 'Product deleted successfully');
    }


    public function showProdcut(Request $request)
    {
        $products = $this->productRepository->getAll();

        if (!empty($request->keyword)) {
            $products = Product::where("title", "like", "%" . $request->keyword . "%")->get();
            return view('searchResault', compact('products'));

        } else {
            $products = $this->productRepository->getAll();
            return view('searchResault', compact('products'));
        }
    }



}
