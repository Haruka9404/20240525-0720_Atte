@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@endsection

@section('header')

@endsection

@section('content')
  <div class="content">
    <h1>{{ $currentDate->format('Y-m-d') ?? 'Date not set' }}</h1>
    <div class="attendance__content">
        <a href="{{ route('attendance.showByDate', ['date' => $previousDate]) }}">&lt;</a>
        <span>{{ $currentDate->format('Y-m-d') }}</span>
        <a href="{{ route('attendance.showByDate', ['date' => $nextDate]) }}">&gt;</a>
    </div>
  </div>

  </div>
    <div class="attendance-table">
      <table class="attendance-table__inner">
        <tr class="attendance-table__row">
          <th class="attendance-table__header">名前</th>
          <th class="attendance-table__header">勤務開始</th>
          <th class="attendance-table__header">勤務終了</th>
          <th class="attendance-table__header">休憩時間</th>
          <th class="attendance-table__header">勤務時間</th>
        </tr>
        @foreach ($attendances as $attendance)
        <tr class="attendance-table__row">
          <td class="attendance-table__item">{{$attendance['user_name']}}</td>
          <td class="attendance-table__item">{{$attendance['attendance_start']}}</td>
          <td class="attendance-table__item">{{$attendance['attendance_end']}}</td>
          <td class="attendance-table__item">{{$attendance['rest_time']}}</td>
          <td class="attendance-table__item">{{$attendance['attendance_time']}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

@endsection