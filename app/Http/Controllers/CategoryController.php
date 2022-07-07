<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        return view('admin.categories.categories');
    }

    public function addCategory()
    {
        return view('admin.categories.add-category');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255|unique:categories,name',
            'slug' => 'required|min:3|max:255|unique:categories,slug',
            'parent_id' => ''
        ]);

        Category::create($attributes);

        return redirect('/admin/categories')->with('success', 'Category has been created.');
    }

    public function edit($id)
    {
        $categories = DB::select('select * from categories where id = ?',[$id]);
        return view('admin.categories.edit-category',['categories'=>$categories]);
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => ['required','min:3','max:255', Rule::unique('categories','name')->ignore($category)],
            'slug' => ['required','min:3','max:255',Rule::unique('categories','slug')->ignore($category)],
            'parent_id' => ''
        ]);

        $category->update($attributes);

        return redirect('/admin/categories')->with('success', 'Category has been updated.');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories')->with('success', 'Category has been deleted.');
    }
}
