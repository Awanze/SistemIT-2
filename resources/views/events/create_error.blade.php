<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Laravel Event Calendar</title>
    </head>
    <body>

        <!-- navigation goes here -->

        <div class="container">
         <div class="row col-md-8 col-md-offset-2 error">
             <h3>There was a problem saving the event to the database.</h3>
         </div>
         
         <hr />
     </div>

        <!-- javacript here -->
<!-- Scripts -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

    </body>
</html>