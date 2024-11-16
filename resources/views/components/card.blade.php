@props(['profile'])

<div>
  <img style="max-width: 200px" src="{{ asset('storage/'.$profile->image) }}" alt="img">
  <h2>{{$profile->name}}</h2>
  <p>{{$profile->email}}</p>
  <p>{{Str::limit($profile->bio, 40)}}</p>
  <button><a href="{{route('profile.show', $profile->id)}}">show more</a></button>
  <div>
    <form action="{{route('profile.destroy', $profile->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger">Supprimer</button>
    </form>
    <form action="{{route('profile.edit', $profile->id)}}" method="GET">
      @csrf
      <button class="btn btn-primary">modifier</button>
    </form>
  </div>
</div>