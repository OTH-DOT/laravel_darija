<x-master title="Publications">

<style>
  /* .all {
    display: grid;
    grid-template-columns: repeat(auto-fit , minmax(200px,1fr));
    gap: 40px;
  } */
</style>

<div class="all container">
  @foreach ($publications as $publication)
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
      @can('update', $publication)
      <a class="text-white btn btn-primary m-1" href="{{route('publications.edit', $publication->id)}}">modifier</a>
      @endcan
      @can('delete', $publication)
      <form action="{{route('publications.destroy', $publication->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('voulez vous vraiment supprimer cette publication ?')" class="btn btn-danger m-1">supprimer</button>
      </form>
      @endcan
    </div>
    
    
  @endforeach
</div>

{{$publications->links()}}

</x-master>
