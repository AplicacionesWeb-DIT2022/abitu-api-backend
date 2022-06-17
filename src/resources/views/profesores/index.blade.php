@extends('layouts.admin')

@section('title')
    <span>Profesores</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createModal">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('content')
    @include('profesores.modals.create')
    @include('profesores.modals.update')
    @include('profesores.modals.delete')
    <div class="card">
        <div class="card-body">
            <table id="dt-profesores" class="table table-striped table-bordered dts">
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
                @foreach($profesores as $profesor)
                    <tr class="text-center">
                        <td>{{$profesor->nombre}}</td>
                        <td>{{$profesor->apellido}}</td>
                        <td>{{$profesor->dni}}</td>
                        <td>{{$profesor->edad}}</td>
                        <td>
                            <a href="" class="edit-form-data" data-toggle="modal" data-target="#editModal" onclick="editProfesor({{$profesor}})">
                                <i class="far fa-edit"></i>
                            </a>

                            <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteModal" onclick="deleteProfesor({{$profesor}})">
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
        function editProfesor(profesor){
            $("#editProfesorForm").attr('action',`/profesores/${profesor.id}`);
            $("#editProfesorForm #nombre").val(profesor.nombre);
            $("#editProfesorForm #apellido").val(profesor.apellido);
        }

        function deleteProfesor(profesor) {
            $("#deleteProfesorForm").attr('action', `/profesores/${profesor.id}`);
            $("#profesor").text(`${profesor.nombre} ${profesor.apellido}`);
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