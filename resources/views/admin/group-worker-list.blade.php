@extends('dashboard.app')

@section('title')
    TZT
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Group Worker List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Group Worker List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">City & Location</th>
                                    <th scope="col">Work Type</th>
                                    <th scope="col">Post Count</th>
                                    <th scope="col">အဖွဲ့ဝင်</th>
                                    {{-- <th scope="col">Id Card</th> --}}
                                    <th scope="col">Actions</th>
                                    <th scope="col">Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workers as $wp)
                                    <tr>
                                        <td>{{ $wp->name }}

                                        </td>
                                        <td>
                                            <div class="">
                                                @if (is_numeric($wp->city ))
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->city }}</span>
                                                @else
                                                    <span class="badge badge-secondary p-2 mr-1">{{ $wp->getCity->name }}</span>
                                                @endif
                                                @if (is_numeric($wp->location))
                                                    <span class="badge badge-success p-2 mr-1">{{ $wp->getLocation->name }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->location }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                @if (is_numeric($wp->work))
                                                    <span class="badge badge-secondary p-2 mr-1">{{ $wp->getWork->name }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->work }}</span>
                                                @endif
                                                @if (is_numeric($wp->job))
                                                    <span class="badge badge-success p-2 mr-1">{{ $wp->getJob->name }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->job }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge p-2 ml-auto  badge-info ">
                                                {{ \App\Post::where('worker_id', $wp->id)->count() }} posts
                                            </span>
                                        </td>
                                        <td>
                                            {{ $wp->count }} ယောက်
                                        </td>
                                        {{-- <td>{{ $wp->card }}</td> --}}
                                        <td class="control-group d-flex justify-content-start"
                                            style="vertical-align: middle; text-align: center">

                                            {{-- <a href="{{ route('worker.edit', $wp->id) }}"
                                                class="btn mr-1 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>

                                            <a href="{{ route('worker.show', $wp->id) }}"
                                                class="btn ml-1 btn-outline-success btn-sm">
                                                <i class="feather-eye"></i>
                                            </a> --}}
                                            <a onClick="return confirm('Are you sure you want to ban?')"
                                                href="{{ route('user.banWorker', $wp->id) }}"
                                                class="btn ml-1 btn-outline-danger btn-sm">
                                                Ban <i class="fas fa-user-lock"></i>
                                            </a>
                                            <a onClick="return confirm('Are you sure you want to ban?')"
                                                href="{{ route('user.banWorker', $wp->id) }}"
                                                class="btn ml-1 btn-outline-success btn-sm">
                                                Change <i class="fas fa-user-lock"></i>
                                            </a>
                                        </td>
                                        <td>{{ $wp->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Ban Group Worker List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">City & Location</th>
                                    <th scope="col">Work Type</th>
                                    <th scope="col">Post Count</th>
                                    <th scope="col">အဖွဲ့ဝင်</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\User::where('role', 'worker')->where('count', '>', 1)->onlyTrashed()->get() as $wp)
                                    <tr>
                                        <td>{{ $wp->name }}

                                        </td>
                                         <td>
                                            <div class="">
                                                @if (is_numeric($wp->city ))
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->city }}</span>
                                                @else
                                                    <span class="badge badge-secondary p-2 mr-1">{{ $wp->getCity->name }}</span>
                                                @endif
                                                @if (is_numeric($wp->location))
                                                    <span class="badge badge-success p-2 mr-1">{{ $wp->getLocation->name }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->location }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                @if (is_numeric($wp->work))
                                                    <span class="badge badge-secondary p-2 mr-1">{{ $wp->getWork->name }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->work }}</span>
                                                @endif
                                                @if (is_numeric($wp->job))
                                                    <span class="badge badge-success p-2 mr-1">{{ $wp->getJob->name }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2 mr-1">{{ $wp->job }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge p-2 ml-auto  badge-info ">
                                                {{ \App\Post::where('worker_id', $wp->id)->count() }} posts
                                            </span>
                                        </td>
                                        <td>
                                            {{ $wp->count }} ယောက်
                                        </td>
                                        {{-- <td>{{ $wp->card }}</td> --}}
                                        <td class="control-group d-flex justify-content-start"
                                            style="vertical-align: middle; text-align: center">
                                            <a onClick="return confirm('Are you sure you want to unban?')"
                                                href="{{ route('user.banWorker', $wp->id) }}"
                                                class="btn ml-1 btn-outline-success btn-sm">
                                                Unban
                                                <i class="fas fa-user-lock"></i>
                                            </a>
                                        </td>
                                        <td>{{ $wp->created_at->diffForHumans() }}</td>
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
@section('foot')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#previewImg").attr("src", e.target.result);

                }

                reader.readAsDataURL(file);
            }
        }

        $(".table").dataTable({
            "order": [
                [0, "desc"]
            ],
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").worker().addClass(
            "px-0");
    </script>
@endsection
