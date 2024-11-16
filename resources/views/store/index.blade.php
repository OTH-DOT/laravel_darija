@extends('base')
@section('title', 'Products')

@section('content')
    <h1>Product list <a href="{{route('products.create')}}" class="btn btn-primary">create product</a> </h1>

    <div class="row row-cols-1 row-cols-md-3 ">
      @foreach ($products as $product)
      <div class="card m-2 p-0">
        <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" alt="Title" />
        <div class="card-body">
          <h4 class="card-title">{{$product->name}}</h4>
          <p class="card-text">{{$product->description}}</p>
          <span class="badge bg-primary">Quantity: {{$product->quantity}}</span>
          <span class="badge bg-success">Price: {{$product->price}} MAD</span>
          <span class="badge bg-success">Category: {{$product->category?->name}}</span>
        </div>
      </div>
      
      @endforeach
    </div>

    {{-- {{$products->links()}} --}}
@endsection