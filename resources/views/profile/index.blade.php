<x-master title="profiles">

<style>
  .all {
    display: grid;
    grid-template-columns: repeat(auto-fit , minmax(200px,1fr));
    gap: 40px;
  }
</style>

<div class="all">
  @foreach ($profiles as $profile)
  <x-card :profile='$profile'  />
  @endforeach
</div>

{{$profiles->links()}};

</x-master>
