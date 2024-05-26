@extends('base-app')

@section('content-wrapper')
<h4>Reporte X Dia</h4>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('errors')
        </div>
        
        <div class="col-12">
            <form action="{{route('journeys-x-day')}}" method="GET">
                <div class="row">
                    <div class="col-3">
                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                            <input type="text" id="filter-date" name="filter-date" class="form-control" value="{{$dateFilter}}">
                            <span class="input-group-text input-group-addon" id="addon-wrapping"><i class='bx bxs-calendar'></i></span>
                        </div>  
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-info" href="{{route('journeys-x-day-csv', ['filter_date' => $dateFilter])}}" target="_blank">Descargar</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Tecnico</th>
                        <th>Inicio Jornada</th>
                        <th>Fin Jornada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journeys as $journey)
                    <tr>
                        <td> {{$journey->id}}</td>
                        <td> {{$journey->technical->getFullName()}}</td>
                        <td> {{$journey->start_at}}</td>
                        <td> {{$journey->end_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $journeys->links() }}
        </div>
    </div>
</div>
@endsection