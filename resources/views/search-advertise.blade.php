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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

        <!-- Styles -->
        
    </head>
    <body>
        
       <a href="{{url('advertise-list')}}">Back to Advertise search</a> 

       <h2>Advertise List</h2>
       <div style="margin-top: 30px;">    
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
        </div>
        
    </body>
</html>
