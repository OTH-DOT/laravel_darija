<x-master title="Mon Profile">

  <div class="container">
    <h1>Ajouter publication</h1>
    
    @if ($errors->any())
      <x-alert type='danger'>
        <h5>Errors : </h5>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </x-alert>
    @endif
  
    <form action="{{route('publications.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="" class="form-label">titre</label>
        <input
          type="text"
          name="titre"
          class="form-control"
          value="{{old('titre')}}"
        />
        @error('titre')
          <div class="text-danger">
            {{$message}}
          </div>
        @enderror
        <br>
        <label for="" class="form-label">Description</label>
        <textarea name="body" class="form-control" >{{old('body')}}</textarea>
        @error('body')
        <div class="text-danger">
          {{$message}}
        </div>
        @enderror
        <br>
        <label for="">Image</label>
        <input type="file" name="image" id="">
        @error('image')
        <div class="text-danger">
          {{$message}}
        </div>
        @enderror
        <br>
      </div>
      <div class="d-grid">
        <button
        type="submit"
        class="btn btn-primary block"
      >
        Ajouter 
      </button>
      </div>
      
    </form>
    
  </div>
  
  </x-master>