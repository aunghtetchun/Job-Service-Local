
@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 d-flex flex-wrap justify-content-around align-items-center">
                    <div class="col-12 col-md-4 mt-2">
                        @foreach(App\Post::get() as $p)
                        <div class="card pbr my-2" >
                            <div class="card-body py-2">
                                <h5 class="card-title mb-0">{{$p->title}}</h5>
                                <small class="mb-2 text-muted">{{$p->getUser->name}} ( {{$p->created_at->diffForHumans()}} )</small>
                                <p class="card-text">{{$p->description}}</p>
                                @foreach($p->getPhoto as $photo)
                                <img src="{{asset('/storage/post/'.$photo->name)}}" alt="" class="w-100">
                                @endforeach
                                <div class="d-flex pt-2">
                                    <div class="col-6 text-center">
                                    <i class="far fa-thumbs-up"></i>  Like
                                    </div>
                                    <div class="col-6 text-center">
                                    <i class="far fa-comment-dots"></i>
                                        Comment
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection




