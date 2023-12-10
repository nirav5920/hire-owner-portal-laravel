<x-mail::message>
# Congratulation! Your order has been confirmed.

<div>
<h3>Product Details</h3>
<p>Name: {{ $order->product->name }}</p>
<p>Price: {{ $order->product->price }}</p>
<h3>Order Details</h3>
<p>Booking Date : {{ $order->start_date.'-'.$order->end_date }}</p>
<h3>Owner Details</h3>
<p>Name : {{ $order->product->user->name }}</p>
<p>Contact Number : {{ $order->product->contact_number }}</p>
<p>Email : {{ $order->product->user->email }}</p>
</div>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
