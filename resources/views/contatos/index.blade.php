@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div class="col-sm-12">
    <h1 class="display-3">Contatos</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Email</td>
          <td>Idade</td>
          <td>Genêro</td>
          <td>Nacionalidade</td>
          <td>Cidade</td>
          <td colspan = 2>Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($contatos as $contato)
        <tr>
            <td>{{$contato->id}}</td>
            <td>{{$contato->nome}}</td>
            <td>{{$contato->email}}</td>
            <td>{{$contato->idade}}</td>
            <td>{{$contato->genero}}</td>
            <td>{{$contato->nacionalidade}}</td>
            <td>{{$contato->cidade}}</td>
            <td>
                <a href="{{ route('contatos.edit',$contato->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('contatos.destroy', $contato->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('Deseja apagar?')" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>

<div>
    <a style="margin: 19px;" href="{{ route('contatos.create')}}" class="btn btn-primary">Novo contato</a>
    <a style="margin: 19px;" href="{{ url('/home') }}" class="btn btn-primary">Voltar</a>
</div>  


@endsection