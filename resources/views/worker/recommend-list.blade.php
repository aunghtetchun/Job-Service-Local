@extends('dashboard.author')

@section("title") Recommend List @endsection

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
                        <table class="table table-bordered table-responsive table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Recommend::where('worker_id',auth()->user()->id)->latest()->get() as $p)
                                <tr>
                                    <td>{{ $p->getUser->name }}</td>
                                    <!-- <td>{{\App\Custom::toShort(strip_tags(html_entity_decode($p->remarks)), 80) }}</td> -->
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="" class="btn ml-2  btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>
                                        </a>
                                    </td>
                                    <!-- <td>{{ $p->created_at->diffForHumans() }}</td> -->
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
