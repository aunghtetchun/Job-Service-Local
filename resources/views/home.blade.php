
@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
        <div class="col-12 p-0">
            <div class="overlay h-100" >
                <div class="mx-auto col-12 col-md-6 col-lg-6 d-flex flex-wrap h-100 align-items-center">
                        <h1 class="col-12 display-4 text-center mb-4">TZT</h1>
                        <h4 class="col-12 text-center mb-5">Your Golf Journey Awaits</h1>
                </div>
            </div>
            <div class="w-100" style="height: 75vh; background-image: url('{{asset('wedding/images/golf.jpg')}}'); background-size: cover; background-position: bottom">

            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center desc">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet iusto natus odit quasi quibusdam, saepe suscipit. Dolore eos, fuga iusto nam nulla officia, possimus provident, quae quia temporibus ut voluptatum?</p>
                    <a href="" class="btn btn-primary py-2 px-4">Go To Events</a>
                </div>

                <div class="col-12 d-py d-flex flex-wrap justify-content-around align-items-center">
                    <div class="col-12 col-md-4 mt-2">
                        <div class="card pbr" onclick="location.href='#'">
                            <div class="card-body">
                                <h5 class="card-title">Events</h5>
                                <p class="card-text">Lng elit. Debitis dicta dolore dolorem ea eaque eius enim exercitationem facilis id incidunt iste laudantium nemo quaerat recusandae sapiente similique voluptas, voluptate. Et. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-2">
                        <div class="card pbr" onclick="location.href='#'">
                            <div class="card-body">
                                <h5 class="card-title">Blog</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dicta dolore dolorem ea eaque eius enim exercitationem facilis id incidunt iste laudantium nemo quaerat recusandae sapiente similique voluptas, voluptate. Et. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-2">
                        <div class="card pbr" onclick="location.href='#'">
                            <div class="card-body">
                                <h5 class="card-title">Recommend Events</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dicta dolore dolorem ea eaque eius enim exercitationem facilis id incidunt iste laudantium nemo quaerat recusandae sapiente similique voluptas, voluptate. Et. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 d-py d-flex flex-wrap justify-content-around align-items-center">
                    <h1 class="text-center w-100 mb-5">Events Gallery</h1>
                    <div class="card-columns">
                        @foreach(\App\Photo::latest()->limit(15)->get() as $photo)
                            <a class="venobox" data-gall="aa"  href="{{ asset("/storage/wedding_package/".$photo->name) }}">
                                <img src="{{ asset("/storage/wedding_package/".$photo->name) }}" class="w-100 rounded mx-2 mb-3" alt="image alt"/>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 d-py d-flex flex-wrap justify-content-between align-items-center">
                    <h1 class="text-center w-100 mb-5">User Recommends</h1>
                    <div class="col-12 col-md-5 ">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, cumque dolore doloremque expedita explicabo facilis in magni nisi odit officiis perferendis praesentium quia rem reprehenderit sunt temporibus vel velit voluptate?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consequatur, cum earum esse nemo porro saepe vel? Consequuntur eaque incidunt ipsum labore, laudantium odio placeat, quidem rerum sint sit voluptates?
                        </p>
                        <a href="#" class="btn px-3 btn-primary">Go To Recommend</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach(\App\Recommend::latest()->limit(4)->get() as $rec)
                                    <div class="carousel-item text-center @if ($loop->first) active @endif" >
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $rec->name }}</h5>
                                            <p class="card-text">
                                                {{ $rec->text }}
                                            </p>
                                            <div class="">
                                                @for($i=1; $i<$rec->rating; $i++)
                                                    <i class="fas fa-star fa-fw"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection




