<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>{{ $title }}</title>
    <meta name="keywords" content="{{ $meta }}">
    <meta name="author" content="Smarteye Technologies">
    <meta name="description" content="{{ $description }}">

    <?php if(!empty($image)): ?>
        <meta property="og:image" content="{{ asset($image) }}" />
        <meta name=”twitter:image” content="{{ asset($image) }}">
    <?php endif; ?>

    <meta property=og:url content="{{ url('/') }}">
    <meta property=og:type content="website">
    <meta property=og:sitename content="{{ config('app.name') }}">


    @viteReactRefresh
    @vite('resources/js/home.jsx')
    @stack('scripts')

  </head>
  <style>
    .support{
      position: fixed;
      right: 10px;
      bottom: 10px;
      background-color: green;
      color: #FFF;
      padding: 5px 12px;
      font-size: 1rem;
      font-weight: 700;
      border-radius: 10px;
     
  }
  .support a{
      color: #FFF;
  }
  </style>
  <body>

  <x-common.header />
    
  {{ $slot }}

  <x-common.footer />
  <x-common.login-alert />
    @stack('scripts')
    <div class="support">
        <a target="_blank" href="https://api.whatsapp.com/send/?phone=9384601434&text=Hey+I+Have+a+Question&type=phone_number&app_absent=0">
            <i class="bi fs-3 bi-whatsapp"></i>
        </a>
    </div>
  </body>
</html>