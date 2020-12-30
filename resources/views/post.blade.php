<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-expand navbar-dark bg-danger">
        <a href="" class="navbar-brand">Hello</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link">Home</a></li>
            @auth
            <li class="nav-item"><a href="{{route('post.create')}}" class="nav-link">Insert</a></li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-dark">
                </form>
            @endauth

            @guest
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{route('register')}}" class="nav-link">create an aount</a></li>
           

            @endauth
           

        </ul>
        
    </nav>
   

 @yield('content')
     
 @show
</body>
</html>