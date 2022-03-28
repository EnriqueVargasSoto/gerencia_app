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
                                    <h3 class="card-title">Lista de Objetivos Estratégicos de la Empresa</h3>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-block btn-success" style="float: right;" data-toggle="modal" data-target="#crearObjetivo">Nuevo</button>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Perspectiva</th>
                                        <th>Objetivo Estratégico</th>
                                        <th>Código</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objetivos as $objetivo)
                                        <tr>
                                            <td>{{$objetivo->perspectiva}}</td>
                                            <td>{{$objetivo->objetivo}}</td>
                                            <td>{{$objetivo->codigo}}</td>
                                            <td>
                                                <div style="text-align: center;width:50%;float: left;">
                                                    <a href="#editarObjetivo{{$objetivo->id}}" data-toggle="modal"><i class="fas fa-pencil-alt" style="color: blue"></i></a>
                                                </div>
                                                <div style="text-align: center;width:50%;float: left;">
                                                    <a href="{{ route('inactivar.objetivo', $objetivo->id)}}"><i class="fas fa-trash-alt" style="color: red"></i></a>
                                                    
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
    <div class="modal fade" id="crearObjetivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Objetivo Estratégico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('crear.objetivo')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <span>Perspectiva :</span>
                                <select name="perspectiva" id="" class="form-control">
                                    <option value="Cliente">Cliente</option>
                                    <option value="Financiero">Financiero</option>
                                    <option value="Interno">Interno</option>
                                    <option value="Aprendizaje">Aprendizaje</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span>Objetivo Estratégico :</span>
                                <input type="text" name="objetivo" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span>Código :</span>
                                <input type="text" name="codigo" id="" class="form-control" required>
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

    @foreach ($objetivos as $objetivo)
        <!-- Modal -->
    <div class="modal fade" id="editarObjetivo{{$objetivo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Objetivo Estratégico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('editar.objetivo', $objetivo->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <span>Perspectiva :</span>
                                <select name="perspectiva" id="" class="form-control">
                                    <option value="{{$objetivo->perspectiva}}">{{$objetivo->perspectiva}}</option>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Financiero">Financiero</option>
                                    <option value="Interno">Interno</option>
                                    <option value="Aprendizaje">Aprendizaje</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span>Objetivo Estratégico :</span>
                                <input type="text" name="objetivo" id="" class="form-control" value="{{$objetivo->objetivo}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span>Código :</span>
                                <input type="text" name="codigo" id="" class="form-control" value="{{$objetivo->codigo}}" required>
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