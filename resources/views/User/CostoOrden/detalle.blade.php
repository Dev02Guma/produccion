@extends('layouts.main')
@section('metodosjs')
@include('jsViews.js_costo_orden')
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
                                        <h5 class="m-b-10">Lista Costos por Orden</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home"><i class="feather icon-home"></i></a>
                                        </li>
                                    <!--<li class="breadcrumb-item"><a href="{{url('/home')}}">Inicio</a></li>-->
                                        <li class="breadcrumb-item"><a href="{{url('/costo-orden')}}">Lista de
                                                ordenes</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:"> Lista de Costos por Orden</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{url('costo-orden/nuevo')}}" class="btn btn-primary btn-sm  float-right">Nuevo
                                        Costo</a>
                                </div>
                            <!--<ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('/costo-orden')}}">Lista de ordenes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:"> Lista de Costos por Orden</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('costo-orden/nuevo')}}" class="btn btn-primary btn-sm float-right">Nuevo
                                    Costo</a>
                            </div>-->
                        </div>
                    </div>
                </div>
                <input type="hidden" value="">
                <!-- [ breadcrumb ] start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <!-- [ Tabla Categorias ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Lista de Costos por Orden</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="text-center">

                                                        <th>ID</th>
                                                        <th>DESCRIPCION</th>
                                                        <th>UNIDAD DE MEDIDA</th>
                                                        <th>CANTIDAD</th>
                                                        <th>COSTO UNITARIO</th>

                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($costoOrden as $key => $co)
                                                    <tr class="unread">
                                                        <td class="dt-center">{{ $co['numOrden'] }}</td>
                                                        <td class="dt-center">{{ $co['costo_id'] }}</td>
                                                        <td class="dt-center">{{ $co['cantidad'] }}</td>
                                                        <td class="dt-center">{{ $co['costo_unitario'] }}</td>
                                                        <td class="dt-center">
                                                            @if ( $co['estado'] )
                                                            <span class="badge badge-success">Activo</span>
                                                            @else
                                                            <span class="badge badge-danger">Inactivo</span>
                                                            @endif
                                                        </td>
                                                        <td class="dt-center">
                                                            <a href="#!" onclick="deleteCostoOrden()"><i class="feather icon-x-circle text-c-red f-30 m-r-10"></i></a>
                                                            <a href="editar/{{ $co['id'] }}" target="_blank">
                                                                <i class="feather icon-edit text-c-blue f-30 m-r-10"></i>
                                                            </a>
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
                        <div class="row">
                            <!-- [ Tabla Categorias ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>HORAS PRODUCTIVAS</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dtHrsProd">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th></th>
                                                        <th>MAQUINA</th>
                                                        <th>HORAS JORNADAS</th>
                                                        <th>HORAS LABORALES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ordenes as $key => $op)
                                                    <input class="input-dt text-left" name="codigo" type="text" id="numOrden" value="{{$op['numOrden'] }}">
                                                    @if(is_null($op->horaJY1))
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td><input class="input-dt text-left" type="text" value="YANKEE 1" placeholder="maquina" id=""></td>
                                                        <td><input class="input-dt text-left" type="text" placeholder="horas" id="horaJY1"></td>
                                                        <td><input class="input-dt text-left" type="text" placeholder="horas" id="horaLY1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="input-dt text-left" type="text" value="YANKEE 2" placeholder="maquina" id=""></td>
                                                        <td><input class="input-dt text-left" type="text" placeholder="horas" id="horaJY2"></td>
                                                        <td><input class="input-dt text-left" type="text" placeholder="horas" id="horaLY2"></td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="input-dt text-left" type="text" value="YANKEE 1" placeholder="maquina" id="1"></td>
                                                        <td><input class="input-dt text-left" type="text" value="{{ $op->horaJY1 }}" placeholder="horas" id="horaJY1"></td>
                                                        <td><input class="input-dt text-left" type="text" value="{{ $op->horaLY1 }}" placeholder="horas" id="horaLY1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="input-dt text-left" type="text" value="YANKEE 2" placeholder="maquina" id="2"></td>
                                                        <td><input class="input-dt text-left" type="text" value="{{ $op->horaJY2 }}" placeholder="horas" id="horaJY2"></td>
                                                        <td><input class="input-dt text-left" type="text" value="{{ $op->horaLY2 }}" placeholder="horas" id="horaLY2"></td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button class="btn btn-primary add-row-dt-hp float-right" id="btnguardar">
                                            Guardar
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <!-- [ Tabla Categorias ] end -->
                        </div>
                        <div class="row">
                            <!-- [ Tabla Categorias ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>OBSERVACIONES</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <form method="post" action="{{ url('costo-orden/add-comment')}}">
                                            {{ csrf_field() }}
                                            @foreach ($ordenes as $key => $opc)
                                            <input class="input-dt text-left" type="hidden" name="Orden" id="Orden" value="{{ $op->numOrden }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if(is_null($opc->comentario))
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Ingrese su comentario" name="comentario" id="comentario" rows="4"></textarea>
                                                    </div>
                                                    @else
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Ingrese su comentario" name="comentario" id="comentario" rows="4">{{ $opc->comentario }}</textarea>
                                                    </div>
                                                </div>
                                                @endif
                                                <button class="btn btn-primary add-row-dt-hp float-right" id="btnguardar-comment" type="submit">
                                                    Guardar
                                                </button>
                                            </div>
                                            @endforeach
                                        </form>
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
