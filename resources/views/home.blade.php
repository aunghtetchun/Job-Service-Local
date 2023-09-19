
@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 d-flex flex-wrap justify-content-around align-items-center">
                    <div class="col-12 col-md-4 mt-2">
                        @foreach(App\Post::get() as $p)
                        <div class="card pbr my-2" >
                            <div class="card-body py-2">
                                <h5 class="card-title mb-0">{{$p->title}}</h5>
                                <small class="mb-2 text-muted">{{$p->getUser->name}} ( {{$p->created_at->diffForHumans()}} )</small>
                                <p class="card-text">{{$p->description}}</p>
                                @foreach($p->getPhoto as $photo)
                                <img src="{{asset('/storage/post/'.$photo->name)}}" alt="" class="w-100">
                                @endforeach
                                <div class="d-flex pt-2">
                                    <div class="col-12 px-0 text-center"  >
                                    <form class="d-none myForm" id="form{{$p->id}}" method="POST" action="{{ route('client.commentPost') }}">
                                        @csrf
                                        <input type="hidden" value="{{$p->id}}" name="post_id">
                                        <textarea class="w-100"  rows="4" name="text"></textarea>
                                        <button class="btn mt-1 btn-success w-100"> 
                                            <i class="far fa-comment-dots"></i>
                                            Comment
                                        </button>
                                    </form>
                                    <button class="btn mt-1 btn-light w-100 cmtbtn" onclick="showForm({{$p->id}})" id="comment{{$p->id}}">  <i class="far fa-comment-dots"></i>
                                        Comment</button>                                   
                                    </div>
                                    <!-- <div class="col-6 text-center">
                                    <i class="far fa-comment-dots"></i>
                                        Comment
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('foot')
<script>
     function showForm(id){
            $(`.myForm`).addClass('d-none');
            $(`#form${id}`).removeClass('d-none');
            $(`#comment${id}`).addClass('d-none');
        }
    $(document).ready(function() {
        $('.myForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Serialize the form data
            var formData = $(this).serialize();
            $(`.myForm`).addClass('d-none');
            $(`.cmtbtn`).removeClass('d-none');
            // Send an AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            });
        });
    });
</script>

@endsection



