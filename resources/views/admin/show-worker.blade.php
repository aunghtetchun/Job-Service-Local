@extends('dashboard.app')

@section('title')
    Worker Profile
    Page
@endsection

@section('content')

    @component('component.breadcrumb', [
        'data' => [
            'Worker' => '#',
            'Worker' => '#',
        ],
    ])
        @slot('last')
            See Worker
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="fa-fw feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Worker
                @endslot
                @slot('button')
                    {{-- <a href="{{ route('recommend.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a> --}}
                    {{-- <form class="d-inline-block" action="{{ route('recommend.destroy',$worker->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button href="" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form> --}}
                @endslot
                @slot('body')
                    <div class="card-body">
                        @isset($worker)
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-12 col-md-6">
                                    <table class="table">
                                        <tbody>
                                            @extends('dashboard.app')

                                            @section('title')
                                                Worker Profile
                                                Page
                                            @endsection

                                            @section('content')
                                                @component('component.breadcrumb', [
                                                    'data' => [
                                                        'Worker' => '#',
                                                        'Profile' => '#',
                                                    ],
                                                ])
                                                    @slot('last')
                                                        View Profile
                                                    @endslot
                                                @endcomponent

                                                <div class="row">
                                                    <div class="col-12 col-md-8">
                                                        @component('component.card')
                                                            @slot('icon')
                                                                <i class="fa-fw feather-file text-primary"></i>
                                                            @endslot
                                                            @slot('title')
                                                                Worker Profile
                                                            @endslot
                                                            @slot('button')
                                                                {{-- <a href="{{ route('recommend.index') }}" class="btn btn-sm btn-outline-primary">
                                                                    <i class="fa-fw fas fa-list fa-fw"></i>
                                                                </a>
                                                                <form class="d-inline-block" action="{{ route('recommend.destroy', $worker->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button href="" class="btn btn-sm btn-outline-danger text-left">
                                                                        <i class="fa-fw feather-trash-2"></i>
                                                                    </button>
                                                                </form> --}}
                                                            @endslot
                                                            @slot('body')
                                                                <div class="card-body">
                                                                    @isset($worker)
                                                                        <div class="d-flex flex-wrap justify-content-around ">
                                                                            <div class="col-12 p-0">
                                                                                <table class="table table-bordered">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>နာမည်</td>
                                                                                            <td>{{ $worker->name }}</td>
                                                                                        </tr>
                                                                                        @if ($worker->count > 0)
                                                                                            <td>အဖွဲ့နာမည်</td>
                                                                                            <td>{{ $worker->group_name }}</td>
                                                                                        @endif

                                                                                        <tr>
                                                                                            <td>ဖုန်းနံပါတ်</td>
                                                                                            <td>{{ $worker->email }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Work Type & Job</td>
                                                                                            <td>
                                                                                                <div class="">
                                                                                                    @if (is_numeric($worker->work))
                                                                                                        <span
                                                                                                            class="badge badge-secondary p-2 mr-1">{{ $worker->getWork->name }}</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="badge badge-danger p-2 mr-1">{{ $worker->work }}</span>
                                                                                                    @endif
                                                                                                    @if (is_numeric($worker->job))
                                                                                                        <span
                                                                                                            class="badge badge-success p-2 mr-1">{{ $worker->getJob->name }}</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="badge badge-danger p-2 mr-1">{{ $worker->job }}</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>City & Location</td>
                                                                                            <td>
                                                                                                <div class="">
                                                                                                    @if (is_numeric($worker->city))
                                                                                                        <span
                                                                                                            class="badge badge-secondary p-2 mr-1">{{ $worker->getCity->name }}</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="badge badge-danger p-2 mr-1">{{ $worker->city }}</span>
                                                                                                    @endif
                                                                                                    @if (is_numeric($worker->location))
                                                                                                        <span
                                                                                                            class="badge badge-success p-2 mr-1">{{ $worker->getLocation->name }}</span>
                                                                                                    @else
                                                                                        1                <span
                                                                                                            class="badge badge-danger p-2 mr-1">{{ $worker->location }}</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>လိပ်စာအပြည့်အစုံ</td>
                                                                                            <td>{{ $worker->address }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Biography</td>
                                                                                            <td>{{ $worker->bio }}</td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>တင်ခဲ့သော Post</td>
                                                                                            <td>
                                                                                                <span class="badge p-2 ml-auto  badge-info ">
                                                                                                    {{ \App\Post::where('worker_id', $worker->id)->count() }}
                                                                                                    posts
                                                                                                </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Created Date</td>
                                                                                            <td>{{ $worker->created_at->diffForHumans() }}</td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
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


                                        </tbody>
                                    </table>
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
