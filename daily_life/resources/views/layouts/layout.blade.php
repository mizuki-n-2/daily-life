<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <script src="https://kit.fontawesome.com/b9899ca194.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="flex body">
    <div class="left">
      @component('components.sidenav')     
      @endcomponent
    </div>
    <div class="right">
      @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
      @endif
      @yield('main')
    </div>
  </div>
  <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>