<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Categorey;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:products_read'])->only('index');
        $this->middleware(['permission:products_create'])->only('create');
        $this->middleware(['permission:products_update'])->only('edit');
        $this->middleware(['permission:products_delete'])->only('destroy');

    } //end of constructor


    public function index()
    {
        $products = Product::whenSearch(request()->search)->where('user_id','1')->latest()->paginate(10);
        
        return view('dashboard.products.index',compact('products'));

    }//end of model


    public function create()
    {
        $sub_categoreys = Categorey::where('sub_categoreys','0')->get();

        $units = Unit::all();

        return view('dashboard.products.create',compact('sub_categoreys','units'));

    }//end of create

   
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'           => ['required'],
            'name_en'           => ['required'],
            'quantity'          => ['required','numeric'],
            'units_id'          => ['required','numeric'],
            'start_time'        => ['required'],
            'end_time'          => ['required'],
            'description_ar'    => ['required'],
            'description_en'    => ['required'],
            'price'             => ['required','numeric'],
            'sub_category_id'   => ['required','numeric'],
            'image'             => ['required','array'],
        ]);

        try {

            $request_data = $request->except('image');

            $request_data['user_id'] = auth()->id();

            $products = Product::create($request_data);

            $products->update(['slug' => str::slug($request->name_ar . ' ' . $products->id, '_')]);

            foreach ($request->image as $key=>$imag) {

                $new_image = Image::make($imag)->resize(450, 450)->encode('jpg');

                Storage::disk('local')->put('public/product_images/' . $imag->hashName() , (string)$new_image, 'public');
                $request_image['images'][$key] = 'product_images/' . $imag->hashName();

            }//end of foreach

            foreach ($request_image['images'] as $image) {
                
                ImageProduct::create([
                    'product_id' => $products->id,
                    'image'      => $image,
                ]);
            }

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

   
   
    public function show(Product $product)
    {
        return view('dashboard.products.show',compact('product'));

    }//en end of show


    
    public function edit(Product $product)
    {
        $sub_categoreys     = Categorey::where('sub_categoreys','0')->get();
        $categoreys_product = Categorey::where('id', $product->sub_category_id)->first();

        $units = Unit::all();

        return view('dashboard.products.edit',compact('sub_categoreys','product','units'));

    }//end of edit

    

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name_ar'           => ['required'],
            'name_en'           => ['required'],
            'quantity'          => ['required','numeric'],
            'units_id'          => ['required','numeric'],
            'start_time'        => ['required'],
            'end_time'          => ['required'],
            'description_ar'    => ['required'],
            'description_en'    => ['required'],
            'price'             => ['required','numeric'],
            'sub_category_id'   => ['required','numeric'],
            'image'             => ['required','array'],
        ]);

        try {

            $request_data = $request->except('image');

            $request_data['user_id'] = auth()->id();

            $product->update($request_data);

            if ($request->image) {

                $product_image = ImageProduct::where('product_id', $product->id)->get();


                foreach ($product_image as  $image) {

                    if ($image->image != 'default.png') {

                        Storage::disk('local')->delete('public/' . $image->image);

                    } //end of inner if  

                    $image->delete();

                }//end of foreach

                
                foreach ($request->image as $key=>$imag) {

                    $new_image = Image::make($imag)->resize(450, 450)->encode('jpg');

                    Storage::disk('local')->put('public/product_images/' . $imag->hashName() , (string)$new_image, 'public');
                    $request_image['images'][$key] = 'product_images/' . $imag->hashName();


                }//end of foreach

                foreach ($request_image['images'] as $image) {

                    ImageProduct::create([
                        'product_id' => $product->id,
                        'image'      => $image,
                    ]);
                }

            }//end fo if image

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.products.index');

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
                    
                    Storage::disk('local')->delete('public/' . $image->image);

                    $image->delete();
                }

            } //end of if

            $product->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end ofcontroller
