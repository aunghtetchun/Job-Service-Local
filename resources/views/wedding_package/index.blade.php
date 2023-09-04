@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Gold Event List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Gold Event List @endslot
                @slot('button')
                    <a href="{{ route('wedding_package.create') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Description</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wedding_packages as $wp)
                                <tr>
                                    <th scope="row">{{ $wp->id }}</th>
                                    <td>{{ $wp->title }}</td>
                                    <td>{{ $wp->price }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap">
                                            @foreach($wp->getPhoto as $photo)
                                            <div class="col-6 p-0 pl-1 mb-1" style="width: 20px;">
                                                <img class="w-100" src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" >
                                            </div>
                                            @endforeach
                                        </div>

                                    </td>
                                    <td>{{\App\Custom::toShort(strip_tags(html_entity_decode($wp->description)),40) }}</td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="{{ route('wedding_package.edit',$wp->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <form action="{{ route('wedding_package.destroy',$wp->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('wedding_package.show',$wp->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>
                                        </a>
                                    </td>
                                    <td>{{ $wp->created_at }}</td>
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
