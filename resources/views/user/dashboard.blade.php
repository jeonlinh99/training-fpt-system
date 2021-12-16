<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT training</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Roboto:ital,wght@0,500;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('PHP2/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="icon" sizes="16x16" href="{{ asset('PHP2/Asset/fpt.png')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('css')
</head>

<body class="container-fluid">
    @include('user.partial.header')
    <div class="content">
        @yield('content')
    </div>
    @include('user.partial.footer')



    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function search_course(){
            var url = $('.input_search').data('url');
            var key_word = $('.input_search').val();
            $.ajax({
                url:url,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:"POST",
                data:{
                    key_word:key_word
                },
                success:function(data){
                    $('.content').html(data)
                }
            })
            
        }
        function search_option(){
            var url = $('.url-option_search').data('url');
            var key_word = $(this).val();
            $.ajax({
                url:url,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:"POST",
                data:{
                    key_word:key_word
                },
                success:function(data){
                    $('.content').html(data)
                }
            })
            
        }
        function search_dropdown(){
            var url = $('.button_search').data('url');
            var key_word = $('.input_search').val();
            $.ajax({
                url:url,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:"POST",
                data:{
                    key_word:key_word
                },
                success:function(data){
                    $('.option_search').html(data)
                }
            })
        }
        
        $(function(){
            $(document).on('keyup','.input_search',search_course)
            $(document).on('click','.button_search',search_course)
            $(document).on('keyup','.input_search',search_dropdown)
            $(document).on('click','.input_search',search_dropdown)
            $(document).on('click','.item-option_search',search_option)
        })
    </script>
</body>
</html>
