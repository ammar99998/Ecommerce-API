<?php 

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
class CategoryController extends Controller 
{

  public function index()
  {

    $category = Category::all();
    

      return response()->json([
            "success" => true,
            "message" => "category List",
            "data" => $category
        ],200);



  }


 
 
  public function store(Request $request)
  {
    $input = $request->all();
    $validator = Validator::make($input, [

     'category_name'=> 'required',
      'category_image'=> 'required',
       'category_description'=> 'required'

      
                            ]);

          if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors()); 
                
        }

        $category = Category::create($input);


          return response()->json([
            "success" => true,
            "message" => "category inserted successfully.",
            "data" => $category
        ],200);
  }

 
  public function update(Request $request,$id)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
      'category_name'=> 'required',
      'category_image'=> 'required',
       'category_description'=> 'required'
      
                            ]);

          if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors()); 
                
        }
        $category = Category::where('id',$id)->first();
        $category->category_name = $input['category_name'];
        $category->category_image= $input['category_image'];
        $category->category_description = $input['category_description'];
        $category->save();


          return response()->json([
            "success" => true,
            "message" => "category inserted successfully.",
            "data" => $category
        ],200);
  }


  public function destroy($id)
  {
    $category = Category::where('id',$id)->first();
        if($category){
          $category->delete();
              $all_category=Category::all();
                return response()->json([
                      "success" => true,
                      "message" => "category deleted successfully.",
                      "data" =>  $all_category
                ]);
        }else{
          $all_category=Category::all();
                return response()->json([
                  "error" => true,
                  "message" => "the category does not exsist ",
                  "data" =>  $all_category
                  ],200);
        }

    
  }
  
}

?>