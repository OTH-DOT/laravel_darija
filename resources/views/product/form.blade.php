@extends('base')
@section('title',($isUpdate ? 'Update' : 'Create') . 'Product')

@php
    if($isUpdate) {
      $route = route('products.update', $product->id);
    }else {
      $route = route('products.store');
    }
@endphp

@section('content')
  <h2>@yield('title')</h2>

  <form action="{{$route}}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($isUpdate)
        @method('PUT')
    @endif
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{old('name',$product->name)}}"/>
      <label for="" class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control">{{old('description',$product->description)}}</textarea>
      <label for="" class="form-label">quantity</label>
      <input type="number" name="quantity" id="quantity" class="form-control " value="{{old('quantity',$product->quantity)}}" />
      <label for="" class="form-label">category</label>
      <select name="category_id" id="category_id" class="w-100 form-select">
        <option value="">select category</option>
          @foreach ($categories as $category)
              <option @selected(old('category_id',$product->category_id) === $category->id) value="{{$category->id}}" >{{$category->name}}</option>
          @endforeach
      </select>
      <br>
      <label for="" class="form-label">image</label>
      <input type="file" name="image" id="image" class="form-control" />
      @if ($product->image)
        <img width="80" src="{{asset('storage/'.$product->image)}}" alt="">  
      @endif
      <br>
      <label for="" class="form-label">price</label>
      <input type="number" name="price" id="price" class="form-control" value="{{old('price',$product->price)}}" />
      <button class="btn btn-primary w-100 mt-3" >{{$isUpdate ? 'Update' : 'Create'}}</button>
    </div>
    
  </form>

@endsection