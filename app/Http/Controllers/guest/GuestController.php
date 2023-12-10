<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmForCustomer;
use App\Mail\OrderConfirmForOwner;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class GuestController extends Controller
{
    /**
     *  Get all products for guest show
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view("welcome", [
            'products' => $products
        ]);
    }

    /**
     *  Booking view show and product deatils
     */
    public function bookingView($id)
    {
        $product = Product::where('id', $id)->first();
        if (!$product) {
            abort(404);
        }
        return view('booking-view', [
            'product' => $product
        ]);
    }

    /**
     *  get order and save the database
     */
    public function getOrder(Request $request)
    {
        $request->validate([
            'product_id' => ['required', Rule::exists('products', 'id')],
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'string', 'max:50'],
            'strat_date' => ['required','date','date_format:Y-m-d','after_or_equal:today'],
            'end_date' => ['required','date', 'date_format:Y-m-d','after_or_equal:today'],
        ]);

        $startDate = Carbon::parse($request->strat_date)->startOfDay();
        $endDate = Carbon::parse($request->strat_date)->endOfDay();

        $orderExist = Order::where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();

        if($orderExist) {
            return redirect(route('bookingView',$request->product_id))->withInput()->withErrors(['strat_date' => 'This product is booked for selected date.']);
        }

        $order = new Order();
        $order->product_id = $request->product_id;
        $order->customer_name = $request->name;
        $order->customer_contact = $request->contact;
        $order->customer_email = $request->email;
        $order->start_date = $request->strat_date;
        $order->end_date = $request->end_date;
        $order->save();

        // Send the notification to guest and owner
        Mail::to($request->email)->send(new OrderConfirmForCustomer($order));
        Mail::to($order->product->user->email)->send(new OrderConfirmForOwner($order));

        return redirect(route('home'))->with('status','Your order has been confirmed, we have sent you notification.');
    }
}
