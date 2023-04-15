<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>&ltWebsite Name&gt</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
        <!-- Font Awsome -->
        <script src="https://kit.fontawesome.com/be5a4db825.js" crossorigin="anonymous"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="/styles.css">
        <link rel="shortcut icon" href="#">
    </head>

    <body>
        <!-- navbar -->
        <nav class="navbar">
            <div class="navbar-center">
            <span class="nav-icon bars-icon">
                <i class="fas fa-bars"></i>
            </span>
            <div class="navbar-brand"><a class="navbar-brand" href="/">&lt W e b s i t e &emsp; N a m e &gt</a></div>
                <div class="cart-btn">
                    <span class="nav-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <div class="cart-items">0</div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end of nabar -->
    
        {{ $slot }}

        <!-- app js -->
        <script src="/app.js"></script>
    </body>

</html>
