<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Surat Masuk',
            'route' => route('masuk-create'),
            'arsips' => Arsip::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.post.suratmasuk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'=>'Create List'
        ];
        return view('admin.post.suratmasuk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'pengirim' => 'required',
            'penerima' => 'required',
            'sifat' => 'required',
            'perihal' => 'required',
            'isi' => 'required',
            'file' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
        $file = $request->file('file');
        $name = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('asset/file/masuk/', $name);
        $validate['file'] = $name;
        Arsip::create($validate);
        // dd($validate);
        return redirect(route('masuk-list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit List',
            'method' => 'PUT',
            'route' => route('masuk-update', $id),
            'arsip' => Arsip::where('id', $id)->first(),
        ];
        return view('admin.post.suratmasuk.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arsip = Arsip::find($id);
        $arsip->no_surat = $request->no_surat;
        $arsip->tgl_surat = $request->tgl_surat;
        $arsip->pengirim = $request->pengirim;
        $arsip->penerima = $request->penerima;
        $arsip->sifat = $request->sifat;
        $arsip->perihal = $request->perihal;
        $arsip->isi = $request->isi;
        $file = $request->file('file');
        $name = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move('asset/file/masuk/', $name);
        $validate['file'] = $name;
        $arsip->update();
        return redirect(route('masuk-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Arsip::where('id', $id);
        $destroy->delete();
        return redirect(route('masuk-list'));
    }
}
