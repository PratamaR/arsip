@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h3 class="card-title">{{ $title }}</h3></strong>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="/store-masuk" enctype="multipart/form-data">
            @csrf
            @method($method)
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>No Surat</label>
                <input type="text" class="form-control" placeholder="No Surat" name="no_surat" required autocomplete>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" class="form-control" placeholder="Tanggal Surat" name="tgl_surat" required autocomplete>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Pengirim</label>
                <input type="text" class="form-control" placeholder="Pengirim" name="pengirim" required autocomplete>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Penerima</label>
                <input type="text" class="form-control" placeholder="Penerima" name="penerima" required autocomplete>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control textarea" placeholder="Isi Surat" name="isi" required autocomplete></textarea>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Sifat</label>
                <input type="text" class="form-control" placeholder="Sifat" name="sifat" required autocomplete>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Perihal</label>
                <input type="text" class="form-control" placeholder="Perihal" name="perihal" required autocomplete>
              </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label" >Input File</label>
            <input class="form-control" type="file" name="file" required multiple autocomplete>
          </div>
          <div class="row">
            <div class="update ml-3">
              <button type="submit" class="btn btn-primary btn-round">Update<i class="ml-2 fas fa-check "></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
    @endsection
