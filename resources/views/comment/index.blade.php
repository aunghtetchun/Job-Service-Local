@extends('dashboard.app')

@section("title") Recommend Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Recommend" => "#",
        "Recommend" => "#"
    ]])
        @slot("last") See Recommend @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Recommend @endslot
                @slot('button')
                    <a href="{{ route('recommend.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('recommend.destroy',$recommend->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button href="" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form>
                @endslot
                @slot('body')
                    <div class="card-body">
                        @isset($recommend)
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-12 col-md-6">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Worker Name</td>
                                            <td>{{ $recommend->getWorker->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Post Title</td>
                                            <td>{{ $recommend->getPost->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>User Name</td>
                                            <td>{{ $recommend->getUser->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Rating</td>
                                            <td>{{ $recommend->rating }}</td>
                                        </tr>
                                        <tr>
                                            <td>Recommend</td>
                                            <td>{{ $recommend->remarks }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5>{{ $recommend->getPost->title }}</h5>
                                    <hr/>
                                    <div class="d-flex flex-wrap">
                                        @foreach($recommend->getPost->getPhoto as $photo)
                                            <div class="col-6 p-2" style="width: 40px;">
                                                <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/post/".$photo->name) }}">
                                                    <img class="w-100" src="{{ asset("/storage/post/".$photo->name) }}" alt="" >
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
