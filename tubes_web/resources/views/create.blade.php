@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <p>Buat Laporan/Komentar</p>
        <hr>
    </div>
    <div class="col-1"></div>
</div>

<form action="{{route('report.store')}}" method="post" id="form" name="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <textarea name="laporan" id="" cols="30" rows="10" placeholder="Laporan/Komentar"></textarea> <br>
            <select name="aspek" id="" class="classic"> 
                <option value="">Pilih Aspek Pelaporan/Komentar</option>
                <option value="Dosen">Dosen</option>
                <option value="Staff">Staff</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Infrastruktur">Infrastruktur</option>
                <option value="Pengajar">Pengajar</option>
            </select> <br>
            <div class="button-wrap">
                <label class ="new-button" for="upload"> Choose File
                <input name="lampiran" id="upload" type="file" >
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 right">
            <button type="button" onclick="validateForm()" class="btn-submit">Buat LAPOR!</button>
        </div>
        <div class="col-1"></div>
    </div>
</form>

<div class="row garis-bawah">
    <div class="col-1"></div>
    <div class="col-10">

        <hr>
    </div>
    <div class="col-1"></div>
</div>
@endsection