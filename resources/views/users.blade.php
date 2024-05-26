@extends('base-app')

@section('content-wrapper')
<h4>Usuarios</h4>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('errors')
        </div>
        <div class="col-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#usercreateModal">
                Nuevo
            </button>
        </div>
        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Es tecnico</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td> {{$user->id}}</td>
                        <td> {{$user->getFullName()}}</td>
                        <td> {{$user->getFullDocument()}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->phone_number}}</td>
                        <td>  @if ($user->is_technical==1) <span class="text-success-emphasis">SI</span> @else <span class="text-warning-emphasis">NO</span>@endif</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#userEditModal-{{$user->id}}">Editar</button>
                            @include('user-edit',['user'=>$user])
                        </td>
                        <td>
                            <form action="{{route('usuarios.destroy',['usuario' => $user->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-sm btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
@include('user-create')
@endsection