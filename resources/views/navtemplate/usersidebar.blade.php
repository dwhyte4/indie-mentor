<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indie Mentor</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        //Code for the menu toggle function
            jQuery(document).ready(function($){
                $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                });
            })
        </script>
            <style>
                    body {
                        overflow-x: hidden;
                            }
                #sidebar-wrapper {
                    min-height: 100vh;
                    margin-left: -15rem;
                    -webkit-transition: margin .25s ease-out;
                    -moz-transition: margin .25s ease-out;
                    -o-transition: margin .25s ease-out;
                    transition: margin .25s ease-out;
                }
                #sidebar-wrapper .sidebar-heading {
                    padding: 0.875rem 1.25rem;
                    font-size: 1.2rem;
                }
                #sidebar-wrapper .list-group {
                    width: 15rem;
                }
                #page-content-wrapper {
                    min-width: 100vw;
                }
                #wrapper.toggled #sidebar-wrapper {
                    margin-left: 0;
                }
                @media (min-width: 768px) {
                    #sidebar-wrapper {
                        margin-left: 0;
                    }
                    #page-content-wrapper {
                        min-width: 0;
                        width: 100%;
                    }
                    #wrapper.toggled #sidebar-wrapper {
                        margin-left: -15rem;
                    }
                }
            </style>    
    </head>
    <body>
        <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="logo/Indie Mentor Logo Transparent.svg" alt="Indie Mentor Logo" width="160" height="80"/>
                </a>

                </div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Help Center</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Store</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Opportunities</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Marketing</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Indie Resources</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Socials</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Vendors</a>
                    </div>
            </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
            @section('content-container')
            <div id="page-content-wrapper">
                @section('topnav')
                    @include('navtemplate.nav')
                @show
                
                <div class="container-fluid">
                    @yield('content')
                    

                    
                    <!-- <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p> -->
                </div>
            </div>
            @show
        <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>