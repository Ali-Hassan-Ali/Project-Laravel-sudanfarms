<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Categorey;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::whenSearch(request()->search)->where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('home.my_acount.products.index',compact('products'));

    }//end of model


    public function create()
    {
        $sub_categoreys = Categorey::where('sub_categoreys','0')->get();
        
        return view('home.my_acount.products.create',compact('sub_categoreys'));

    }//end of create

   
    public function store(Request $request)
    {

        $request->validate([
            'name_ar'           => 'required',
            'name_en'           => 'required',
            'quantity'          => 'required',
            'quantity_guard_ar' => 'required',
            'quantity_guard_en' => 'required',
            'start_time'        => 'required',
            'end_time'          => 'required',
            'description_ar'    => 'required',
            'description_en'    => 'required',
            'price'             => 'required',
            'price_decount'     => 'required',
            'sub_category_id'   => 'required',
            'image'             => 'required',
        ]);

        try {
            // return 'fda';
            $request_data = $request->except('image');

            $request_data['user_id'] = auth()->user()->id;

            $products = Product::create($request_data);

            foreach ($request->image as $key=>$imag) {

                $request_image['imag'][$key] = $imag->store('product_images','public');

            }//end of foreach

            foreach ($request_image['imag'] as $image) {
                
                ImageProduct::create([
                    'product_id' => $products->id,
                    'image'      => $image,
                ]);
            }

            notify()->success( __('dashboard.added_successfully'));

            return redirect()->route('products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

   
   
    public function show(Product $product)
    {
        return view('home.my_acount.products.show',compact('product'));
    }//en end of show

    
    public function edit(Product $product)
    {
        $sub_categoreys     = Categorey::where('sub_categoreys','0')->get();
        $categoreys_product = Categorey::where('id', $product->sub_category_id)->first();
        $categorey_id       = Categorey::where('id', $categoreys_product->sub_categoreys)->first();

        return view('home.my_acount.products.edit',compact('sub_categoreys','product','categorey_id'));

    }//end of edit

    

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name_ar'           => 'required',
            'name_en'           => 'required',
            'quantity'          => 'required',
            'quantity_guard_ar' => 'required',
            'quantity_guard_en' => 'required',
            'start_time'        => 'required',
            'end_time'          => 'required',
            'description_ar'    => 'required',
            'description_en'    => 'required',
            'price'             => 'required',
            'price_decount'     => 'required',
            'sub_category_id'   => 'required',
        ]);

      try {

            $request_data = $request->except('image');

            $request_data['user_id'] = auth()->user()->id;

            $product->update($request_data);

            if ($request->image) {

                $product_image = ImageProduct::where('product_id', $product->id)->get();


                foreach ($product_image as  $image) {
                    
                    Storage::disk('public_uploads')->delete($image->image);

                    $image->delete();
                }

                
                foreach ($request->image as $key=>$imag) {

                    $request_image['imag'][$key] = $imag->store('product_images','public_uploads');

                }//end of foreach

                foreach ($request_image['imag'] as $image) {

                    ImageProduct::create([
                        'product_id' => $product->id,
                        'image'      => $image,
                    ]);
                }

            }//end fo if image

            notify()->success( __('dashboard.updated_successfully'));

            return redirect()->route('products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Product $product)
    {
        try {

            if ($product->image != 'default.png') {

                $product_image = ImageProduct::where('product_id', $product->id)->get();


                foreach ($product_image as  $image) {
                    
                    Storage::disk('local')->delete('storage/' . $image->image);
                }

            } //end of if

            $product->delete();
            
            notify()->success( __('dashboard.deleted_successfully'));
            return redirect()->route('products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy


    public function sub_categoreys($id)
    {
        $categoreys = Categorey::where('sub_categoreys',$id)->get();

        return response()->json($categoreys);

    }//end of  sub_categoreys 

}//end of controller
