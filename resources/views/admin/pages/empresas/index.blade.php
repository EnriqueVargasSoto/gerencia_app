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
                                    <h3 class="card-title">Lista de Empresas</h3>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-block btn-success" style="float: right;" data-toggle="modal" data-target="#crearEmpresa">Nuevo</button>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Representante Legal</th>
                                        <th>RUC</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td>{{$empresa->nombre}}</td>
                                            <td>{{$empresa->representanteLegal}}</td>
                                            <td>{{$empresa->ruc}}</td>
                                            <td>
                                                <div style="text-align: center;width:50%;float: left;">
                                                    <a href="#editarEmpresa{{$empresa->id}}" data-toggle="modal"><i class="fas fa-pencil-alt" style="color: blue"></i></a>
                                                </div>
                                                <div style="text-align: center;width:50%;float: left;">
                                                    <a href="{{ route('inactivar.empresa', $empresa->id)}}"><i class="fas fa-trash-alt" style="color: red"></i></a>
                                                    
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
    <div class="modal fade" id="crearEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('crear.empresa')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <span>Empresa :</span>
                                <input type="text" name="nombre" id="" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <span>RUC :</span>
                                <input type="text" name="ruc" id="" class="form-control" required maxlength="11">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span>Representante Legal :</span>
                                <input type="text" name="representante" id="" class="form-control" required>
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

    @foreach ($empresas as $empresa)
        <!-- Modal -->
    <div class="modal fade" id="editarEmpresa{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('editar.empresa', $empresa->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <span>Empresa :</span>
                                <input type="text" name="nombre" id="" class="form-control" value="{{$empresa->nombre}}" required>
                            </div>
                            <div class="col-6">
                                <span>RUC :</span>
                                <input type="text" name="ruc" id="" class="form-control" value="{{$empresa->ruc}}" required maxlength="11">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span>Representante Legal :</span>
                                <input type="text" name="representante" id="" class="form-control" value="{{$empresa->representanteLegal}}" required>
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