@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-1"></div>
    <div class="col-10 center">
        <form action="{{route('search')}}" method="get" id="form" name="form" enctype="multipart/form-data">
            @csrf
            <input name="laporan" type="text"> <button class="cari">Cari <img class="magnify" src="{{asset('assets/images/search.png')}}" alt=""></button>
        </form>
    </div>
    <div class="col-1"></div>
</div>

<div class="row">
    <div class="col-12 center">
        <p><a href="{{route('report.create')}}">Buat Laporan/Komentar <b>+</b></a> </p>
    </div>
</div>

{{-- ISI --}}
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <p>Laporan/komentar Terakhir</p>
        <hr>
    </div>
    <div class="col-1"></div>
</div>

{{-- loop laporan --}}
@foreach ($reports as $report)
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <p class="laporan">{{$report->laporan}}</p>
    </div>
    <div class="col-1"></div>
</div>

<div class="row">
    <div class="col-1"></div>
    <div class="col-5">
        <p>Lampiran : {{$report->lampiran}}</p>
    </div>
    <div class="col-5 right">
        <p>waktu : {{date('d-m-Y H:i', strtotime($report->created_at))}} &ensp; <a href="{{route('report.show', $report->id)}}"><b>Lihat Selengkapnya ></b></a></p>
    </div>
    <div class="col-1"></div>
</div>
<div class="row garis">
    <div class="col-1"></div>
    <div class="col-10">
        <hr>
    </div>
    <div class="col-1"></div>
</div>
@endforeach
{{-- end loop --}}
<div class="row">
    <div class="col-12 center titik">
        <p>.</p>
        <p>.</p>
        <p>.</p>
        <br>
        <p>.</p>
        <p>.</p>
        <p>.</p>
    </div>
</div>
@endsection