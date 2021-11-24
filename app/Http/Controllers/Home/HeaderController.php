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
use App\Models\Commint;
use App\Models\VideoCategory;
use App\Models\CommonQuestion;
use App\Models\Video;
use App\Models\Blog;
use App\Models\File;

class HeaderController extends Controller
{

    public function searchs()
    {
        $products = Product::whenSearch(request()->search)->latest()->paginate(10);

        return view('home.header.searchs',compact('products'));

    }//end of searchs products

    public function shops()
    {
        $products = Product::inRandomOrder()->latest()->paginate(20);

        return view('home.shop',compact('products'));    

    }//end of shop


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

    }//end of show_category

    public function request_custmers()
    {
        return view('home.header.request_custmers');

    }//end of request_custmers

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
    }//end of videos

    public function blogs()
    {
        $blogs        = Blog::whenSearch(request()->search)->latest()->paginate(8);
        $random_blogs = Blog::inRandomOrder()->latest()->paginate(6);

        return view('home.header.media_center.blogs.index',compact('blogs','random_blogs'));
    }//end of blogs

    public function blogsShow(Blog $blog)
    {

        if (Blog::find($blog->id + 1)) {
            
            $next_blog = Blog::find($blog->id + 1);
            
        } else {

            $next_blog = 0;

        }

        if (Blog::find($blog->id - 1)) {
            
            $prev_blog = Blog::find($blog->id - 1);
            
        } else {
            
            $prev_blog = 0;

        }

        $commints = Commint::where('blog_id',$blog->id)->with('user')->get();
        
        return view('home.header.media_center.blogs.show',compact('blog','prev_blog','next_blog','commints'));

    }//end of blogs Show

    public function CommintStore(Request $request)
    {
        
        $request->validate([
            'message'    => 'required',
        ]);
        
        $request['users_id'] = auth()->user()->id;

        Commint::create($request->all());

        return redirect()->back();

    }//end of store blog

    public function files()
    {
        $files = File::all();

        return view('home.header.media_center.files',compact('files'));
        
    }//end of files

    public function common_questions()
    {
        $common_questions = CommonQuestion::all();

        return view('home.header.common_questions',compact('common_questions'));
        
    }//end of common_questions

}//end of controller
