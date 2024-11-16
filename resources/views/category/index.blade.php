@extends('base')
@section('title', 'categories')

@section('content')
    <h1>Categories <a href="{{route('categories.create')}}" class="btn btn-primary">create category</a></h1>
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
          @foreach ($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{route('categories.show', $category->id)}}" class="btn btn-info">show</a>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">update</a>
                    <form action="{{route('categories.destroy', $category->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="delete" class="btn btn-danger" /> 
                    </form>
                  </div>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
@endsection