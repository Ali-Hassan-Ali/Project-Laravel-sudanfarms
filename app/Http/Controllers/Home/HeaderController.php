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
use App\Models\RequestCustmer;
use App\Models\Video;
use App\Models\Blog;
use App\Models\File;
use App\Models\Offer;
use App\Models\Unit;
use App\Models\OrderItem;
use App\Models\PriceTable;

class HeaderController extends Controller
{

    public function searchs()
    {
        $products = Product::whenSearch(request()->search)
                           ->orderBy('eye_count','DESC')
                           ->paginate(10)
                           ->where('status',1);

        return view('home.header.searchs',compact('products'));

    }//end of searchs products



    public function shops()
    {
        if (request()->from_price || request()->to_price) {

            $products = Product::whereBetween('price',[request()->from_price,request()->to_price])
                                ->orderBy('eye_count','DESC')
                                ->paginate(20)
                                ->where('status',1);

            return view('home.shop',compact('products'));            
        }

        $products = Product::orderBy('eye_count','DESC')->limit(10)->get()->where('status',1);

        return view('home.shop',compact('products'));

    }//end of shop



    public function offers()
    {
        $offers = Offer::latest()->paginate(10);

        return view('home.header.offers.index', compact('offers'));

    }//end of offers



    public function offersShow($id)
    {
        $products = Product::where('sub_category_id',$id)->orderBy('eye_count','DESC')->paginate(10);

        return view('home.header.offers.show', compact('products'));

    }//end of offers show



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
        notify()->success( __('dashboard.added_successfully'));
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
        
        $min_product->update([
            'eye_count' => $min_product->eye_count + 1
        ]);

        $category_product   = Categorey::where('sub_categoreys',$min_product->sub_category_id)->latest()->limit(4)->get();
        
        $image_product      = ImageProduct::where('product_id',$product->id)->get();
        
        $promoted_dealer    = PromotedDealer::where('user_id',$product->user->id)->first();
        
        if (Product::find($product->id + 1)) {
            
            $next_product = Product::find($product->id + 1);

            $next_image_product = ImageProduct::where('product_id',$next_product->id)->first();
            
        } else {

            $next_product = Product::find($product->id + 1);

            $next_image_product = 0;

        }//end of if next_product

        if (Product::find($product->id - 1)) {
            
            $prev_product = Product::find($product->id - 1);

            $prev_image_product = ImageProduct::where('product_id',$prev_product->id)->first();
            
        } else {

            $prev_product = Product::find($product->id + 1);
            
            $prev_image_product = 0;

        }//end of if prev_product

        return view('home.products.show',compact('product','image_product','next_product',
                                                 'next_image_product','prev_product','prev_image_product',
                                                 'promoted_dealer','min_product','category_product'));

    }//end of show product



    public function show_category($id)
    {

        if (request()->from_price || request()->to_price) {

            $categorey   = Categorey::where('id',$id)->first();

            $min_product = Product::where('sub_category_id',$categorey->id)->whereBetween('price',[request()->from_price, request()->to_price])->with('imageProduct')->latest()->paginate(20);

            return view('home.header.categories',compact('categorey','min_product'));
        }

        $categorey   = Categorey::where('id',$id)->first();

        $min_product = Product::where('sub_category_id',$categorey->id)->with('imageProduct')->latest()->paginate(20);
        
        return view('home.header.categories',compact('categorey','min_product'));

    }//end of show_category


    public function request_custmers()
    {
        if (!auth()->check()) {
            
            return redirect()->route('home.login');

        }//end of if auth check

        $request_custmers = RequestCustmer::paginate(10);

        return view('home.header.request_custmers.index',compact('request_custmers'));

    }//end of request_custmers


    public function RequestCustmersCreate()
    {
        $promoted_dealers = PromotedDealer::all();

        $units = Unit::all();

        return view('home.header.request_custmers.create',compact('promoted_dealers','units'));

    }//end if request_custmers create


    public function RequestCustmersStore(Request $request)
    {
        $request->validate([
            'name'            => ['required'],
            'phone'           => ['required'],
            'email'           => ['required'],
            'title'           => ['required'],
            'product_name'    => ['required'],
            'units_id'        => ['required'],
            'quantity'        => ['required'],
            'date_shipment'   => ['required'],
            'end_time'        => ['required'],
        ]);

        $request['user_id'] = auth()->id();

        RequestCustmer::create($request->all());

        notify()->success( __('dashboard.added_successfully'));
        return redirect()->route('request_custmers.index');

    }//end if request_custmers create


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
        $blogs        = Blog::whenSearch(request()->search)->latest()->paginate(10);
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
        
        $request['users_id'] = auth()->id();

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

    public function special_requests()
    {
        $id = auth()->id();

        $orderItems = OrderItem::where('promoted_dealer_id',$id)->with('user')->latest()->paginate(10);
        
        return view('home.my_acount.orders.special_requests',compact('orderItems'));

    }//end of special_requests

    public function price_tables()
    {   
        $price_tables = PriceTable::whenSearch(request()->search)->latest()->paginate(10);

        return view('home.header.media_center.price_tables',compact('price_tables'));

    }//end of price tables


}//end of controller
