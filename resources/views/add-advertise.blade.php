<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

        <!-- Styles -->

        <style type="text/css">
            .error{
                color:red;
            }
        </style>
        
    </head>
    <body>

        @if(session()->has('success'))
        <div class="alert alert-success" style="color:green;">
            {{ session()->get('success') }}
        </div>
    @endif
        
            <div class="row">
            <form role="form" action="{{ url('advertise/add') }}" method="POST" id="add_advertise" class="wrap">
                @csrf
                <input type="hidden" name="advertise_latitude" id="advertise_latitude" value="">
                <input type="hidden" name="advertise_longitude" id="advertise_longitude" value="">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                </div>
                <fieldset class="todos_labels">
                    <div id="dynamic_field">
                        <div class="col-md-12">
                            <div class="box box-primary">

                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="dept">Advertise Name <span class="required">*</span>:</label>
                                                <div class="error_message">
                                                    <input type="text" name="advertise_name" tabindex=2
                                                           class="form-control alphaonly name_input"
                                                           id="advertise_name" value="{{old('advertise_name')}}" placeholder="Enter Advertise Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div id="map" style="width: 800px; height: 500px;"></div>
                                                <div id="current"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" align="center">
                                        <div class="col-lg-1 col-md-6 col-sm-12 col-xs-12 ml-3 mt-3">
                                            <button type="submit" id="submit" class="btn btn-primary btn-submit">
                                                Save
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
 
        </div>
        

        <script type="text/javascript">

        $(document).ready(function () {
         
        $('#add_advertise').validate({
            rules: {
                
                advertise_name: {
                    required: true
                }

            },
            messages: {
                advertise_name: {
                    required: "Please Enter Advertise Name.",
                }

            },

        });

    });

    function initMap() {
    const myLatLng = { lat: 23.0260736, lng: 72.5024768 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 6,
        center: myLatLng,
    });

    var myMarker = new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello",
        draggable: true
    });

    document.getElementById('advertise_latitude').value = myLatLng.lat;
    document.getElementById('advertise_longitude').value = myLatLng.lng;

    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    document.getElementById('advertise_latitude').value = evt.latLng.lat().toFixed(3);
    document.getElementById('advertise_longitude').value = evt.latLng.lng().toFixed(3);
});

google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
    // document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
});

map.setCenter(myMarker.position);
myMarker.setMap(map);

}
  
window.initMap = initMap;
</script>
  
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeEgQJCMYD2-w6Y5HKskCZ64b4ANXpDqY&callback=initMap"></script>

    </body>
</html>
