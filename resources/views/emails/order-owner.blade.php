<x-mail::message>
# Congratulation! You have got the new order.

<div>
<h3>Product Details</h3>
<p>Name: {{ $order->product->name }}</p>
<p>Price: {{ $order->product->price }}</p>
<h3>Customer Details</h3>
<p>Name: {{ $order->customer_name }}</p>
<p>Contact: {{ $order->customer_contact }}</p>
<p>Email: {{ $order->customer_email }}</p>
<h3>Order Details</h3>
<p>Booking Date : {{ $order->start_date.'-'.$order->end_date }}</p>
</div>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
