<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Categorey;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:offers_read'])->only('index');
        $this->middleware(['permission:offers_create'])->only('create','store');
        $this->middleware(['permission:offers_update'])->only('edit','update');
        $this->middleware(['permission:offers_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $offers = Offer::latest()->paginate(10);

        return view('dashboard.offers.index',compact('offers'));

    }//end of index


    public function create()
    {
        $categorys = Categorey::where('sub_categoreys','0')->latest()->paginate(10);

        return view('dashboard.offers.create',compact('categorys'));

    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'price'       => ['required'],
            'category_id' => ['required','max:255'],
            'image'       => ['required'],
        ]);


        try {   

            $products = Product::where('sub_category_id', $request->category_id)->get();

            foreach ($products as $product) {

                 $product->update([
                    'price_decount'=> $product->price_decount + $request->price
                 ]);
                
            }//end of foreach

            $request_data = $request->except('image');

            $new_image = Image::make($request->image)->resize(150, 150)->encode('jpg');

            Storage::disk('local')->put('public/offer_images/' . $imag->hashName() , (string)$new_image, 'public');
            $request_data['image'] = 'offer_images/' . $imag->hashName();

            Offer::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.offers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function edit(Offer $offer)
    {
        $categorys = Categorey::where('sub_categoreys','0')->latest()->paginate(10);

        return view('dashboard.offers.edit', compact('offer','categorys'));

    }//end of offer


    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'price'       => ['required'],
            'category_id' => ['required'],
        ]);

        try {

            $products = Product::where('sub_category_id', $request->category_id)->get();
            $old_products = Product::where('sub_category_id', $offer->category_id)->get();

            foreach ($old_products as $product) {

                 $product->update([
                    'price_decount'=> $product->price_decount - $offer->price
                 ]);
                
            }//end of foreach

            foreach ($products as $product) {

                 $product->update([
                    'price_decount'=> $product->price_decount +  $offer->price
                 ]);
                
            }//end of foreach

            $request_data = $request->except('image');

            if ($request->image) {

                if ($offer->image != 'default.png') {

                    Storage::disk('local')->delete('public/' . $offer->image);

                } //end of inner if   

                $new_image = Image::make($request->image)->resize(150, 150)->encode('jpg');

                Storage::disk('local')->put('public/offer_images/' . $imag->hashName() , (string)$new_image, 'public');
                $request_data['image'] = 'offer_images/' . $imag->hashName();
            }

            Offer::create($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.offers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update


    public function destroy(Offer $offer)
    {

        try {

            $products = Product::where('sub_category_id', $offer->category_id)->get();

            foreach ($products as $product) {

                 $product->update([
                    'price_decount'=> $product->price_decount - $offer->price
                 ]);
                
            }//end of foreach

            Storage::disk('local')->delete('public/' . $offer->image);
            
            $offer->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.settings.offers.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of model
