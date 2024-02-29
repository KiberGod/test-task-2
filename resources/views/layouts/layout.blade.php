<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test task2</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-2"><h5><a href="/dashboard" class="card-link">Dashboard</a></h5></div>
        <div class="col-5"><h5><a href="/tasks" class="card-link">Список моїх задач</a></h5></div>
    </div>
    <br>
    @yield('content')
</div>

</body>
</html>
