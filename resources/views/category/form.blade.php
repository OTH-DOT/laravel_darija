@extends('base')
@section('title',($isUpdate ? 'Update' : 'Create') . 'Product')

@php
    if($isUpdate) {
      $route = route('categories.update', $category->id);
    }else {
      $route = route('categories.store');
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
      <input type="text" name="name" id="name" class="form-control" value="{{old('name',$category->name)}}"/>
      <button class="btn btn-primary w-100 mt-3" >{{$isUpdate ? 'Update' : 'Create'}}</button>
    </div>
    
  </form>

@endsection