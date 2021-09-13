<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 7 CRUD Example</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- Styles -->
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script>
    $(function() {
        $('.alert-success').fadeOut(10000);
        $('.alert-danger').fadeOut(10000);
    });
    </script>
</body>
</html>
