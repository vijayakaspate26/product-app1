<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Productdata;
use Illuminate\Http\Request;
use Hash;
use Session;
use Storage;

class Productcontroller extends Controller
{
    //
    public function index(){

        return view('products.home');
    }

    public function register(){
        return view('register');
           
    }
    public function process_register(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=> 'required|min:6'
          ]);
       
      $user = new User();
      $user->name = $req->name;
      $user->email = $req->email;
      $user->password = Hash::make($req->password);
         $user->save();
   
       // the register is done successfully or not
    
       session()->flash('success','you have register successfullly');
        Session::put('user', $user);
       return redirect()->route('login');

    } 
    public function login(){
        return view('login');
    }

    public function post_login(Request $req)
    {
        // Validate the input
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Check if the user exists
        $user = User::where('email', $req->email)->first();
    
        if (!$user) {
            // If the user does not exist, return an error message
            return back()->withErrors(['email' => 'This email is not registered yet.']);
        }
    
        // Check if the password is correct
        if (Hash::check($req->password, $user->password)) {
            // Store the user in the session
            Session::put('user', $user);
    
            // Redirect to the form page after successful login
            return redirect()->route('form');
        } else {
            // If the password is incorrect, return an error message
            return back()->withErrors(['password' => 'Invalid email or password.']);
        }
    }
    

    // add products by form
    public function productform(){
        $url="/customer";
        return view('products.productform');
    }
   
    public function add_product(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);
     
   

    $product = new Productdata(); // Use 'Product' instead of 'product'
    $product->name = $request->name;
    $product->amount = $request->amount;
    $product->description = $request->description;

       
      // Handle the image upload
    if ($request->hasFile('image')) {
      
        $imagePath = $request->file('image')->store('images', 'public');
    }
    $product->image = $imagePath; // Save the image path
    $product->save();
    return redirect()->route('list')->with('success', 'Product created successfully.');

    }

    // show list of products
    public function productlist(){
        $products = Productdata::all();
     
        return view('products.productlist',compact('products'));
    }


    // edit the all data
    public function edit($id){
        // check the data is correct or not
    # code...
    $product = Productdata::findOrFail($id);
    return view('products.edit', compact('product'));

    }

public function update(Request $request, $id)
{
    $product=Productdata::find($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'image|mimes:jpg,jpeg,png,gif',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
    } else {
        $path = $product->image;
    }

    $product->update([
        'name' => $validated['name'],
        'amount' => $validated['amount'],
        'description' => $validated['description'],
        'image' => $path,
    ]);

    return redirect()->route('list')->with('success', 'Product updated successfully.');
}

// to view the details of products
public function view($id){
    $product=Productdata::find($id);
    return view('products.details', compact('product'));
}

}
