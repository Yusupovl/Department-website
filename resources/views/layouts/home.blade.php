<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="jq/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>AID website</title>
</head>

<body style="background-color:#c6edff;">


    <div class="container-expand">

        <header>

            <nav class="navbar ">
                <div class="container">
                    <a class="navbar-brand" href="https://ytit.uz/uz/">
                        <img src="/images/ytit_logo.png" alt="" width="80" height="80" class="d-inline-block align-text-center">
                        <span>YEOJU Technical Institute in Tashkent</span>
                    </a>
                    <a href="{{route('login')}}" class="btn btn-outline-primary">Log in</a>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg  navbar-name">
                <div class="container-fluid">
                    <a class="navbar-brand m-auto " href="#"><span>Applied Informatics Department</span></a>
                </div>
            </nav>

        </header>



        <div class="row mb-3">

            @yield('carusel')

        </div>



        <div class="row m-auto sticky-top ">

            <nav class="navbar navbar-expand-lg navbar-2 ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavDropdown">
                        <form action="{{route('home')}}" method="post" enctype="multipart/form">
                            @csrf
                            <ul class="navbar-nav m-auto">

                                <li class="nav-item dropdown ">
                                    <button type="submit" style="border:none;background-color:#0295da;color:white;font-size:32px;" value="home" name="name">HOME</button>
                                    <!-- <a class="nav-link menu_item mx-4" style="font-size:24px;" href="{{route('home')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        HOME
                                    </a> -->
                                </li>

                                <li class="nav-item dropdown ">
                                    <button type="submit" style="border:none;background-color:#0295da;color:white;font-size:32px;" value="xodim" name="name">STAFF</button>
                                    <!-- <a class="nav-link menu_item mx-4" style="font-size:24px;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ABOUT US
                                    </a> -->
                                </li>

                                <!-- <li class="nav-item dropdown ">
                                    <button type="submit" style="border:none;background-color:#0295da;color:white;font-size:32px;" value="talaba" name="name">STUDENT</button>
                                    <a class="nav-link menu_item mx-4" style="font-size:24px;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        ADMISSIONS
                                    </a> 
                                </li> -->

                                <li class="nav-item dropdown ">
                                    <button type="submit" style="border:none;background-color:#0295da;color:white;font-size:32px;" value="fan" name="name">SUBJECTS</button>
                                    <!-- <a class="nav-link menu_item mx-4" style="font-size:24px;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        PEOPLE
                                    </a> -->
                                </li>

                            </ul>
                        </form>
                    </div>
                </div>
            </nav>

        </div>


        <div class="container-fluid">
            <div class="row mb-3">

                @yield('news')

            </div>
        </div>

    </div>



    <div class="row navbar  footer p-3  ">

        <div class="col-3  d-flex align-items-center ">

            <ul class="">
                <li><a href="http://ytit.uz/uz/">YEOJU Technical Institute in Tashkent</a></li>
            </ul>

        </div>

        <div class="col-6">

        </div>

        <div class="col-3">

            <a href=""></a>

        </div>

    </div>

    </div>


</body>

</html>