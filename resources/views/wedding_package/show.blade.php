@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Golf Event" => "#",
        "Golf Event" => "#"
    ]])
        @slot("last") See Golf Events @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Golf Events @endslot
                @slot('button')
                    <a href="{{ route('wedding_package.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                        <a href="{{ route('wedding_package.edit',$weddingPackage->id) }}" class="btn  btn-outline-warning btn-sm">
                            <i class="fa-fw feather-edit"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('wedding_package.destroy',$weddingPackage->id) }}"  method="post">
                            @csrf
                            @method("DELETE")
                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                <i class="fa-fw feather-trash-2"></i>
                            </button>
                        </form>
                @endslot
                @slot('body')
                    <div class="card-body">
                        @isset($weddingPackage)
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-12 col-md-6">
                                    <h5>{{ $weddingPackage->title }} ( <small>{{ $weddingPackage->price }} Ks</small> )</h5>
                                    <hr/>
                                    <h6>Start : {{ $weddingPackage->start }}</h4>
                                    <h6 class="mb-3">Start : {{ $weddingPackage->end }}</h4>

                                    <div>{!! $weddingPackage->description !!} </div>
                                </div>
                                <div class="col-12 col-md-6">

                                    <div class="d-flex flex-wrap">
                                        @foreach($weddingPackage->getPhoto as $photo)
                                            <div class="col-6 p-2" style="width: 40px;">
                                                <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/wedding_package/".$photo->name) }}">
                                                    <img class="w-100" src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" >
                                                </a>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
