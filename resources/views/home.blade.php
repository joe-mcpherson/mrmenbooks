@extends('layouts.app')

@section('header_title')Home Page @endsection
@section('content')

	<h1>Home Page</h1>
	<p>A Great Mr Men Documents Website</p>

        @if  (count($products_viewed) > 0) <p>Documents you have viewed:</p> 
            <ul>    
            @foreach ($products as $product)
                @if  (array_key_exists($product->id, $products_viewed)) <li>{{ $product->title }}</li> @endif
            @endforeach
            </ul>
        @else
            <p>You haven't viewed any documents yet</p>
        @endif
        
        @if ($product_purchased)
	<p>You have just bought:</p>
	<p>{{ $product_purchased->title }}</p>
	<p>{{ $product_purchased->info }}</p>
	 @endif

	<a href="/list">View The Document List</a>

@endsection