<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="min-h-screen">
    <div class="bg-blue-600 text-white p-4">
        <h1 class="text-lg font-semibold">Staff Dashboard</h1>
    </div>

    <div class="p-6">
        @yield('content')
    </div>
</div>
</body>
</html>
