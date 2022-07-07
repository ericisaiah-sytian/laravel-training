<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class BrandController extends Controller
{
    
    public function dashboard()
    {
        return view('admin.brands.brands');
    }

    public function addBrand()
    {
        return view('admin.brands.add-brand');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255|unique:brands,name',
            'slug' => 'required|min:3|max:255|unique:brands,slug'
        ]);

        Brand::create($attributes);

        return redirect('/admin/brands')->with('success', 'Brand has been created.');
    }


    public function edit($id)
    {
        $brands = DB::select('select * from brands where id = ?',[$id]);
        return view('admin.brands.edit-brand',['brands'=>$brands]);
    }

    public function update(Brand $brand)
    {
        $attributes = request()->validate([
            'name' => ['required','min:3','max:255', Rule::unique('brands','name')->ignore($brand)],
            'slug' => ['required','min:3','max:255',Rule::unique('brands','slug')->ignore($brand)],
        ]);

        $brand->update($attributes);

        return redirect('/admin/brands')->with('success', 'Brand has been updated.');
    }
    
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect('/admin/brands')->with('success', 'Brand has been deleted.');
    }
}
