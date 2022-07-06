<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\PaypalPaymentController;


class ProductController extends Controller
{
    public function index()
    {
        
        $products =  Product::all();

        return view('products.index',['products' => $products]);
        // $pay = new PaypalPaymentController;
        // //return $pay->getPaypalToken();
        // $url = 'https://api-m.sandbox.paypal.com/v1/catalogs/products?page_size=2&page=1&total_required=true';
        // $ch = curl_init();
        // curl_setopt_array($ch, array(
        //             CURLOPT_VERBOSE => true,
        //             CURLOPT_URL => $url,
        //             CURLOPT_RETURNTRANSFER => true,
        //             CURLOPT_CUSTOMREQUEST => "GET",
        //             CURLOPT_HTTPHEADER => ["Content-Type: application/json","Authorization: Bearer ".$pay->getPaypalToken()]
        //         ));
        
        // $result = curl_exec($ch);
        // $credentials = $result;

        // curl_close($ch);

        // return $credentials;
    }

    public function show(Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    }

    // Show Create Form
    public function create() {
        return view('products.create');
    }

    // Store Product Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Product::create($formFields);
        
        return redirect('/')->with('message', 'Product created successfully!');
    }

    
    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    
    public function update(Request $request, Product $product) {
        // Make sure logged in user is owner
        if($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($formFields);

        return back()->with('message', 'Product updated successfully!');
    }

   
    public function destroy(Product $product) {
        // Make sure logged in user is owner
        if($product->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $product->delete();
        return redirect('/')->with('message', 'Product deleted successfully');
    }

   
    public function manage() {
        return view('products.manage', ['products' => auth()->user()->products()->get()]);
    }

    // public function createProduct($data){
    //     $fields = array([
    //         'name' => $data['name'],
    //         'type' => 'PHYSICAL',
    //         'description' => $data['description']
    //     ]);
    //     //return $fields;
    //     $pay = new PaypalPaymentController;
    //     //return $pay->getPaypalToken();
    //     $url = 'https://api-m.sandbox.paypal.com/v1/catalogs/products';
    //     $ch = curl_init();
    //     curl_setopt_array($ch, array(
    //                 CURLOPT_VERBOSE => true,
    //                 CURLOPT_URL => $url,
    //                 CURLOPT_RETURNTRANSFER => true,
    //                 CURLOPT_POSTFIELDS => json_encode($fields),
    //                 CURLOPT_CUSTOMREQUEST => "POST",
    //                 CURLOPT_HTTPHEADER => ["Content-Type: application/json","Authorization: Bearer ".$pay->getPaypalToken()]
    //             ));
        
    //     $result = curl_exec($ch);
    //     $credentials = $result;

    //     curl_close($ch);

    //     return $credentials;
    // }
}
