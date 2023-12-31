@extends('dashboard.wedding-ui')

@section('title')
    Sample Page
@endsection

@section('content')
    <div class="col-md-8 col-lg-3 col-12 mt-3">
        <div class="card border">
            <div class="card-header bg-success py-3 text-light text-center h5 font-weight-bolder">
                အလုပ်သမားလျှောက်လွှာဖောင်</div>

            <div class="card-body">
                <form method="POST" action="{{ route('worker.register') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group my-3 ">
                        <label for="name" class="font-weight-bold">နာမည်</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group my-3 ">
                        <label for="email" class=" font-weight-bold ">ဖုန်းနံပါတ်</label>

                        <div class="">
                            <input id="email" type="number" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group my-3 ">
                        <label for="password" class="font-weight-bold  ">{{ __('Password') }}</label>

                        <div class="">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group my-3 ">
                        <label for="password-confirm" class=" font-weight-bold ">{{ __('Confirm Password') }}</label>

                        <div class="">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group my-3 ">
                        <label for="count" class=" font-weight-bold ">အလုပ်သမားအရေအတွက် </label>

                        <div class="">
                            <input id="count" onchange="setGroup()" type="number"
                                class="form-control @error('count') is-invalid @enderror" name="count" value="1"
                                required>
                            @error('count')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group my-3 d-none group-input">
                        <label for="group_name" class=" font-weight-bold">အဖွဲ့နာမည်</label>

                        <div class="">
                            <input id="group_name" type="text"
                                class="form-control @error('group_name') is-invalid @enderror" name="group_name"
                                value="{{ old('group_name') }}" placeholder="" required>
                            @error('group_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group my-3 ">
                        <label for="city" class="font-weight-bold">မြို့</label>
                        <select name="city" id="city" class="form-control select2">
                            <option selected disabled></option>
                            @foreach (\App\Information::where('type', 'city')->get() as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                            <option value="new">အသစ်ထည့်မည်</option>
                        </select>
                        <input id="custom-city" type="text" class="form-control mt-2 d-none" name="custom-city"
                            placeholder="မြို့အသစ်နာမည်ရေးပါ">
                        @error('city')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group my-3 ">
                        <label for="location" class="font-weight-bold">မြို့နယ်</label>
                        <select name="location" id="location" class="form-control select2">
                            <option selected disabled></option>
                            {{-- @foreach (\App\SubCategory::where('type', 'location')->get() as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach --}}
                        </select>
                        <input id="custom-location" type="text" class="form-control mt-2 d-none" name="custom-location"
                            placeholder="မြို့နယ်အသစ်နာမည်ရေးပါ">
                        @error('location')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group my-3 ">
                        <label for="work" class="font-weight-bold">အလုပ်အမျိုးအစား (ဥပမာ-အင်ဂျင်နီယာ၊ လက်သမား၊
                            ပန်းရံ)</label>
                        <select name="work" id="work" class="form-control select2">
                            <option selected disabled></option>
                            @foreach (\App\Information::where('type', 'work')->get() as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                            <option value="new">အသစ်ထည့်မည်</option>
                        </select>
                        <input id="custom-work" type="text" class="form-control mt-2 d-none" name="custom-work"
                            placeholder="အလုပ်အမျိုးအစားအသစ်နာမည်ရေးပါ">
                        @error('work')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group my-3 ">
                        <label for="job" class="font-weight-bold">အလုပ်အကိုင် (ဥပမာ-အုတ်စီ၊ သံလက်ကိုင်၊
                            ဆောက်လုပ်ရေး၊ လမ်းတံတား)</label>
                        <select name="job" id="job" class="form-control select2">
                            <option selected disabled></option>
                            {{-- @foreach (\App\SubCategory::where('type', 'job')->get() as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach --}}

                        </select>
                        <input id="custom-job" type="text" class="form-control mt-2 d-none" name="custom-job"
                            placeholder="အလုပ်အကိုင်အသစ်နာမည်ရေးပါ">
                        @error('job')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <label for="address" class="font-weight-bold">လိပ်စာအပြည့်အစုံ</label>

                        <div>
                            <textarea id="address" rows="7" class="form-control @error('address') is-invalid @enderror" name="address"
                                placeholder="" required>{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label for="bio"
                            class="font-weight-bold">မိမိလုပ်ငန်းနှင့်အလုပ်အကိုင်အကြောင်းအကျဥ်းချုပ်ရေးပါ</label>

                        <div>
                            <textarea id="bio" rows="10" class="form-control @error('bio') is-invalid @enderror"
                                placeholder="အလုပ်အပ်မည့်သူများ အတွက် မိမိအလုပ်အကြောင်းနှင့်ပက်သက်ပြီး မိတ်ဆက်စာရေးပါ" name="bio" required>{{ old('bio') }}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group my-3  mb-0">
                        <div class=" font-weight-bold">
                            <button type="submit" onclick="showLoading()" class="btn btn-primary">
                                အတည်ပြုမည်
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('foot')
    <script>
        function setGroup() {
            var inputValue = $("#count").val();
            if (inputValue > 1) {
                $(".group-input").removeClass("d-none");
            } else {
                $(".group-input").addClass("d-none");
            }
        }

        function showLoading() {
            // Show the loading overlay
            $(".loading").LoadingOverlay("show", {
                background: "rgba(105,214,255,0.5)"
            });

            // Set a timeout to hide the loading overlay after 3 seconds
            setTimeout(function() {
                hideLoading(); // Call a function to hide the loading overlay
            }, 500);
        }

        function hideLoading() {
            // Hide the loading overlay
            $(".loading").LoadingOverlay("hide", true);
        }
        $(document).ready(function() {

            $('#city').on('change', function() {
                $(".loading").LoadingOverlay("show", {
                    background: "rgba(105,214,255,0.5)"
                });
                var cityId = $(this).val();
                if ($(this).val() === 'new') {
                    $('#custom-city').removeClass('d-none');
                    $('#custom-location').removeClass('d-none');
                    $('#location').empty().append(
                        '<option selected  value="new">အသစ်ထည့်မည်</option>');
                    $(".loading").LoadingOverlay("hide", true);

                } else if (cityId) {
                    $('#custom-city').addClass('d-none');
                    $.ajax({
                        url: '{{ route('get-townships') }}',
                        type: 'GET',
                        data: {
                            city_id: cityId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#location').empty().append(
                                '');
                            $.each(data, function(key, location) {
                                $('#location').append('<option value="' + location.id +
                                    '">' + location.name +
                                    '</option> '
                                );
                            });
                            $("#location").append(
                                '<option value="new">အသစ်ထည့်မည်</option>');
                            $(".loading").LoadingOverlay("hide", true);

                        }
                    });
                }
                // else {
                //     $('#location').empty().append(
                //         '<option selected disabled value="">မြို့နယ်ရွေးပါ</option>');
                // }
            });
            $('#work').on('change', function() {
                $(".loading").LoadingOverlay("show", {
                    background: "rgba(105,214,255,0.5)"
                });
                var workId = $(this).val();
                if ($(this).val() === 'new') {
                    $('#custom-work').removeClass('d-none');
                    $('#custom-job').removeClass('d-none');
                    $('#job').empty().append(
                        '<option selected value="new">အသစ်ထည့်မည်</option>');
                    $(".loading").LoadingOverlay("hide", true);

                } else if (workId) {
                    $('#custom-work').addClass('d-none');
                    $.ajax({
                        url: '{{ route('get-jobs') }}',
                        type: 'GET',
                        data: {
                            work_id: workId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#job').empty().append(
                                '');
                            $.each(data, function(key, job) {
                                $('#job').append('<option value="' + job.id + '">' + job
                                    .name +
                                    '</option>'
                                );
                            });
                            $("#job").append(
                                '<option value="new">အသစ်ထည့်မည်</option>');
                            $(".loading").LoadingOverlay("hide", true);

                        }
                    });
                }
                // else {
                //     $('#job').empty().append(
                //         '<option selected disabled value="">အလုပ်အမျိုးအစားရွေးပါ</option>');
                // }
            });
            $('#job').on('change', function() {
                if ($(this).val() === 'new') {
                    $('#custom-job').removeClass('d-none');
                } else {
                    $('#custom-job').addClass('d-none');
                }
            });
            $('#location').on('change', function() {
                if ($(this).val() === 'new') {
                    $('#custom-location').removeClass('d-none');
                } else {
                    $('#custom-location').addClass('d-none');
                }
            });
        });
    </script>
@endsection
