@extends('layouts.main')
@section('metodosjs')

@endsection
@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-10">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Costos</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Costos</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{url('costo-orden/nuevo')}}" class="btn btn-primary btn-sm  float-right">Nuevo Costo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] start -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="row">
                                <!-- [ Tabla Categorias ] start -->
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Lista de Costos</h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr class="text-center">
                                                        <th>ID</th>
                                                        <th># ORDEN</th>
                                                        <th>COSTO ID</th>
                                                        <th>CANTIDAD</th>
                                                        <th>COSTO UNITARIO</th>
                                                        <th>ESTADO</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($costoOrden as $key => $co)
                                                        <tr class="unread">
                                                            <td class="dt-center">{{ $key+1 }}</td>
                                                            <td class="dt-center">{{ $co->numOrden }}</td>
                                                            <td class="dt-center">{{ $co->costo_id }}</td>
                                                            <td class="dt-center">{{ $co->cantidad }}</td>
                                                            <td class="dt-center">{{ $co->costo_unitario }}</td>
                                                            <td class="dt-center">
                                                                @if ( $co->estado )
                                                                    <span class="badge badge-success">Activo</span>
                                                                @else
                                                                    <span class="badge badge-danger">Inactivo</span>
                                                                @endif
                                                            </td>
                                                            <td class="dt-center">
                                                                <a href="#!" onclick="deleteCostoOrden({{$co->id}})"><i class="feather icon-x-circle text-c-red f-30 m-r-10"></i></a>
                                                                <a href="costo-orden/editar/{{ $co->id }}"><i class="feather icon-edit text-c-blue f-30 m-r-10"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Tabla Categorias ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection
