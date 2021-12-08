@extends('layouts.main') <!-- memanggil ekstensi dari folder layout file main-->

@section('navbar') <!-- membuat section untuk navbar agar bisa digunakan-->
    @include('layouts.partials.navbar') <!-- memanggil partial navbar agar bisa digunakan-->
@endsection

@section('content') <!-- membuat section untuk menggunakan layout isi konten-->
<h1>Homepage Agenda Daftar Belanja</h1>
<div class="container">
    @if(session('sukses')) <!--kondisional if jika program(tambah data) sukses-->
        <div class="alert alert-dark" role="alert">
        {{session('sukses')}}
        </div>
    @endif
    <div class="row">
    <table class="table table-hover">
    <tr>
        <th>Gambar Product</th>
        <th>Nama Product</th>
        <th>Jumlah Product</th>
        <th>Unit Product</th>
        <th>Deskripsi Product</th>
        <th colspan="3">Aksi</th>
    </tr>
    @foreach($data_list as $list) <!-- memanggil seluruh data tabel list dari database-->
    <tr>
        <td><img src= "<?php echo asset("storage/$list->img")?> " width="200" height="200"></td> <!-- menampilkan media gambar-->
        <td>{{$list->title}}</td> <!-- menampilkan nama produk-->
        <td>{{$list->quantity}}</td> <!-- menampilkan jumlah produk-->
        <td>{{$list->unit}}</td> <!-- menampilkan satuan produk-->
        <td>{{$list->desc}}</td> <!-- menampilkan deskripsi-->
        <td>
            <td><a href="/agendas/{{$list->id}}/edit" class="btn btn-dark">Ubah</td> <!-- button mengubah data -->
            <td><a href="/agendas/{{$list->id}}/delete" class="btn btn-dark">Hapus</td> <!-- button menghapus data -->
    </tr>
    @endforeach
    </table>
    <div>
        <button type="button" class="btn btn-dark" style="float: right;"  data-toggle="modal" data-target="#exampleModalCenter">
        Tambahkan Data <!-- button menambahkan data baru-->
        </button>

        <!-- Modal untuk menambahkan data baru-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                        <form action="/agendas/create" method="POST" enctype="multipart/form-data">
                                        {{@csrf_field()}} 
                                        <div class="mb-3">
                                        <input required type="file" id="img" name="img" accept="image/*" class="@error('img') @enderror">
                                        </div>
                                        <div class="mb-2">
                                        <input required type="text" class="form-control fw-bold @error('title') @enderror" placeholder="Nama Produk" name="title" >
                                        <input required type="number" class="form-control fw-bold @error('quantity') @enderror" placeholder="Jumlah Produk" name="quantity" >
                                        </div>
                                        
                                        <div class="input-group">
                                        <select name="unit"  class="form-select" id="exampleFormControl" required >
                                            <option value="Kilo">Kilo</option>
                                            <option value="Liter">Liter</option>
                                            <option value="Buah">Buah</option>
                                        </select>
                                        </div>

                                        <div>
                                        <textarea required class="form-control fs-1 fw-bold @error('desc') @enderror" placeholder="Keterangan Produk" name="desc"></textarea>
                                        </div>

                                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button> <!-- button menutup modal -->
                <button type="submit" class="btn btn-dark">Tambahkan</button> <!-- button submit data-->
                </form>  
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
</div>

@endsection
