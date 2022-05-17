
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wordsmith Dashboard</title>
    <script src="https://unpkg.com/htmlincludejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.4.x/dist/typography.min.css"/>
    <style>[x-cloak]{ display:none }</style>
    @livewireStyles
</head>
<body class="h-full min-h-screen antialiased">

    <div class="flex justify-center w-full min-h-screen">

        @include('dashboard.sidebar')

        <div class="w-full ml-64 bg-gray-100">

            @yield('content')

        </div>
    </div>

    @include('dashboard.notifications')
    <script src="//unpkg.com/alpinejs" defer></script>
    @include('dashboard.js')
    @livewireScripts

    @if(session('notification'))
        <script>
            let notification_type = "{{ session('notification')['type'] }}"
            let notification_message = "{{ session('notification')['message'] }}"
            document.addEventListener("DOMContentLoaded", function() {
                notification.show(notification_type, notification_message);
            });
        </script>
    @endif
</body>
</html>
