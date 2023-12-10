<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    public function index()
    {
        return view("owner.list");
    }

    /**
     *  product add view
     */
    public function add()
    {
        return view('owner.add-product');
    }
    /**
     * get products from database
     * Using the yajra datatable
     */
    public function getProducts(Request $request)
    {
        $product = Product::where('user_id', $request->user()->id);

        return DataTables::of($product)
            ->editColumn('name', function ($product) {
                if ($product->image) {
                    $image_path = asset(str_replace('public','storage', $product->image));
                } else {
                    $image_path = asset('/images/place_holder.png');
                }
                return '<div class="search-main">
                                <div class="img-box">
                                    <div><img src="' . $image_path . '" alt="img" class="img-fluid"></div>
                                </div>
                                <div class="search-cnt-inner">
                                    <p class="mb-0 text-primary">' . $product->name . '</p>
                                </div>
                            </div>';
            })
            ->editColumn('price',function($product){
                return number_format($product->price,2,'.','');
            })
            ->addColumn('action', function (Product $product) {
                $html = '';
                $html .= "<div class='d-flex gap-2'>";
                $html .= "<a href='" . route('product.edit', ['id' => $product->id]) . "' class='fs-16 p-3'> <i class='fa fa-pencil-alt'></i></a>";
                $html .= "<a href='javascript:void(0);' class=' text-danger delete-product fs-16 p-3' title='delete' data-id='" . $product->id . "' data-url='" . route('product.delete') . "' > <i class='far fa-trash-alt'></i> </a>";
                $html .= "</div>";
                return $html;
            })
            ->rawColumns(['name','price','action'])
            ->toJson();
    }

    /**
     *  store the product in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string'],
            'condition' => ['required', 'string', 'max:5000'],
            'price' => ['required', 'numeric', 'min:1', 'max:999999'],
            'image' => ['nullable', 'image', 'max:3000','mimes:jpeg,png,jpg'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'address' => ['required', 'string', 'max:5000']
        ]);

        $authUser = $request->user();
        $product = new Product();
        $product->user_id = $authUser->id;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->contact_number = $request->contact;
        $product->address = $request->address;
        $product->condition_of_item = $request->condition;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('public/products_images');
            $product->image = $image_path;
        }

        $product->save();

        return redirect(route('dashboard'))->with('status', 'Product added successfully');
    }

    /**
     *  Get a product for edit
     */
    public function edit(Request $request, $id)
    {
        $authUser = $request->user();
        $product = Product::where('id', $id)
            ->where('user_id', $authUser->id)
            ->first();

        if (!$product) {
            abort(404);
        }

        return view('owner.edit', [
            "product" => $product
        ]);
    }

    /**
     * Update the product in database
     */
    public function update(Request $request)
    {
        $authUser = $request->user();
        $request->validate([
            'product_id' => ['required', Rule::exists('products', 'id')->where('user_id', $authUser->id)],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string'],
            'condition' => ['required', 'string', 'max:5000'],
            'price' => ['required', 'numeric', 'min:1', 'max:999999'],
            'image' => ['nullable', 'image', 'max:3000','mimes:jpeg,png,jpg'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'address' => ['required', 'string', 'max:5000']
        ]);
        $product = Product::where('id', $request->product_id)
            ->where('user_id', $authUser->id)
            ->first();

        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->contact_number = $request->contact;
        $product->address = $request->address;
        $product->condition_of_item = $request->condition;

        if ($request->hasFile('image')) {
            $oldImage = $product->image;
            $image = $request->file('image');
            $image_path = $image->store('public/products_images');
            $product->image = $image_path;

            if (!empty($oldImage)) {
                if (file_exists(storage_path('app/' . $oldImage))) {
                    unlink(storage_path('app/' . $oldImage));
                }
            }
        }

        $product->save();

        return redirect(route('dashboard'))->with('status', 'Product updated successfully');
    }

    /**
     * Delete the product
     */
    public function delete(Request $request)
    {
        $authUser = $request->user();
        $request->validate([
            'product_id' => ['required',Rule::exists('products','id')->where('user_id', $authUser->id)]
        ]);

        $product = Product::find($request->product_id);
        if($product->image) {
            if (file_exists(storage_path('app/' . $product->image))) {
                unlink(storage_path('app/' . $product->image));
            }
        }
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product Delete Successfully'
        ]);
    }
}
