
@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
    <div class="col-12 d-flex flex-wrap justify-content-center">
        <h1 class="col-12 text-center font-weight-bold my-5" style="color: #2a2525">CONTACT US</h1>
        <div class="col-12 col-md-6">
            <form>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="name" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" id="message" rows="7"></textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn px-3 py-2 btn-primary">Send Message</button>
            </form>
        </div>
    </div>
@endsection




