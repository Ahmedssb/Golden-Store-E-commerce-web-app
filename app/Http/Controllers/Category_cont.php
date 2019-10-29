<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class Category_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
             $data=$request->all();
           $category = new Category; 
           $category->parent_id = $data['parent_id'];
           $category->name = $data['name'];
           $category->description = $data['description'];
           $category->url = $data['url'];
           $category->save();
           return redirect()->back()->with('msg','Category Added Successfully');
        }

       /* all main category will have zero as parent_id
         and all subcategory will have the id of the main category 
         user select from drop down menue in add category view */
        $levels=Category::where(['parent_id'=>0])->get();
        $arr['levels']=$levels;
        return view('Admin.Categories.AddCategory_view',$arr);

    }

    public function index(){
        // retrive all Categories and return it with the index view 
        $categories=Category::all();
        $arr['categories']=$categories;

        return view('Admin.Categories.Index_view',$arr);
    }

    public function update(Request $request , $id){

        $category=Category::find($id);
        if($request->isMethod('post')){
            //$category->update($request->all());
             $data =$request->all();
             $category->update(['name'=>$data['name'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect()->back()->with('msg','Category Updated Successfully');
        }else{
            $arr['category']=$category;
            $levels=Category::where(['parent_id'=>0])->get();
            $arr['levels']=$levels; 
            return view ('Admin.Categories.Update_view',$arr);
        }   
    }

    public function delete( $id){
        $category=Category::find($id);
          $category->delete();

         return redirect()->back()->with('msg','Category Deleted Successfully');

    }
}
