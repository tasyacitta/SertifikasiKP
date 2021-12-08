@extends('layouts.main') <!-- memanggil ekstensi dari folder layout file main-->

@section('navbar') <!-- membuat section untuk navbar agar bisa digunakan-->
    @include('layouts.partials.navbar') <!-- memanggil partial navbar agar bisa digunakan-->
@endsection

@section('content') <!-- membuat section untuk menggunakan layout isi konten-->
<h1>Halaman Awal Agenda Daftar Belanja</h1>
@endsection