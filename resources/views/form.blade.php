<x-master title="form">
<h3>Request/Reponse</h3>
<form action="{{route('form')}}" method="POST">
  @csrf
  <input type="date" name="input_field" class="form-contro">
  <input type="submit" value="Envoyer" class="btn btn-sm btn-primary">
</form>

</x-master>