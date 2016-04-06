@extends('layouts.app')

@section('header_title')Documents @endsection
@section('content')

	<h1>Documents</h1>
        
        <table class="table table-striped task-table">

            <!-- Table Headings -->
            <thead>
                <th>Document</th>
                <th>Action</th>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $product->title }}
                            @if ($last_product_viewed == $product->id)<span class="last_viewed">*</span> @endif 
                            </div>
                        </td>

                        <td>
                            <a href="/detail/{{ $product->id }}">More Info</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

	<a href="/">Return To The Home Page</a>
        @if ($last_product_viewed) <div class="footnote">* This is the last document you viewed</div> @endif 
@endsection