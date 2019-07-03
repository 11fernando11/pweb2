@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualize seu contato</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('contatos.update', $contatos->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value={{ $contatos->nome }} />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $contatos->email }} />
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="text" class="form-control" name="idade" value={{ $contatos->idade }} />
            </div>
            <div class="form-group">
                <label for="genero">Genêro:</label>
                <input type="text" class="form-control" name="genero" value={{ $contatos->genero }} />
            </div>
            <div class="form-group">
                <label for="nacionalidade">Nacionalide:</label>
                <input type="text" class="form-control" name="nacionalidade" value={{ $contatos->nacionalidade }} />
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" value={{ $contatos->cidade }} />
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection