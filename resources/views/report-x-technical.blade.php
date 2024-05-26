@extends('base-app')

@section('content-wrapper')

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDda2eiq82IeDGkGOti_iH30RIdjonFI9U&callback=initializeMap">
    </script>

<h4>Reporte X Tecnico</h4>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('errors')
        </div>
        
        <div class="col-12">
            <form action="{{route('by-technical')}}" method="GET">
                <div class="row">
                    <div class="col-3">
                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                            <input type="text" id="filter-date" name="filter-date" class="form-control" value="{{$dateFilter}}">
                            <span class="input-group-text input-group-addon" id="addon-wrapping"><i class='bx bxs-calendar'></i></span>
                        </div>  
                    </div>
                    <div class="col-3">
                        <select class="form-select" id="technical" name="technical" >
                            @foreach ($technicals as $technical)
                            <option @if ($technical->id == $userid) selected @endif value="{{$technical->id}}" >{{$technical->getFullName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-info" href="{{route('by-technical-csv', ['filter_date' => $dateFilter, 'technical' => $userid])}}" target="_blank">Descargar</a>
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
        <div class="col-12">
            <div id="map">

            </div>
        </div>
    </div>
</div>

<script>
    var MapPoints = '{!! $locations !!}';
    function initializeMap() {
        if (jQuery('#map').length > 0) {
            var locations = jQuery.parseJSON(MapPoints);
            console.log(locations);
            window.map = new google.maps.Map(document.getElementById('map'), {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            });
            var infowindow = new google.maps.InfoWindow();
            var flightPlanCoordinates = [];
            var bounds = new google.maps.LatLngBounds();

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                    map: map
                });
                flightPlanCoordinates.push(marker.getPosition());
                bounds.extend(marker.position);

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i]['location_time']);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

            map.fitBounds(bounds);
            var flightPath = new google.maps.Polyline({
                map: map,
                path: flightPlanCoordinates,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

        }
    }
 </script>

@endsection