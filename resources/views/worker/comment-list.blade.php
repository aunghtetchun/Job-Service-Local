@extends('dashboard.author')

@section("title") Comment List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Comment List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Comment List @endslot
                @slot('button')

                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col" style="min-width:100px;">Post Title</th>
                                <th scope="col" style="min-width: 100px;">Comment</th>
                                <th scope="col" style="width: 100px;">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Comment::where('worker_id',auth()->user()->id)->latest()->get() as $p)
                                <tr>
                                    <td>{{ $p->getUser->name }}</td>
                                    <td>{{ $p->getPost->title }}</td>
                                    {{-- {{$p->comment}} --}}
                                    <td>{{\App\Custom::toShort($p->comment, 157) }}</td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="" class="btn ml-2 py-2 btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>&nbsp; View Comment
                                        </a>
                                        <a href="{{ route('worker.showPost',$p->id) }}" class="btn ml-2 py-2 btn-outline-info btn-sm">
                                            <i class="feather-eye"></i>&nbsp; View Post
                                        </a>
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
        $(".table").dataTable({
            "order": [[0, "desc" ]]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
    </script>
@endsection
