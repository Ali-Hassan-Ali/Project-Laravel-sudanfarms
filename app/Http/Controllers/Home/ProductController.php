<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorey;
use App\Models\NotificationUser;
use App\Models\Notification;
use App\Models\ImageProduct;
use App\Models\PromotedDealer;
use App\Models\Package;
use App\Models\Unit;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::whenSearch(request()->search)
                            ->where('user_id', auth()->id())
                            ->latest()
                            ->paginate(10);

        return view('home.my_acount.products.index',compact('products'));

    }//end of model


    public function create()
    {

        $PromotedDealer = PromotedDealer::where('user_id', auth()->id())->first();

        $id = $PromotedDealer->PromotedDealerFirst[0]->package_id;

        if ($id) {

            $package = Package::find($id);

        }//end of if

        $sub_categoreys = Categorey::where('sub_categoreys','0')->get();

        $productCount = Product::where('user_id', auth()->id())->count();

        $units = Unit::all();
        
        return view('home.my_acount.products.create',compact('sub_categoreys','units','package','PromotedDealer','productCount'));

    }//end of create

   
    public function store(Request $request)
    {   
        $PromotedDealer = PromotedDealer::where('user_id', auth()->id())->first();

        $id = $PromotedDealer->PromotedDealerFirst[0]->package_id;

        if ($id) {

          $package = Package::find($id);

          $productCount = Product::where('user_id', auth()->id())->count();

          if ($productCount > $package->qty_product) {
              
            return redirect()->back();

          }//end of if

        }//end of if

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
        // dd($request->all());
        // return $request->all();

        // try {

            $request_data = $request->except('image');

            $request_data['user_id']       = auth()->id();
            $request_data['price_decount'] = $request->price_decount ?? '0';

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

            }//end of foreach

            $noty = Notification::create([
                'title_ar' => 'تم اضافه منتج جديد',
                'title_en' => 'created new product',
                'slug'     => 'products',
                'user_id'  => '1',
            ]);//end of create

            $user = NotificationUser::create([
                'title_ar' => 'لقم قمت باضافه منتج ',
                'title_en' => 'created new product',
                'slug'     => 'products',
                'user_id'  => auth()->id(),
                'type'     => 'update_profile',
            ]); //end of create

            \Mail::to($PromotedDealer->email)->send(new \App\Mail\NotyEmail($noty));

            \Mail::to(env('MAIL_USERNAME'))->send(new \App\Mail\NotyEmail($user));

            session()->forget('product-totle_price');
            session()->forget('product-price');
            session()->forget('product-totle_price');
            session()->forget('product-decount-price');

            notify()->success( __('dashboard.added_successfully'));
            return redirect()->route('products.index');

        // } catch (\Exception $e) {

            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        // }//end try

    }//end of store

   
   
    public function show(Product $product)
    {
        if (!$product->promotedd->promotedd == '1') {

            return redirect()->route('welcome.index');
        }

        return view('home.my_acount.products.show',compact('product'));

    }//en end of show

    
    public function edit(Product $product)
    {
        $sub_categoreys     = Categorey::where('sub_categoreys','0')->get();
        $categoreys_product = Categorey::where('id', $product->sub_category_id)->first();
        $categorey_id       = Categorey::where('id', $categoreys_product->sub_categoreys)->first();
        $units              = Unit::all();

        return view('home.my_acount.products.edit',compact('sub_categoreys','product','categorey_id','units'));

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
        ]);

      try {

            $request_data = $request->except('image');

            $request_data['user_id'] = auth()->id();

            $product->update($request_data);

            if ($request->image) {

                $product_image = ImageProduct::where('product_id', $product->id)->get();


                foreach ($product_image as  $image) {

                    Storage::disk('local')->delete('storage/' . $image->image);

                    $image->delete();
                }

                
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
