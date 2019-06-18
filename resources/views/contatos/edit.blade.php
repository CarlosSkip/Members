@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Contato {{ $contatos->nome }}</h1>
        <a style="margin: 19px;" href="/contatos" class="btn btn-danger">Voltar</a>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
        
        @endif
        <form method="post" action="{{ route('contatos.update', $contatos->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" value={{ $contatos->nome }} />
            </div>

            <div class="form-group">
                <label for="sobrenome">Sobrenome: </label>
                <input type="text" class="form-control" name="sobrenome" value={{ $contatos->sobrenome }} />
            </div>

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" name="email" value={{ $contatos->email }} />
            </div>

            <div class="form-group">
                <label for="telefone">Telefone: </label>
                <input type="text" class="form-control" name="telefone" value={{ $contatos->telefone }} />
            </div>

            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" value={{ $contatos->cidade }} />
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" value={{ $contatos->estado }} />
            </div>

            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" class="form-control" name="profissao" value={{ $contatos->profissao }} />
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection