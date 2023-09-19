<?php 

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\productResource;

class ProductController extends Controller 
{

 
  public function index()
  {

    $products = productResource::collection(Product::all());
    
    if (is_null($products)) {
      return $this->sendError('Products not found.');
                            }
      return response()->json([
            "success" => true,
            "message" => "Product List",
            "data" => $products
        ],200);



  }
  public function show($id)
  {

     $product = Product::where('id',$id)->first();
                  
                if (is_null($product)) {
                  return $this->sendError('Product not found.');
                                        }


                if($product){  
                              return response()->json([
                                "success" => true,
                                "message" => "Product is exsist",
                                "data" => new productResource($product)
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
          'name' => 'required',
          'sku' => 'required',
          'description' => 'required',
          'price' => 'required',
          'active' => 'required'
      
                            ]);

          if($validator->fails() ){
  
          
                              return response()->json([
                                "success" => false,
                                "message" =>$validator->errors(),
                                "data" =>[]
                            ],401);
        }

          $product = Product::create($input);


          return response()->json([
            "success" => true,
            "message" => "Product inserted successfully.",
            "data" => new productResource($product)
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
            
                        return response()->json([
                          "success" => false,
                          "message" =>$validator->errors(),
                          "data" =>[]
                      ],401);
                
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
            "data" => new productResource($product)
        ],200);
  }


  public function destroy($id)
  {
    $product = Product::where('id',$id)->first();

    if (is_null($product)) {
      return $this->sendError('Product not found.');
                            }
        if($product){
              $product->delete();
              $all_product=productResource::collection(Product::all());
                return response()->json([
                      "success" => true,
                      "message" => "Product deleted successfully.",
                      "data" => $all_product
                ]);
        }else{
          $all_product=productResource::collection(Product::all());
                return response()->json([
                  "error" => true,
                  "message" => "the product does not exsist ",
                  "data" => $all_product
                  ],200);
        }

    
  }
  
}

?>