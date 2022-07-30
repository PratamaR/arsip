<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use Illuminate\Http\Request;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Surat Keluar',
            'route' => route('keluar-create'),
            'keluars' => Keluar::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.post.suratkeluar.index', $data);
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
        return view('admin.post.suratkeluar.create', $data);
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
        $file->move('asset/file/keluar', $name);
        $validate['file'] = $name;
        Keluar::create($validate);
        // dd($validate);
        return redirect(route('keluar-list'))->with('message', 'Surat Keluar Successfully Added');
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
            'route' => route('keluar-update', $id),
            'keluar' => Keluar::where('id', $id)->first(),
        ];
        return view('admin.post.suratkeluar.edit', $data);
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
        $keluar = Keluar::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if (file_exists(public_path('asset/file/keluar/'.$keluar->file))) {
                unlink(public_path('asset/file/keluar/'.$keluar->file));
            }
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move('asset/file/keluar/', $name);
            $keluar->file = $name;
        }
        $keluar->no_surat = $request->no_surat;
        $keluar->tgl_surat = $request->tgl_surat;
        $keluar->pengirim = $request->pengirim;
        $keluar->penerima = $request->penerima;
        $keluar->sifat = $request->sifat;
        $keluar->perihal = $request->perihal;
        $keluar->isi = $request->isi;
        $file = $request->file('file');
        $name = uniqid().'.'.$file->getClientOriginalExtension();
        $keluar->update();
        return redirect(route('keluar-list'))->with('message', 'Surat Keluar Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Keluar::where('id', $id);
        $destroy->delete();
        return redirect(route('keluar-list'))->with('message', 'Surat Keluar Successfully Delete');
    }
}
