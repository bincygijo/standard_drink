<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model as Eloquent;

use \App\SubCategory as SubCategory;
use Input;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function dashboard()
    {
        //
        $categories = \App\Category::paginate(15);;
        return view("admin/category/list", ['categories' => $categories]);
    }

    


    function getCategories(){
        $categories = \App\Category::paginate(15);;
        return view("admin/category/list", ['categories' => $categories]);
    }

    public function addCategory(){
        return view('admin/category/add');
    }

    public function storeCategory(){
        $input = Input::all();
        
        $validate = Validator::make(Input::all(), [
                'name' => 'required'
        ]);
        
        if (!$validate->fails()){
            $name                   = Input::get('name');
            $description            = Input::get('description');
            $standard               = Input::get('standard');
            $category               = new \App\Category;
            $category->name         = $name;
            $category->description  = $description;
            $category->standard     = $standard;
            $category->save();
            return redirect("admin/categories")->with('success', 'Category added successfully!');
        }else{
            return Redirect::back()->with('error', 'Error: Please fill name');
        }
    }

     public function editCategory($id){
        $category = \App\Category::findOrFail($id);
        return view('admin/category/edit', ['category' => $category]);
    }

    public function updateCategory($id){
        $category = \App\Category::findOrFail($id);
        $input = Input::all();
        $validate = Validator::make(Input::all(), [
            'name' => 'required',
        ]);
        if (!$validate->fails()){
            $category->name             = Input::get('name');
            $category->description      = Input::get('description');
            $category->standard         = Input::get('standard');;
            $category->save();
            return redirect("admin/categories")->with('success', 'Category updated successfully!');
        }else{
            return Redirect::back()->with('error', 'Error: Invalid data');
        }
    }

    public function deleteCategory($id){
        $category = \App\Category::findOrFail($id);
        $category->delete();
        return redirect("admin/categories")->with('success', 'Category deleted successfully!');
    }

    // Sub categories
    function getSubCategories(){
        $sub_categories = \App\SubCategory::paginate(15);;
        return view("admin/sub_category/list", ['sub_categories' => $sub_categories]);
    }

    public function addSubCategory($id = null){
        $category   = array();
        $categories = \App\Category::lists("name", "id");
        if($id){
            $category = \App\Category::findOrFail($id);
        }
        return view('admin/sub_category/add', ["category" => $category, "categories" => $categories]);
    }

    public function storeSubCategory(){
        $input = Input::all();
        
        $validate = Validator::make(Input::all(), [
                'category_id'               => 'required',
                'name'                      => 'required',
                'liter_per_item'            => 'required|numeric',
                'alcohol_content_per_item'  => 'required|numeric'
        ]);
        
        if (!$validate->fails()){
            $sub_category                               = new \App\SubCategory;
            $sub_category->category_id                  = Input::get('category_id');
            $sub_category->name                         = Input::get('name');
            $sub_category->description                  = Input::get('description');
            $sub_category->liter_per_item               = Input::get('liter_per_item');
            $sub_category->alcohol_content_per_item     = Input::get('alcohol_content_per_item');
            $sub_category->save();
            return redirect("admin/sub_categories")->with('success', 'Sub Category added successfully!');
        }else{
            return Redirect::back()->with('error', 'Error: Invalid data');
        }
    }

     public function editSubCategory($id){
        $sub_category = \App\SubCategory::findOrFail($id);
        $categories = \App\Category::lists("name", "id");
        return view('admin/sub_category/edit', ['categories' => $categories, 'sub_category' => $sub_category]);
    }

    public function updateSubCategory($id){
        $sub_category = \App\SubCategory::findOrFail($id);
        $input = Input::all();
        $validate = Validator::make(Input::all(), [
            'name' => 'required',
        ]);
        if (!$validate->fails()){
            $sub_category->category_id                  = Input::get('category_id');
            $sub_category->name                         = Input::get('name');
            $sub_category->description                  = Input::get('description');
            $sub_category->liter_per_item               = Input::get('liter_per_item');
            $sub_category->alcohol_content_per_item     = Input::get('alcohol_content_per_item');
            $sub_category->save();
            return redirect("admin/sub_categories")->with('success', 'Sub Category updated successfully!');
        }else{
            return Redirect::back()->with('error', 'Error: Invalid data');
        }
    }

    public function deleteSubCategory($id){
        $sub_category = \App\SubCategory::findOrFail($id);
        $sub_category->delete();
        return redirect("admin/sub_categories")->with('success', 'Sub Category deleted successfully!');
    }
}
