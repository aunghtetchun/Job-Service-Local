<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, wedding-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('wedding/vendor/feather-icons-web/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/animate_it/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/data_table/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/css/kyalphyu.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/venobox/venobox.css') }}">
    <link href="{{ asset('dashboard/vendor/select_2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">


    @yield('head')

</head>

<body>

    <div class="container-fluid" style="background:  #f7efe9">
        <div class="row justify-content-center" style="min-height: 100vh">
            {{-- <div class="col-12 p-0 position-sticky bg-primary" style=" top: 0; z-index: 16">
            <div class="container ">
                <div class="row">
                    <div class="col-12 p-0 ">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
                            <a class="navbar-brand" href="#"> TZT</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto ">
                                    <li class="nav-item px-3 ">
                                        <a class="nav-link" href="{{ asset('/') }}"><i class="fas fa-home fa-fw"></i> Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item px-3 ">
                                        <a class="nav-link " href=""><i class="fas fa-layer-group fa-fw"></i> Events</a>
                                    </li>
                                    <li class="nav-item px-3 ">
                                        <a class="nav-link" href=""><i class="fab fa-blogger"></i> Blog</a>
                                    </li>
                                    <li class="nav-item px-3 ">
                                        <a class="nav-link" href=""><i class="fas fa-star fa-fw"></i> Recommend</a>
                                    </li>


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}
            @yield('content')
            {{-- <div class="container">
            <div class="row">
                <div class="col-12 pt-5 mt-5 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="col-12 col-md-6 pb-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d349.4830389957969!2d96.1806267565227!3d16.813295455898317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eccea03181a5%3A0xf9ad3b70b9ebbe41!2sAung%20See%20Zain%20Tea%20%26%20Food%20Centre!5e0!3m2!1sen!2smm!4v1609059843081!5m2!1sen!2smm" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-12 col-md-5">
                        <h3>Get in touch</h3>
                        <p class="mb-2">
                            Address : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus assumenda, beatae blanditiis commodi culpa cum dolore esse est impedit incidunt iusto labore molestiae nam optio perferendis repellendus sequi voluptas.
                        </p>
                        <!--<p class="my-2"> New York City,USA</p>-->
                        <p class="">Phone : 09678456745</p>
                        <p class="">Mail :
                            <a class="" href="mailto:info@brainboxacumen.edu.mm">
                                testing@gmail.com
                            </a>
                        </p>
                        <h5>Connect with us?</h5>
                        <div class="mt-2">
                            <i class="fab fa-facebook fa-fw "></i> Facebook
                            <i class="fab fa-twitter fa-fw"></i> Twitter
                            <i class="fab fa-instagram fa-fw"></i> Instagram
                            <i class="fab fa-pinterest fa-fw"></i> Pinterest
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('wedding/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('wedding/js/bootstrap.js') }}"></script>
    <script src="{{ asset('wedding/vendor/data_table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('wedding/vendor/data_table/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('wedding/vendor/venobox/venobox.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
        "></script>
    <script src="{{ asset('dashboard/vendor/select_2/dist/js/select2.min.js') }}"></script>

    <script src="{{ asset('wedding/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.venobox').venobox({ // default: ''
                frameheight: '600px', // default: ''
                bgcolor: '#5dff5e', // default: '#fff'
                titleattr: 'data-title', // default: 'title'
                numeratio: true, // default: false
                infinigall: true, // default: false
            });
            $('.select2').select2();
        });
    </script>
    @yield('foot')
</body>

</html>
