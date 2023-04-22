<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vue js Learning Third</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <style>
            td{      
                padding: 10px;
                text-align: center;   
            }
            th{
                padding: 10px;
                text-align: center;
            }
            tr{
                padding: 10px;
                text-align: center;
                background-color: #eee;
            }            
            table{
                width: 60%;                  
                margin: 0px auto;
            }
            thead{
                background-color: #036bfc;
            }
            form{
                width: 60%;                  
                margin: 0px auto;
                margin-top: 20px;
            }
        </style>
                
    </head>
    <body class="font-sans antialiased" style="background-color: white !important;">
        <div class="min-h-screen bg-zinc-500">
           
            <!-- Page Content -->
            <div>
                <div id="app">
                    <Third></Third>
                </div>                
            </div>
        </div>       


        <!-- Scripts -->        
        <script src="https://unpkg.com/vue@3"></script>
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="{{ asset('js/common-front.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>       
              
    </body>
</html>
