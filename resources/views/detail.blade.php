@extends('layouts.app')

@section('header_title'){{ $product->title }} detail @endsection
@section('content')

	<h1>{{ $product->title }}</h1>
         <!-- Display Validation Errors -->
        @include('common.errors')
	<h2>Information</h2>
	<p>{{ $product->info }}</p>
	<p><a href="/list">No Thanks</a></p>

        <div>
            <form action="{{ url('buy') }}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}
                <label for="email">Email Address:</label>
                <input type="text" name="email" />
                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                <input type="submit" name="buyme" value="Buy document/book"/>
            </form>
	</div>

@endsection