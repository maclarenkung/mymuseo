@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" type="text/css" href="/font/flaticon.css" />

  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/8f9e6c018f.js" crossorigin="anonymous"></script>

</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
   <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>
</body>
</html>
