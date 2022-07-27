<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>

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

        <a href="{{url('add-advertise')}}">Back to Add Advertise</a> 
        
            <div class="row" style="margin-top: 20px;">
            <form role="form" action="{{ url('advertise/search') }}" method="POST" id="advertise_search" class="wrap">
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
                                                <label for="dept">Enter Location <span class="required">*</span>:</label>
                                                <div class="error_message">
                                                    <input id="searchTextField" name="location" type="text" size="50" placeholder="Enter a location" autocomplete="on" runat="server" />  
                                                    <input type="hidden" id="city2" name="city2" />
                                                    <input type="hidden" id="cityLat" name="cityLat" />
                                                    <input type="hidden" id="cityLng" name="cityLng" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="dept">Enter Radius <span class="required">*</span>:</label>
                                                <div class="error_message">
                                                <input type="text" name="radius" tabindex=2
                                                       class="form-control alphaonly name_input"
                                                       id="radius" value="{{old('radius')}}" placeholder="Enter Radius">
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" align="center">
                                        <div class="col-lg-1 col-md-6 col-sm-12 col-xs-12 ml-3 mt-3">
                                            <button type="submit" id="submit" class="btn btn-primary btn-submit">
                                                Search
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


        @if(isset($advertiseList))
        <table border="1">
            <thead>
                <tr>
                    <td>Advertise Name</td>
                    <td>Advertise Distance</td>
                </tr>
            </thead>
            <tbody>
                @foreach($advertiseList as $key => $advertise)
                <tr>
                    <td>{{ $advertise['advertise_name'] }}</td>
                    <td>{{ $advertise['advertise_distance'] }}</td>
                </tr>
                @endforeach 
            </tbody>
        </table>
            
        @endif
        

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeEgQJCMYD2-w6Y5HKskCZ64b4ANXpDqY&libraries=places"></script>
    <script>

        $(document).ready(function () {
         
        $('#advertise_search').validate({
            rules: {
                location: {
                    required: true
                },
                radius: {
                    required: true
                }

            },
            messages: {
                location: {
                    required: "Please Enter Location."
                },
                radius: {
                    required: "Please Enter Radius.",
                }

            },

        });

    });


        function initialize() {
          var input = document.getElementById('searchTextField');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


    
    
    </body>
</html>
