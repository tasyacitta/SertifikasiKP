@extends('layouts.main') <!-- memanggil ekstensi dari folder layout file main-->

@section('navbar') <!-- membuat section untuk navbar agar bisa digunakan-->
    @include('layouts.partials.navbar') <!-- memanggil partial navbar agar bisa digunakan-->
@endsection

@section('content') <!-- membuat section untuk menggunakan layout isi konten-->
<h1>Edit Agenda Daftar Belanja</h1>
<div class="container">
    @if(session('sukses'))
        <div class="alert alert-dark" role="alert">
        {{session('sukses')}}
        </div>
    @endif
    <div class="row">
    <form action="/agendas/{{$list->id}}/update" method="POST" enctype="multipart/form-data">
                                        {{@csrf_field()}} 
                                        <div class="mb-3">
                                        <input required type="file" id="img" name="img" accept="image/*" class="@error('img') @enderror">{{$list->img}}
                                        </div>
                                        <div class="mb-2">
                                        <input required type="text" class="form-control fw-bold @error('title') @enderror" name="title" value="{{$list->title}}" >
                                        <input required type="number" class="form-control fw-bold @error('quantity') @enderror" name="quantity" value="{{$list->quantity}}" >
                                        </div>
                                        
                                        <div class="input-group">
                                        <select name="unit"  class="form-select" id="exampleFormControl" required >
                                            <option value="Kilo" @if($list->unit == "Kilo") selected @endif>Kilo</option>
                                            <option value="Liter" @if($list->unit == "Liter") selected @endif>Liter</option>
                                            <option value="Buah" @if($list->unit == "Buah") selected @endif>Buah</option>
                                        </select>
                                        </div>

                                        <div>
                                        <textarea required class="form-control fs-1 fw-bold @error('desc') @enderror" placeholder="Keterangan Produk" name="desc">{{$list->desc}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-dark">Ubah Data</button>
                </form>                                
                                
    </div>
    <div>
        
@endsection
