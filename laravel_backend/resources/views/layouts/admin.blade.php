<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper {
            flex: 1;
            /* Đẩy footer xuống cuối */
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            min-height: 100vh;
            color: white;
            position: fixed;
        }

        .sidebar h4 {
            text-align: center;
            padding: 15px 0;
            background-color: #212529;
            margin: 0;
        }

        .sidebar .nav-link {
            color: white;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        footer {
            background-color: #f8f9fa;
            color: #6c757d;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
            /* Đẩy footer xuống cuối */
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('includes.header')

    <!-- Wrapper cho nội dung chính và sidebar -->
    <div class="wrapper">
        <!-- Include sidebar -->
        @include('includes.sidebar')

        <!-- Main content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Include footer -->
    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
