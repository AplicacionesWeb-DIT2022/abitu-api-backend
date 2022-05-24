@extends('layouts.admin')

@section('title')
    <span>Alumnos</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createModal">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('content')
    @include('alumnos.modals.create')
    @include('alumnos.modals.update')
    <div class="card">
        <div class="card-body">
            <table id="dt-products" class="table table-striped table-bordered dts">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">DNI</th>
                    <th class="text-center">Edad</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr class="text-center">
                            <td>{{$alumno->nombre}}</td>
                            <td>{{$alumno->apellido}}</td>
                            <td>{{$alumno->dni}}</td>
                            <td>{{$alumno->edad}}</td>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editModal" onclick="editAlumno({{$alumno}})">
                                    <i class="far fa-edit"></i>
                                </a>

                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteModal">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        function editAlumno(alumno){
            $("#editAlumnoForm").attr('action',`/alumnos/${alumno.id}`);
            $("#editAlumnoForm #nombre").val(alumno.nombre);
            $("#editAlumnoForm #apellido").val(alumno.apellido);
            $("#editAlumnoForm #dni").val(alumno.dni);
            $("#editAlumnoForm #edad").val(alumno.edad);
        }
    </script>

    @if(!$errors->isEmpty())
        @if($errors->has('post'))
            <script>
                $(function () {
                    $('#createModal').modal('show');
                });
            </script>
        @else
            <script>
                $(function () {
                    $('#editModal').modal('show');
                });
            </script>
        @endif
    @endif
@endpush