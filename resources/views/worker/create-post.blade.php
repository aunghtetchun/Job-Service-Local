@extends('dashboard.author')

@section('title')
    Post Page
@endsection

@section('content')

    @component('component.breadcrumb', [
        'data' => [
            'Tzt' => route('post.index'),
        ],
    ])
        @slot('last')
            Add Post
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-6">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Add Post
                @endslot
                @slot('button')
                    <a href="{{ route('worker.postList') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('worker.storePost') }}" method="post" enctype="multipart/form-data">
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
                                <label for="description">Description</label>
                                <textarea rows="9" class="form-control @error('street') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group input-field">
                                <label class="active" for="images">Photos</label>
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                                @error('images')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary "><i class="fas fa-plus-square mr-1"></i> Add Post</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
        // $(document).ready(function() {
        //     $('#description').summernote({
        //         height: 140, // set editor height
        //         minHeight: null, // set minimum height of editor
        //         maxHeight: null, // set maximum height of editor
        //         focus: true
        //     });
        // });
        $('.input-images-1').imageUploader();
    </script>
@endsection
