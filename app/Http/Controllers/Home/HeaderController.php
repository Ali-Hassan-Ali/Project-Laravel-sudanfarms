<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Categorey;
use App\Models\ImageProduct;
use App\Models\PromotedDealer;
use App\Models\CategoryDealer;
use App\Models\GalleryCategory;
use App\Models\Gallery;
use App\Models\VideoCategory;
use App\Models\Video;

class HeaderController extends Controller
{
    public function contact()
    {
        return view('home.header.contact');
    }//end of contact

    public function contactStore(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'body'    => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back();

    }//end of contact

    public function supplier()
    {       
        $category_dealers = CategoryDealer::all();

        return view('home.header.suppliers',compact('category_dealers'));

    }//end of supplier

    
    public function show_product(Product $product)
    {
        $min_product = $product;
        $image_product = ImageProduct::where('product_id',$product->id)->get();
        
        $promoted_dealer    = PromotedDealer::where('user_id',$product->user->id)->first();
        
        if (Product::find($product->id + 1)) {
            
            $next_product = Product::find($product->id + 1);

            $next_image_product = ImageProduct::where('product_id',$next_product->id)->first();
            
        } else {

            $next_product = Product::find($product->id + 1);

            $next_image_product = 0;

        }

        if (Product::find($product->id - 1)) {
            
            $prev_product = Product::find($product->id - 1);

            $prev_image_product = ImageProduct::where('product_id',$prev_product->id)->first();
            
        } else {

            $prev_product = Product::find($product->id + 1);
            
            $prev_image_product = 0;

        }

        return view('home.products.show',compact('product','image_product','next_product','next_image_product','prev_product','prev_image_product','promoted_dealer','min_product'));

    }//end of show product


    public function show_category($id)
    {
        $categorey   = Categorey::where('id',$id)->first();

        $min_product = Product::where('sub_category_id',$categorey->id)->with('imageProduct')->get();
        
        return view('home.header.categories',compact('categorey','min_product'));

    }//end of categorey

    public function gallerys()
    {
        $gallery_categorys = GalleryCategory::all();
        $gallerys          = Gallery::all();

        return view('home.header.media_center.gallerys',compact('gallery_categorys','gallerys'));
    }//end of gallerys

    public function videos()
    {
        $video_categorys = VideoCategory::all();
        $videos          = Video::all();

        return view('home.header.media_center.videos',compact('video_categorys','videos'));
    }//end of gallerys

}//end of controller
