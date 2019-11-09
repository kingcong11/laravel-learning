<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title', 'Balagaboom') </title>
</head>
<body>
    
    <u>
        <li>
            <a href="/contact">Contact Us</a>
        </li>
        <li>
            <a href="/about">About</a>
        </li>
        <li>
            <a href="/projects">Projects</a>
        </li>                
        <li>
            <a href="/">Home</a>
        </li>
    </u>

    @yield('content')
    
</body>
</html>