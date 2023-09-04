@extends('dashboard.app')

@section('title')
    City & Work Page
@endsection

@section('content')

    @component('component.breadcrumb', [
        'data' => [
            ' City & Work' => 'create',
        ],
    ])
        @slot('last')
        @endslot
    @endcomponent
    <div class="row align-items-stretch">

        <div class="col-4 mt-2">
            <div class="list-group" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action text-capitalize {{ $status == 'city' ? 'active' : '' }}"
                    id="city-list" data-toggle="list" href="#city" role="tab" aria-controls="home"><i
                        class="fas fa-city"></i> &nbsp; မြို့နယ် <span
                        class="ml-2 badge badge-pill badge-success px-2 ">{{ \App\Information::where('type', 'city')->count() }}</span>
                </a>
                <a class="list-group-item list-group-item-action text-capitalize {{ $status == 'work' ? 'active' : '' }}"
                    id="work-list" data-toggle="list" href="#work" role="tab" aria-controls="messages"><i
                        class="fas fa-network-wired"></i> &nbsp; အလုပ်အမျိုးအစား <span
                        class="ml-2 badge badge-pill badge-success px-2 ">{{ \App\Information::where('type', 'work')->count() }}</span></a>

            </div>

        </div>
        <div class="col-12 col-md-8 mt-2">
            @if (isset($information))
                @component('component.card')
                    @slot('icon')
                        <i class="feather-file text-primary"></i>
                    @endslot
                    @slot('title')
                        Edit <span class="title">{{ $status }}</span>
                    @endslot
                    @slot('button')
                    @endslot
                    @slot('body')
                        <div>
                            <form action="{{ route('information.update', $information->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-8">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ $information->name }}" placeholder="Title">
                                        @error('name')
                                            <small class="invalid-feedback font-weight-bold" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control"><i
                                                class="fas fa-plus-square mr-1"></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endslot
                @endcomponent
            @else
                @component('component.card')
                    @slot('icon')
                        <i class="feather-file text-primary"></i>
                    @endslot
                    @slot('title')
                        Add <span class="title">{{ $status }}</span>
                    @endslot
                    @slot('button')
                    @endslot
                    @slot('body')
                        <div>
                            <form action="{{ route('information.store') }}" method="post">
                                @csrf
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-8">
                                        <input type="hidden" name="type" id="status" value="{{ $status }}">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}" placeholder="">
                                        @error('name')
                                            <small class="invalid-feedback font-weight-bold" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control"><i
                                                class="fas fa-plus-square mr-1"></i> Add </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endslot
                @endcomponent
            @endif
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-12 ">
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade   {{ $status == 'city' ? 'active show' : '' }}" id="city" role="tabpanel"
                    aria-labelledby="city-list">
                    @component('component.card')
                        @slot('icon')
                            <i class="feather-file text-primary"></i>
                        @endslot
                        @slot('title')
                            City List
                        @endslot
                        @slot('button')
                            <a href="{{ route('information.create') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-plus fa-fw"></i>
                            </a>
                        @endslot
                        @slot('body')
                            <div>
                                <table class="table table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">City Name</th>
                                            <th scope="col">Controls</th>
                                            <th scope="col">Created_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Information::where('type', 'city')->latest()->get() as $c)
                                            <tr>
                                                <th scope="row">{{ $c->id }}</th>
                                                <td>{{ $c->name }}</td>
                                                <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                                    <a href="{{ route('information.edit', $c->id) }}"
                                                        class="btn mr-2 btn-outline-warning btn-sm">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $c->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endslot
                    @endcomponent
                </div>

                <div class="tab-pane fade  {{ $status == 'work' ? 'active show' : '' }}" id="work" role="tabpanel"
                    aria-labelledby="work-list">
                    @component('component.card')
                        @slot('icon')
                            <i class="feather-file text-primary"></i>
                        @endslot
                        @slot('title')
                            Work List
                        @endslot
                        @slot('button')
                            <a href="{{ route('information.create') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-plus fa-fw"></i>
                            </a>
                        @endslot
                        @slot('body')
                            <div>
                                <table class="table table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Work Name</th>
                                            <th scope="col">Controls</th>
                                            <th scope="col">Created_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Information::where('type', 'work')->latest()->get() as $c)
                                            <tr>
                                                <th scope="row">{{ $c->id }}</th>
                                                <td>{{ $c->name }}</td>
                                                <td class="control-group d-flex"
                                                    style="vertical-align: middle; text-align: center">
                                                    <a href="{{ route('information.edit', $c->id) }}"
                                                        class="btn mr-2 btn-outline-warning btn-sm">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $c->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>

    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            // Add a click event listener to each tab link
            $('.list-group-item').click(function(event) {
                event.preventDefault();

                // Get the ID of the clicked tab link
                const tabId = $(this).attr('href');

                // Remove the '#' character from the tab ID
                const cleanedTabId = tabId.substring(1);

                // // Get the corresponding tab content based on the cleaned ID
                // const tabContent = $('#' + cleanedTabId).text();

                // Display the content of the selected tab
                console.log("Selected tab content:", cleanedTabId);
                $(".title").text(cleanedTabId);
                $("#status").val(cleanedTabId);
            });


        });
    </script>
@endsection
