@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicionar contato</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contatos.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="idade">Idade:</label>
              <input type="text" class="form-control" name="idade"/>
          </div>
          <div class="form-group">
              <label for="genero">Genêro:</label>
              <input type="text" class="form-control" name="genero"/>
          </div>
          <div class="form-group">
              <label for="nacionalidade">Nacionalidade:</label>
              <input type="text" class="form-control" name="nacionalidade"/>
          </div>
          <div class="form-group">
              <label for="cidade">Cidade:</label>
              <input type="text" class="form-control" name="cidade"/>
          </div>                         
          <button type="submit" class="btn btn-primary-outline">Adicionar Contato</button>
      </form>
  </div>
</div>
</div>
@endsection