@extends('template.home.master')

@section('content')
  <!-- Nav tabs -->
  <ul class=" ml-5 nav nav-tabs" id="navId">
    <li class="nav-item">
      <a href="#" class="nav-link disabled">Book</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link disabled">All rooms</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link disabled">Bookings</a>
    </li>
  </ul>
  <div class="row mt-5">
      <div class="col-sm-2"></div>
      <form action="" method="get">
        <div class="col-sm-4 ">
          <div class="col-sm-8">
            <input type="submit" class="search" name="submit" value="Search">
            <div class="form-group">
              <label for="date"></label>
              <input type="date" name="date" id="day" class="form-control" placeholder="Mon,28 june 2022">
            </div>
          </div>
        </div>
      </form>
      
      {{-- <div class="col-sm-4 ">
        <div class="col-sm-8 search">
          <div class="form-group">
            <label for="select"></label>
            <select class="form-control" name="select" id="">
              <option>8h</option>
              <option>8h30</option>
              <option>9h</option>
            </select>
          </div>
        </div>
      </div> --}}
      <div class="col-sm-2"></div>
  </div>
  @foreach ($room_lists as $room_list)
    @php
      $slug = Str::slug($room_list->name);
      $url_book = route('home.book', ['id' => $room_list->id]);
    @endphp
    <div class="row ml-2 mt-3 room">
      <div class="col-sm-2"></div>
      <div class="col-sm-8 mt-3">
        <div class="row">
          <div class="col-sm-8">
            <div class="tr mb-2">
              <a href="{{ $url_book }}" style="text-decoration: none">
                <h5>{{ $room_list->name }}</h5>
              </a>
            </div>
            <a href="{{ $url_book }}"><img src="/home/img/screenshot_1.png" alt="" style="width: 100%"></a>
          </div>
          <div class="col-sm-4 gio">
            @foreach ($room_list->room as $room)
                @if($room['date'] == $date)
                  <div class="giocon">{{ $room->time_start}} - {{ $room->time_end }}</div>
                @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-sm-2"></div>
    </div>
  @endforeach
@endsection