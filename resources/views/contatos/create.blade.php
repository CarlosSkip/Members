@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adiciona Contato</h1>
    <div>
        <a style="margin: 19px;" href="/contatos" class="btn btn-primary">Voltar</a>
    </div>  
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
              <label for="sobrenome">Sobrenome:</label>
              <input type="text" class="form-control" name="sobrenome"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" name="telefone"/>
        </div>
          <div class="form-group">
              <label for="Cidade">Cidade:</label>
              <input type="text" class="form-control" name="cidade"/>
          </div>
          <div class="form-group">
              <label for="Estado">Estado:</label>
              <input type="text" class="form-control" name="estado"/>
          </div>
          <div class="form-group">
              <label for="profissao">Profissão:</label>
              <input type="text" class="form-control" name="profissao"/>
          </div>                         
          <button type="submit" class="btn btn-primary-outline">Adicionar Contato</button>
      </form>
  </div>
</div>
</div>
@endsection