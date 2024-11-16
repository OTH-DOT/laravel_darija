<x-master title="login">
  <h3>Authentification</h3>
  <form action="{{route('login')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Email</label>
      <input type="text" name="login" class="form-control" value="{{old('login')}}">
      @error('login')
        <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Mot de passe</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="d-grid">
      <button class="btn btn-primary">Se connecter</button>  
    </div>  
  </form>



</x-master>