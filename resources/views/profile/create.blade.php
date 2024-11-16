<x-master title="Mon Profile">

<div class="container">
  <h1>Ajouter profile</h1>
  
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

  <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input
        type="text"
        name="name"
        class="form-control"
        value="{{old('name')}}"
      />
      @error('name')
        <div class="text-danger">
          {{$message}}
        </div>
      @enderror
      <br>
      <label for="" class="form-label">Email</label>
      <input
        type="email"
        name="email"
        class="form-control"
        value="{{old('email')}}"
      />
      @error('email')
      <div class="text-danger">
        {{$message}}
      </div>
      @enderror
      <br>
      <label for="" class="form-label">password</label>
      <input
        type="password"
        name="password"
        class="form-control"
        value="{{old('password')}}"
      />
      <br>
      <label for="" class="form-label">password confirmation</label>
      <input
        type="password"
        name="password_confirmation"
        class="form-control"
      />
      <label for="" class="form-label">Bio</label>
      <textarea name="bio" class="form-control" >{{old('bio')}}</textarea>
      <label for="">Image</label>
      <input type="file" name="image" id="">
    </div>
    <div class="d-grid">
      <button
      type="submit"
      class="btn btn-primary block"
    >
      Submit
    </button>
    </div>
    
  </form>
  
</div>

</x-master>