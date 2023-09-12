<?php 

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller 
{

 
  public function index()
  {

    $products = Product::all();
    

      return response()->json([
            "success" => true,
            "message" => "Product List",
            "data" => $products
        ],200);



  }


 
 
  public function store(Request $request)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
          'name' => 'required',
          'sku' => 'required',
          'description' => 'required',
          'price' => 'required',
          'active' => 'required'
      
                            ]);

          if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors()); 
                
        }

          $product = Product::create($input);


          return response()->json([
            "success" => true,
            "message" => "Product inserted successfully.",
            "data" => $product
        ],200);
  }

 
  public function update(Request $request,$id)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
          'name' => 'required',
          'sku' => 'required',
          'description' => 'required',
          'price' => 'required',
          'active' => 'required'
      
                            ]);

          if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors()); 
                
        }
        $product = Product::where('id',$id)->first();
        $product->name = $input['name'];
        $product->sku = $input['sku'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->active = $input['active'];
        $product->save();


          return response()->json([
            "success" => true,
            "message" => "Product inserted successfully.",
            "data" => $product
        ],200);
  }


  public function destroy($id)
  {
    $product = Product::where('id',$id)->first();
        if($product){
              $product->delete();
              $all_product=Product::all();
                return response()->json([
                      "success" => true,
                      "message" => "Product deleted successfully.",
                      "data" => $all_product
                ]);
        }else{
              $all_product=Product::all();
                return response()->json([
                  "error" => true,
                  "message" => "the product does not exsist ",
                  "data" => $all_product
                  ],200);
        }

    
  }
  
}

?>