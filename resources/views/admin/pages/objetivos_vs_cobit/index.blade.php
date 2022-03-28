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
                                    <h3 class="card-title">Objetivos Estratégicos VS COBIT 2019</h3>
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
                                        <th>Código</th>
                                        <th>Fecha</th>
                                        <th>Mapa</th>
                                        <th>Metas COBIT resultantes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--@foreach ($usuarios as $usuario)
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
                                    @endforeach--}}
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
@endsection