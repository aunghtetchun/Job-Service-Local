@extends('dashboard.app')

@section('title')
    Location & Job Page
@endsection

@section('content')

    @component('component.breadcrumb', [
        'data' => [
            ' Location & Job' => 'create',
        ],
    ])
        @slot('last')
        @endslot
    @endcomponent

    <div class="row align-items-stretch">


        <div class="col-12 col-md-8 mt-2">
            @if (isset($subCategory))
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
                            <form action="{{ route('subcategory.update', $subCategory->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row align-items-end">
                                    <div class="form-group col-md-6">
                                        <label for="category_id">City</label>
                                        <select name="information_id" id="information_id" class="form-control select2">
                                            <option selected disabled>Select City</option>
                                            @foreach (\App\Information::where('type', 'city')->get() as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('information_id')
                                            <small class="invalid-feedback font-weight-bold" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ $subCategory->name }}" placeholder="Title">
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
                            <form action="{{ route('subcategory.store') }}" method="post">
                                @csrf
                                <div class="form-row align-items-end">
                                    @if ($status == 'location')
                                        <div class="form-group col-md-5">
                                            <label for="information_id">City</label>
                                            <select name="information_id" id="information_id" class="form-control select2">
                                                <option selected disabled>Select City</option>
                                                @foreach (\App\Information::where('type', 'city')->get() as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('information_id')
                                                <small class="invalid-feedback font-weight-bold" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    @elseif ($status == 'job')
                                        <div class="form-group col-md-5">
                                            <label for="information_id">Work</label>
                                            <select name="information_id" id="information_id" class="form-control select2">
                                                <option selected disabled>Select Work</option>
                                                @foreach (\App\Information::where('type', 'work')->get() as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('information_id')
                                                <small class="invalid-feedback font-weight-bold" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-group col-md-5">
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
                                    <div class="form-group col-md-2">
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
                @if ($status == 'location')
                    <div >
                        @component('component.card')
                            @slot('icon')
                                <i class="feather-file text-primary"></i>
                            @endslot
                            @slot('title')
                                Location List
                            @endslot
                            @slot('button')
                                <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-outline-primary">
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
                                                <th scope="col">Location Name</th>
                                                <th scope="col">Controls</th>
                                                <th scope="col">Created_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\App\SubCategory::where('type', 'location')->latest()->get() as $c)
                                                <tr>
                                                    <th scope="row">{{ $c->id }}</th>
                                                    <td>{{ $c->getCity->name }}</td>
                                                    <td>{{ $c->name }}</td>
                                                    <td class="control-group d-flex"
                                                        style="vertical-align: middle; text-align: center">
                                                        <a href="{{ route('subcategory.edit', $c->id) }}"
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
                @elseif ($status == 'job')
                    <div >
                        @component('component.card')
                            @slot('icon')
                                <i class="feather-file text-primary"></i>
                            @endslot
                            @slot('title')
                                Job List
                            @endslot
                            @slot('button')
                                <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-outline-primary">
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
                                                <th scope="col">Job Name</th>
                                                <th scope="col">Controls</th>
                                                <th scope="col">Created_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\App\SubCategory::where('type', 'job')->latest()->get() as $c)
                                                <tr>
                                                    <th scope="row">{{ $c->id }}</th>
                                                    <td>{{ $c->getWork->name }}</td>
                                                    <td>{{ $c->name }}</td>
                                                    <td class="control-group d-flex"
                                                        style="vertical-align: middle; text-align: center">
                                                        <a href="{{ route('subcategory.edit', $c->id) }}"
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
                @endif
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
