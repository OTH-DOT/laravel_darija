<x-master title="mon profile">

<h1>profile</h1>

  <div class="card">
    <img class="card-img-top" src="{{asset('storage/'.$profile->image)}}" alt="Title" />
    <div class="card-body">
      <h4 class="card-title">{{$profile->name}}</h4>
      <p class="card-text">{{$profile->email}}</p>
      <p class="card-text">{{$profile->bio}}</p>
    </div>
  </div>
  <h2 class="mt-5">Publications</h2>
  <div class="card container">
    @foreach ( $publications as $publication )
    <div class="card m-5">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <img style="border-radius: 50%" src="{{asset('storage/'.$publication->profile->image)}}" width="100" height="100" alt="">
          <h3 class="ms-3"><a class="text-black" href="{{route('profile.show', $publication->profile->id)}}">{{$publication->profile->name}}</a></h3>
        </div>
        <p class="text-black-50">{{$publication->created_at}}</p>
        <h4 class="card-title">{{$publication->titre}}</h4>
        <p class="card-text">{{$publication->body}}</p>
      </div>
      @if ($publication->image !== null)
        <img class="card-img-top" src="{{asset('storage/'.$publication->image)}}" alt="Title" />
      @endif
      @auth
      @if ($publication->profile_id === auth()->user()->id)
        <a class="text-white btn btn-primary m-1" href="{{route('publications.edit', $publication->id)}}">modifier</a>
        <form action="{{route('publications.destroy', $publication->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button onclick="return confirm('voulez vous vraiment supprimer cette publication ?')" class="btn btn-danger m-1">supprimer</button>
        </form>
      @endif
      @endauth 
    </div>
    @endforeach
  </div>
  

</x-master>