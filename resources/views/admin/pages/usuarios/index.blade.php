@extends('admin.layouts.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-header">
                            <div class="row" style="display: flex;align-items: center;">
                                <div class="col-10">
                                    <h3 class="card-title">Lista de Usuarios</h3>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-block btn-success" style="float: right;" data-toggle="modal" data-target="#crearUsuario">Nuevo</button>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Empresa</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->nombres}}</td>
                                            <td>{{$usuario->apellidos}}</td>
                                            <td>
                                                <?php 
                                                    $empresa = App\Models\Empresa::find($usuario->idEmpresa);
                                                    echo($empresa->nombre);
                                                ?>
                                            </td>
                                            <td>
                                                <div style="text-align: center;width:50%;float: left;">
                                                    <a href="#editarUsuario{{$usuario->id}}" data-toggle="modal"><i class="fas fa-pencil-alt" style="color: blue"></i></a>
                                                </div>
                                                <div style="text-align: center;width:50%;float: left;">
                                                    <a href="{{ route('inactivar.usuario', $usuario->id)}}"><i class="fas fa-trash-alt" style="color: red"></i></a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('crear.usuario')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <span>Nombres :</span>
                                <input type="text" name="nombres" id="" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <span>Apellidos :</span>
                                <input type="text" name="apellidos" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span>Empresa :</span>
                                <select name="idEmpresa" id="" class="form-control" required>
                                    @foreach ($empresas as $empresa)
                                        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <span>Usuario :</span>
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span>Contraseña :</span>
                                <input type="password" name="password" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($usuarios as $usuario)
        <div class="modal fade" id="editarUsuario{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('editar.usuario', $usuario->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <span>Nombres :</span>
                                    <input type="text" name="nombres" id="" class="form-control" value="{{$usuario->nombres}}" required>
                                </div>
                                <div class="col-6">
                                    <span>Apellidos :</span>
                                    <input type="text" name="apellidos" id="" class="form-control" value="{{$usuario->apellidos}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span>Empresa :</span>
                                    <select name="idEmpresa" id="" class="form-control" required>
                                        <option value="{{$usuario->idEmpresa}}">
                                            <?php 
                                                    $empres = App\Models\Empresa::find($usuario->idEmpresa);
                                                    echo($empresa->nombre);
                                                ?>
                                        </option>
                                        @foreach ($empresas as $empresa)
                                            <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <span>Usuario :</span>
                                    <input type="email" name="email" id="" class="form-control" value="{{$usuario->email}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span>Contraseña :</span>
                                    <input type="password" name="password" id="" class="form-control" value="{{$usuario->passwordVisible}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection