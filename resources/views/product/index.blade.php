@extends('base')
@section('title', 'Products')

@section('content')
    <h1>Product list <a href="{{route('products.create')}}" class="btn btn-primary">create product</a> </h1>
    <div
      class="table-responsive"
    >
      <table
        class="table table-primary"
      >
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
            <tr>
              <th scope="col">{{$product->name}}</th>
              <th scope="col">{{$product->description}}</th>
              <th scope="col">{{$product->quantity}}</th>
              <th scope="col">{{$product->category?->name}}</th>
              <th scope="col"><img width="80" src="{{asset('storage/'.$product->image)}}" alt=""></th>
              <th scope="col">{{$product->price}} MAD</th>
              <th scope="col">
                <div class="btn-group">
                  <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">update</a>
                  <form action="{{route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger" /> 
                  </form>
                </div>
              </th>
            </tr>
          @empty
            <tr>
              <td colspan="6" align="center" class="p-4"><h5>NO PRODUCTS</h5></td>
            </tr>
            
          @endforelse
        </tbody>
      </table>
    </div>
    {{$products->links()}}
@endsection