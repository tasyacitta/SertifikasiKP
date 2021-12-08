<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AgendasController extends Controller //merupakan extend dari controller pada MVC
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //fungsi untuk menampilkan index
    {
        if($request->has('search')){ //digunakan untuk mencari kata pada data
            $data_list = \App\Models\Lists::
            where('title','LIKE','%'.$request->search.'%')
            ->orWhere('desc','LIKE','%'.$request->search.'%')
            ->get();
        }else{
        $data_list = \App\Models\Lists::all();
        }
        return view('agendas/index',["title" => "Homepage","data_list"=>$data_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) //fungsi untuk membuat data pada tabel database
    {
        \App\Models\Lists::create([
            'img' => $request->file('img')->store('img'),
            'title' => $request->title,
            'quantity' => $request->quantity,
            'unit'=>$request->unit,
            'desc'=>$request->desc
        ]);   
        return redirect('/agendas/index') -> with('sukses','Penambahan Data Sukses!');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //fungsi untuk membuka laman mengedit data
    {
        $list = \App\Models\Lists::find($id);
        return view('/agendas/edit',["title" => "Edit Page","list"=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //fungsi untuk mengubah isi data
    {       
            $list = \App\Models\Lists::find($id);
            $list->img =$request->img;
            $list->title = $request->title;
            $list->quantity = $request->quantity;
            $list->unit= $request->unit;
            $list->desc= $request->desc;
            $list->save();
        return redirect('/agendas/index') -> with('sukses','Ubah Data Sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) //fungsi untuk menghapus data pada tabel
    {
        $list = \App\Models\Lists::find($id);
        $list->delete();
        return redirect('/agendas/index') -> with('sukses','Hapus Data Sukses!');

    }
}
