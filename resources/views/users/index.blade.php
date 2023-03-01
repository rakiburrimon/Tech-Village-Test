<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>TechVillage Test</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">User List</a>
                    </li>
                </ul>
            </div>

        </nav>
        <br>
        <br>
        <div class="container">
            <table class="table table-striped">
                <thead>
                <tr class="table-success">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>

                @php
                    $i=0
                @endphp
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
                </tbody>

            </table>

            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>

        </div>

  </body>
</html>
