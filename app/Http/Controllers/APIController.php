<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use App\Models\Restaurants;
use App\Models\Locations;
use App\Models\RestaurantOrders;
use App\Models\Categories;
use App\Models\Sizes;
use App\Models\Cartitems;
use App\Models\Orders;
use App\Models\Flavours;
use App\Models\Meals;
use App\Models\Map;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class APIController extends Controller
{
    //

    protected $user;
    protected $partner;
    

    public function __construct(){
        
        $this->middleware("auth:api",["except" => [
            "login",
            "register", 
            'partner', 
            'restaurants',
            'restaurantsbyid'
            ]]);
        $this->user = new User;
        $this->partner = new Partner;
                
    }



    public function register(Request $request){
        
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|min:6|confirmed',
       ]);
       
       if($validator->fails()){
        return response()->json([
            'success' => false,
            'message' => $validator->messages()->toArray()
         ], 500);
       }


       $data = [
        "first_name" => $request->first_name,
        "last_name" => $request->last_name,
        "phone_number" => $request->phone_number,
        "email" => $request->email,
        "password" => Hash::make($request->password)
       ];


       $this->user->create($data);

       $responseMessage = "Registration Successful";

        return response()->json([
        'success' => true,
        'message' => $responseMessage
     ], 200);

    }


    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|string',
            'password' => 'required|min:6',
       ]);


       if($validator->fails()){
        return response()->json([
            'success' => false,
            'message' => $validator->messages()->toArray()
         ], 500);
       }

        $credentials = $request->only(["email","password"]);
        $user = User::where('email',$credentials['email'])->first();
        if($user){
            if(!auth()->attempt($credentials)){
                $responseMessage = "Invalid username or password";
                
                return response()->json([
                    "success" => false,
                    "message" => $responseMessage,
                    "error" => $responseMessage
                ], 422);
         }
            
         $accessToken = auth()->user()->createToken('authToken')->accessToken;
         $responseMessage = "Login Successful";
 
         return $this->respondWithToken($accessToken,$responseMessage,auth()->user());
        }
        else{
           $responseMessage = "Sorry, this user does not exist";
           return response()->json([
            "success" => false,
            "message" => $responseMessage,
            "error" => $responseMessage
        ], 422);
        }
           
    }

    public function viewProfile(){
        $responseMessage = "user profile";
        $data = Auth::guard("api")->user();
        return response()->json([
            "success" => true,
            "message" => $responseMessage,
            "data" => $data
        ], 200);
    }


    
    public function logout(){
       
        //auth()->user()->logout();
        $user = Auth::guard("api")->user()->token();
        $user->revoke();
        $responseMessage = "successfully logged out";
        return response()->json([
            'success' => true,
            'message' => $responseMessage
         ], 200);
           
    }

    public function updateuser(Request $request){
        $user=User::where(['id'=>$request->id])->get();
        if($user[0]->api_token !=$request->apiToken){
            return response()->json(['message'=>'Invalid access token please log in'],400);
        }else{
            $user=User::where(['id'=>$request->id])->update([
                'first_name'=>$request->firstname,
                'last_name'=>$request->lastname,
                'phone_number'=>$request->phone,
                'email'=>$request->email
                
            ]
            );
            return response()->json(['message'=>'User updated successfully']);
        }
    }

    public function restaurants(){
       $results= Restaurants::all();
       $response=array();
       if(count($results)>0){
            foreach($results as $result) 
            {
                $restaurantname=$result->rname;
                $restaurantid=$result->id;
                $image=$result->image;
                $meals = array();
                $meals=Meals::where(['restaurant_id'=>$restaurantid])->get();
                if(count($meals)>0){
                   array_push($response,['restaurantname'=>$restaurantname,'restaurantid'=>$restaurantid,'restaurantimage'=>$image,'meals'=>$meals]);
                }
                else{
                    array_push($response,[['message'=>'No meals found'],204]);
                }
            }
            return response()->json($response);

        }else{
            return response()->json(['message'=>'No restaurants found'],204);
        }
    //  $restaurants = Restaurants::all();
    //     return response()->json($restaurants);
    }

    public function restaurantsbyid($id){
        $restaurant=Restaurants::where(['id'=>$id])->get();
        if(count($restaurant)>0){
            $response=array();
            $meals=Meals::where(['restaurant_id'=>$id])->get();
            if(count($meals)>0){
               array_push($response,[['restaurant'=>$restaurant,'meals'=>$meals],200]);
            }
            else{
                array_push($response,[['message'=>'No meals found'],204]);
            }
            return response()->json(['data'=>$response]);

        }else{
            return response()->json(['message'=>'Restaurant not found'],204);
        }
    }

    public function categories(){
        $categories=Categories::all();
        if(count($categories)>0){
            return response()->json(['data'=>$categories],200);

        }else{
            return response()->json(['message'=>'No Categories found'],204);
        }
    }


    public function categorybyid($id){
        $category=Categories::where(['id'=>$id])->get();
        if(count($category)>0){
            $restaurantsarray=array();
            $categoryname=$category[0]->name;
            $meals=Meals::where(['category'=>$categoryname])->get();
            foreach($meals as $meal){
                $restaurants=Restaurants::where(['id'=>$meal->restaurant_id])->get();
                if(count($restaurants)>0){
                    $restaurantsarray[$meal->restaurant_id]=$restaurants;
                    
                }else{
                    return response()->json(['message'=>'No restaurant found'],204); 
                }
            }
            return response()->json(['restaurants'=>$restaurantsarray],200);
        }else{
            return response()->json(['message'=>'Category not found'],204);
        }
    }

    public function locations(){
        $locations=Locations::all();
        if(count($locations)>0){
           return response()->json(['locations'=>$locations]);

        }else{
            return response()->json(['message'=>'No location found'],204);
        }
    }

    public function sizes($id){
        $sizes=Sizes::where(['meal'=>$id])->get();
        if(count($sizes)>0){
           return response()->json(['sizes'=>$sizes]);
        }else{
            return response()->json(['message'=>'No size found'],204);
        }
    }

    public function flavours($id){
        $flavours=Flavours::where(['meal'=>$id])->get();
        if(count($flavours)>0){
           return response()->json(['flavours'=>$flavours]);
        }else{
            return response()->json(['message'=>'No flavour found'],204);
        }
    }

    public function addtocart(Request $request){
        $apiToken=$request->apiToken;
        $quantity=$request->quantity;
        $price=$request->price;
        $total=$request->total;
        $meal_id=$request->meal_id;
        $size=$request->size;
        $flavour=$request->flavour;
        $flavourid=$request->flavourid;
        $restaurant_id=$request->restaurant_id;
        $client_id=$request->client_id;
        $user=User::where(['id'=>$client_id])->get();
        if($user[0]->api_token !=$apiToken){
            return response()->json(['message'=>'Invalid access token please log in'],400);
        }else{
            if(Orders::where(['client_id'=>$client_id],['status'=>'pending'])->where('restaurant_id','!=',$restaurant_id)->exists()){
                return response()->json(['message'=>'You can only order from one restaurant at a time'],400);
            }else{
                $meal=Meals::where(['id'=>$meal_id])->get();

                $order=Orders::where(['client_id'=>$client_id])->where(['status'=>'pending'])->where(['restaurant_id'=>$restaurant_id])->get();
                if(count($order)>0){
                    $cart=Cartitems::create([
                        'meal_id'=>$meal_id,
                        'meal_name'=>$meal[0]->meal,
                        'price'=>$price,
                        'quantity'=>$quantity,
                        'size'=>$size,
                        'flavour'=>$flavour,
                        'flavour_id'=>$flavourid,
                        'order_id'=>$order[0]->id,
                        'restaurant_id'=>$restaurant_id
                    ]);
                    $newtotal=($order[0]->total)+$total;
                    $order= Orders::where(['client_id'=>$client_id])->where(['status'=>'pending'])->where(['restaurant_id'=>$restaurant_id])->update(['total'=>$newtotal]);
                    return response()->json(['resultcode'=>'1','cartitem'=>$cart],201);
                }else{
                    $order=Orders::create([
                        'client_id'=>$client_id,
                        'restaurant_id'=>$restaurant_id,
                        'status'=>'pending',
                        'total'=>$total
                    ]);
                    $cart=Cartitems::create([
                        'meal_id'=>$meal_id,
                        'meal_name'=>$meal[0]->meal,
                        'price'=>$price,
                        'quantity'=>$quantity,
                        'size'=>$size,
                        'flavour'=>$flavour,
                        'flavour_id'=>$flavourid,
                        'order_id'=>$order->id,
                        'restaurant_id'=>$restaurant_id
                    ]);

                    return response()->json(['resultcode'=>'1','cartitem'=>$cart],201);
                }
            }
        }
    }


    public function deletecart(Request $request){
        $user=User::where(['id'=>$request->client_id])->get();
        if($user[0]->api_token !=$request->apiToken){
            return response()->json(['message'=>'Invalid access token please log in'],400);
        }else{
            $item=Cartitems::where(['id'=>$request->item_id]);

            if($item->delete()){
                return response()->json(['message'=>'deleted successfully'],200);
            }
        }
    }

    public function updatecart(Request $request){
        $user=User::where(['id'=>$request->client_id])->get();
        if($user[0]->api_token !=$request->apiToken){
            return response()->json(['message'=>'Invalid access token please log in'],400);
        } else{
            $item=Cartitems::where(['id'=>$request->item_id])->update([
                'meal_id'=>$request->meal_id,
                'meal_name'=>$request->meal,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'size'=>$request->size,
                'flavour'=>$request->flavour,
                'flavour_id'=>$request->flavourid,
                'order_id'=>$request->order_id,
                'restaurant_id'=>$request->restaurant_id
            ]);
            return response()->json(['message'=>'updated successfully']);
        }
    }

    public function cart(Request $request){
        $user=User::where(['id'=>$request->client_id])->get();
        if($user[0]->api_token !=$request->apiToken){
            return response()->json(['message'=>'Invalid access token please log in'],400);
        }else{
            $order=Orders::where(['client_id'=>$request->client_id])->where(['status'=>'pending'])->get();
            if(count($order)>0){
                $cartitems=Cartitems::where(['order_id'=>$order[0]->id])->get();
                return response()->json(['order'=>$order,'cartitems'=>$cartitems]);
            }else{
                return response()->json(['message'=>'Cart is empty'],200);  
            }
        }
    }

    public function confirmorder(Request $request){
        $user=User::where(['id'=>$request->client_id])->get();
        if($user[0]->api_token !=$request->apiToken){
            return response()->json(['message'=>'Invalid access token please log in'],400);
        }else{
            $order_id=$request->orderid;
            $restaurant_id=$request->restaurantid;
            $client_id=$request->client_id;
            $dinstructions=$request->dinstructions;
            $latitude=$request->lat;
            $longitude=$request->lng;
            $receiptno=rand(1000000,2000000);
            Orders::where(['id'=>$order_id])->update([
                'status'=>'submitted'
            ]);
            RestaurantOrders::create([
                'order_id'=>$order_id,
                'restaurant_id'=>$restaurant_id,
                'status'=>'submitted',
                'delivery_description'=>$dinstructions,
                'latitude'=>$latitude,
                'longitude'=>$longitude,
                'receiptno'=>$receiptno,
                'client_id'=>$client_id
            ]);
            return response()->json([
                'message'=>'Order submitted successfully'
            ]);
        }
    }

      public function partner(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'city' => 'required',
        //     'status' => 'required',
        // ]);
          $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
       ]);
        // $partner = Partner::create($request->all());
        // return response()->json(['message'=> 'partner created', 
        // 'partner' => $partner]);

        if($validator->fails()){
        return response()->json([
            'success' => false,
            'message' => $validator->messages()->toArray()
         ], 500);
       }


       $data = [
        "name" => $request->name,
        "phone" => $request->phone,
        "email" => $request->email,
        'city' => $request->city,
        'status' => 0,
       ];


       $this->partner->create($data);

       $responseMessage = "Registration Successful";

        return response()->json([
        'success' => true,
        'message' => $responseMessage
     ], 200);
    }



}
