@extends('dashboard.author')

@section("title") Post List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Post List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Post List @endslot
                @slot('button')
                    <a href="{{ route('worker.createPost') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-responsive table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <!-- <th scope="col">Description</th> -->
                                <!-- <th scope="col">Comment</th> -->
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Post::where('worker_id',auth()->user()->id)->latest()->get() as $p)
                                <tr>
                                    <td>{{ $p->title }}</td>
                                    <!-- <td>{{\App\Custom::toShort(strip_tags(html_entity_decode($p->description)),40) }}</td>
                                    <td>{{ App\Comment::where('post_id',$p->id)->count() }} comments</td> -->
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="{{ route('worker.showPost',$p->id) }}" class="btn mr-2 btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>
                                        </a>
                                        @if($p->status == 'waiting')
                                            <a href="{{ route('worker.editPost',$p->id) }}" class="btn  btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $p->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section("foot")
    <script>
        $('.table').dataTable();
        $('.table').destroy();
        $(".table").dataTable({
            "order": [[0, "desc" ]]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
    </script>
@endsection
