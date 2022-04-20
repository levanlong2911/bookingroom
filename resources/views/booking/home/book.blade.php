@extends('template.home.master')

@section('content')
<link rel="stylesheet" href="home/chitiet.css">
<link rel="stylesheet" href="home/home-page.css">
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>{{ $room_list->name }}</h1>
                    </div>
                    @if (Session::has('fail'))
                        <div class="alet alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <form action="{{ route('home.book', $room_list->id) }}" method="POST">
                        @csrf
                        
                        <!-- <h4 style="color:white;">Create booking</h4> -->
                        <div class="form-group">
                            <!-- <label for="title" style="color: white;">Title</label> -->
                            <input class="form-control" type="text" name="title" placeholder="Rent a room to..." required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="date" class="form-control" type="date" min="2022-04-12" required>
                                    <span class="form-label">date</span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="date" required>
                                    <span class="form-label">Check out</span>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="amount_of_people" class="form-control" required>
                                        <option value="0" selected hidden>emtpy people</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>>8</option>
                                    </select>
                                     <span class="select-arrow"></span>
                                    <span class="form-label">Amount of people</span>
                                </div>
                            </div>
                            <input type="hidden" name="room_list_id" value="{{ $room_list->id }}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select  name="time_start" class="form-control" required>
                                        <option value="0" selected hidden>start</option>
                                        @foreach ($times as $time)
                                            <option value="{{ $time->time }}">{{ $time->time }}</option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">Start</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="time_end" class="form-control" required>
                                        <option value="0" selected hidden>End</option>
                                        @foreach ($times as $time)
                                            <option value="{{ $time->time }}">{{ $time->time }}</option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">End</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-btn">
                            <button type="submit" class="submit-btn">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script>
    $('.form-control').each(function () {
        floatedLabel($(this));
    });

    $('.form-control').on('input', function () {
        floatedLabel($(this));
    });

    function floatedLabel(input) {
        var $field = input.closest('.form-group');
        if (input.val()) {
            $field.addClass('input-not-empty');
        } else {
            $field.removeClass('input-not-empty');
        }
    }
</script>
@endsection