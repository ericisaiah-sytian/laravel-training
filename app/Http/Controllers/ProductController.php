<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if(request('categories')) {
            return view('home', [
                'categories' => Category::all(),
                'products' => Product::whereHas('categories', function($query) {
                    $query = $query->where('category_id', request('categories'))->orWhere('parent_id', request('categories'));
                })->filter(
                    request(['search', 'brand'])
                )->paginate(18)->withQueryString()
            ]);
        }

        return view('home', [
            'categories' => Category::all(),
            'products' => Product::latest()->filter(
                        request(['search', 'brand'])
                    )->paginate(18)->withQueryString()
        ]);

    }

    public function show(Product $product)
    {
        return view('components.products', [
            'product' => $product
        ]);
    }

    public function dashboard()
    {
        return view('admin.products.products');
    }

    public function addProduct()
    {
        return view('admin.products.add-product');
    }
    
    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required|min:3|max:255|unique:products,name',
            'brand_id' => 'required',
            'slug' => 'required|min:3|max:255|unique:products,slug',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
        ]);

        
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');    

        $product = Product::create($attributes);

        // category starts here

        $selectedCategory = $_POST['product-category'];
        $category = Category::Find($selectedCategory);
        $product->categories()->sync($category);

        // category ends here

        return redirect('/admin/products')->with('success', 'Product has been created.');
    }

    public function edit($id)
    {
        $products = DB::select('select * from products where id = ?',[$id]);
        return view('admin.products.edit-product',['products'=>$products]);
    }

    public function update(Product $product)
    {

        $attributes = request()->validate([
            'name' => ['required','min:3','max:255', Rule::unique('categories','name')->ignore($product)],
            'brand_id' => 'required',
            'slug' => ['required','min:3','max:255',Rule::unique('categories','slug')->ignore($product)],
            //'thumbnail' => 'required|image',
            'excerpt' => 'required'
        ]);

        //$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');   

        // category starts here

        $selectedCategory = $_POST['product-category'];
        $category = Category::Find($selectedCategory);
        $product->categories()->sync($category);

        // category ends here


        $product->update($attributes);

        return redirect('/admin/products')->with('success', 'Product has been updated.');
    }



    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products')->with('success', 'Product has been deleted.');
    }


}
