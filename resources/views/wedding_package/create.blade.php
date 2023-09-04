@extends('dashboard.app')

@section('title')
    Sample Page
@endsection

@section('content')

    @component('component.breadcrumb', [
        'data' => [
            'Tzt' => route('wedding_package.index'),
        ],
    ])
        @slot('last')
            Add Golf Event
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-6">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Add Golf Event
                @endslot
                @slot('button')
                    <a href="{{ route('wedding_package.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('wedding_package.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input required type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                                @error('title')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input required type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" id="price" value="{{ old('price') }}" placeholder="Price">
                                @error('price')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="images">images</label>
                                <input required type="file" accept="image/png, .jpeg, .jpg, image/gif" multiple
                                    class="form-control @error('images') is-invalid @enderror" name="images[]" id="images"
                                    value="{{ old('images') }}">
                                @error('images')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="start">Start</label>
                                <input type="date" class="form-control @error('start') is-invalid @enderror" name="start"
                                    id="start" value="{{ old('start') }}" placeholder="Start">
                                @error('start')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end">End</label>
                                <input type="date" class="form-control @error('end') is-invalid @enderror" name="end"
                                    id="end" value="{{ old('end') }}" placeholder="End">
                                @error('end')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('street') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary "><i class="fas fa-plus-square mr-1"></i> Add Golf
                                Event</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 140, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true
            });
        });
    </script>
@endsection
