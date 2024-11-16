@extends('base')
@section('title', 'categories')

@section('content')
    <h1>Categories {{$category->name}}  
    <a href="{{route('categories.index')}}" class="btn btn-primary">Go back</a></h1>
    <div
      class="table-responsive-md"
    >
      <table
        class="table table-primary"
      >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>
                  <div class="btn-group"> 
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">update</a>
                  </div>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
@endsection