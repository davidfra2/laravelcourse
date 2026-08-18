<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ['id' => '1', 'name' => 'TV', 'description' => 'Best TV', 'price' => 60],
        ['id' => '2', 'name' => 'iPhone', 'description' => 'Best iPhone', 'price' => 100],
        ['id' => '3', 'name' => 'Chromecast', 'description' => 'Best Chromecast', 'price' => 45],
        ['id' => '4', 'name' => 'Glasses', 'description' => 'Best Glasses', 'price' => 90],
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = ProductController::$products;

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $invalidId = ! is_numeric($id) || $id < 1 || $id > count(ProductController::$products);
        if ($invalidId) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName().' - Online Store';
        $viewData['subtitle'] = $product->getName().' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        // here will be the code to call the model and save it to the database
        Product::create($request->only(['name', 'price']));
        $viewData = [];
        $viewData['title'] = 'Product created - Online Store';
        $viewData['subtitle'] = 'Product created successfully';

        return back();
    }
}
