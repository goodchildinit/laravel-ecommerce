<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if (empty($data['status'])){
                $status  = 0;
            } else {
                $status  = 1;
            }
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->status = $status;
            $category->save();

            // Redirect after saving a category
            return redirect('/admin/view-categories')->with('flash_message_success', 'Category added successfully');
        }

        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }
    public function viewCategories() {
        $categories = Category::get();
        $categories = json_decode(json_encode($categories));
        // echo "<pre>"; print_r($categories); die;
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    public function editCategory(Request $request, $id = null) {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            // This code below will update Category
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],
            'url'=>$data['url'], 'status'=>$status]);
            return redirect('/admin/view-categories')->with('flash_message_success', 'Category Updated successfully');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails', 'levels'));
    }

    public function deleteCategory(Request $request, $id = null) {
        if(!empty($id)) {
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');
        }
    }
}
