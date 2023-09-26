<?php 

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\categoryResource;
use Auth;
use Validator;
class CategoryController extends Controller 
{

  public function index()
  {

    $category =categoryResource::collection(Category::all()) ;
    

      return response()->json([
            "success" => true,
            "message" => "category List",
            "data" => $category
        ],200);



  }

  public function show($id)
  {

    $category= Category::where('id',$id)->first();
                  
                if($category){  
                              return response()->json([
                                "success" => true,
                                "message" => "Product is exsist",
                                "data" => new categoryResource($category)
                                                    ],200);
                          
                            }else {
                               return response()->json([
                                  "success" => true,
                                  "message" => "The product not exsist",
                                  "data" => "null"
                              ],401);
                           
                  
                }
     



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
            
                              return response()->json([
                                "success" => false,
                                "message" =>$validator->errors(),
                                "data" =>[]
                            ],401);
                      
              }

        $category = Category::create($input);


          return response()->json([
            "success" => true,
            "message" => "category inserted successfully.",
            "data" => new categoryResource($category)
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
            
                  return response()->json([
                    "success" => false,
                    "message" =>$validator->errors(),
                    "data" =>[]
                ],401);
                      
              }
        $category = Category::where('id',$id)->first();
        $category->category_name = $input['category_name'];
        $category->category_image= $input['category_image'];
        $category->category_description = $input['category_description'];
        $category->save();


          return response()->json([
            "success" => true,
            "message" => "category inserted successfully.",
            "data" =>  new categoryResource($category)
        ],200);
  }


  public function destroy($id)
  {
    $category = Category::where('id',$id)->first();
        if($category){
          $category->delete();
              $all_category=categoryResource::collection(Category::all());
                return response()->json([
                      "success" => true,
                      "message" => "category deleted successfully.",
                      "data" =>  $all_category
                ]);
        }else{
          $all_category=categoryResource::collection(Category::all());
                return response()->json([
                  "error" => true,
                  "message" => "the category does not exsist ",
                  "data" =>  $all_category
                  ],200);
        }

    
  }

  
}

?>