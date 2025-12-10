<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Shop Pet')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .sidebar {
            background-color: #4caf50;
            color: white;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #45a049;
            padding-left: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .footer {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    @include('includes.header') <!-- Header -->

    <div class="d-flex">
        @include('includes.sidebar') <!-- Sidebar -->
        <div class="content w-100">
            @yield('content') <!-- Nội dung chính -->
        </div>
    </div>

    @include('includes.footer') <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
