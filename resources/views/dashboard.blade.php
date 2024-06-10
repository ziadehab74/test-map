<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        nav {
            text-align: center;
            margin-top: 20px;
            background-color: #fff;
            padding: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            margin: 0 15px;
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #343a40;
        }

        section {
            background-color: #fff;
            border-radius: 8px;
            margin-top: 20px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.6;
            color: #495057;
        }
    </style>
</head>

<body>
    <header>
        <h2>Welcome to our Website</h2>
    </header>

    <nav>
        <a href="#">Session Countdown</a>
        <a href="#">Real-time Messages</a>
        <a href="#">Online Users</a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            style="float: right; color: #dc3545;">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>


    <div class="container">
        <section>
            {{-- <h2>CTA</h2> --}}
            <h1>Demo and test for <u>CTA</u></h1>
        </section>

        <section>
            <livewire:countDown />
            <livewire:RealtimeMessage />
            <livewire:UsersStatus />

        </section>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let countdownValue = {{config('session.lifetime') * 60}};

        function updateCountdown() {
            countdownValue--;

            document.getElementById('countdown').innerText = countdownValue + ' seconds';

            if (countdownValue <= 0) {
                clearInterval(intervalId); // Stop the countdown
                document.getElementById('countdown').innerText = 'Countdown finished';
                    window.location.href = '/session-expired';
                }
        }

        updateCountdown();

        let intervalId = setInterval(updateCountdown, 1000);

    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>
