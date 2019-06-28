@extends('layouts.app')
@section('title', 'Criar Contato')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adiciona Contato</h1>
    <div>
        <a style="margin: 19px;" href="/contatos" class="btn btn-primary">Voltar</a>
    </div>  
    <div class="alert alert-success" style="display:none"></div>
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
      <form id="formulario">
          <div class="form-group">    
              <label for="nome">Nome:</label>
              <input id="nome" type="text" class="form-control" name="nome"/>
          </div>

          <div class="form-group">
              <label for="sobrenome">Sobrenome:</label>
              <input id="sobrenome" type="text" class="form-control" name="sobrenome"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input id="email" type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input id="telefone" type="text" class="form-control" name="telefone"/>
        </div>
          <div class="form-group">
              <label for="Cidade">Cidade:</label>
              <input id="cidade" type="text" class="form-control" name="cidade"/>
          </div>
          <div class="form-group">
              <label for="Estado">Estado:</label>
              <input id="estado" type="text" class="form-control" name="estado"/>
          </div>
          <div class="form-group">
              <label for="profissao">Profissão:</label>
              <input id="profissao" type="text" class="form-control" name="profissao"/>
          </div>                         
          <button id="enviar" class="btn btn-primary-outline enviar">Adicionar Contato</button>
      </form>
  </div>
</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    $(document).ready(function(){
       $('#enviar').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
         });
          $.ajax({
             url: "{{ url('/contatos') }}",
             method: 'post',
             data: {
                nome: $('#nome').val(),
                sobrenome: $('#sobrenome').val(),
                telefone: $('#telefone').val(),
                email: $('#email').val(),
                cidade: $('#cidade').val(),
                estado: $('#estado').val(),
                profissao: $('#profissao').val()
             },
             success: function(result){

              swal("Cadastrado Com Sucesso!", "", "success");
              $('#formulario').each (function(){
                this.reset();
              });
            }});
          });
       });
</script>


@endsection