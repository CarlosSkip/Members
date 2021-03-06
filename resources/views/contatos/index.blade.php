@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">

    <h1 class="display-3">Contatos</h1>

    <div>
        <a style="margin: 19px;" href="{{ route('contatos.create')}}" class="btn btn-primary">Novo Contato</a>
        <a style="margin: 19px;" href="/home" class="btn btn-primary">Voltar</a>
     </div>  

  <table class="table table-striped">
 
    <thead>
        <tr>
          <td>Nome</td>
          <td>Email</td>
          <td>Profissão</td>
          <td>Cidade</td>
          <td>Estado</td>
          <td>Telefone</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>

    <tbody>
        @foreach($contatos as $contact)
        <tr>
            <td>{{$contact->nome}} {{$contact->sobrenome}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->profissao}}</td>
            <td>{{$contact->cidade}}</td>
            <td>{{$contact->estado}}</td>
            <td>{{$contact->telefone}}</td>
            <td>
                <a href="{{ route('contatos.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('contatos.destroy', $contact->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>

<div class="col-sm-12">

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
    @endif
</div>
      
@endsection