@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Recommend List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Recommend List @endslot
                @slot('button')

                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Worker Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Recommend</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recommends as $rec)
                                <tr>
                                    <th scope="row">{{ $rec->id }}</th>
                                    <td>{{ $rec->getWorker->name }}</td>
                                    <td>{{ $rec->getUser->name }}</td>
                                    <td>{{ $rec->rating }} *</td>
                                    <td>{{\App\Custom::toShort(strip_tags(html_entity_decode($rec->remarks)),30) }}</td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <form action="{{ route('recommend.destroy',$rec->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('recommend.show',$rec->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>
                                        </a>
                                    </td>
                                    <td>{{ $rec->created_at }}</td>
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
