@extends('layouts.master')
@section('content')

<div class="row sub-head">
    <div class="col-1"></div>
    <div class="col-10">
        <p>Detail Laporan/Komentar</p>
        <hr>
    </div>
    <div class="col-1"></div>
</div>

<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <p class="laporan">{{$report->laporan}}</p>
    </div>
    <div class="col-1"></div>
</div>

<div class="row lampiran">
    <div class="col-1"></div>
    <div class="col-4">
        <p>Lampiran :</p><br>
        <img id="lampiran" src="{{asset('storage/images/' .$report->lampiran)}}" width="100px" alt="{{$report->lampiran}}" class="img-fluid">
    </div>
</div>

<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
        <p>waktu : {{date('d-m-Y H:i', strtotime($report->created_at))}} &ensp; Aspek: {{$report->aspek}}</p>
    </div>
    <div class="col-3 right">
        <p><a href="{{route('report.edit', $report->id)}}">Edit Laporan</a></p>
    </div>
    <div class="col-3 right">
        <p><a href="#" onclick="document.getElementById('id01').style.display='block'">Hapus Laporan/Komentar</a></p>

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

{{-- modal delete --}}

<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
    <form class="modal-content" action="{{route('report.destroy', $report->id)}}" method="POST" enctype="multipart/form-data">
        @METHOD('DELETE')
        @csrf
        <div class="container">
            <h1>Hapus Laporan</h1>
            <p>Apakah anda yakin ingin menghapus laporan?</p>

            <div class="clearfix">
                <button type="button" class="btn-submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

                <button type="submit" class="btn-submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn" value="Delete">Delete</button>
    </form>
</div>
</div>
</form>
</div>
@endsection