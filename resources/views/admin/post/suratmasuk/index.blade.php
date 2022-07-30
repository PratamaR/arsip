@extends('layouts.admin.app')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Arsip</h1>
      <div class="d-flex ml-3">
        <a href="/add-masuk" class="btn btn-primary">Add New</a>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                      <table class="table_id" id="table_id">
                          <thead class="text-black">
                              <th scope="col">No</th>
                              <th scope="col">No Surat</th>
                              <th scope="col">Tanggal Surat</th>
                              <th scope="col">Pengirim </th>
                              <th scope="col">Penerima</th>
                              <th scope="col">Sifat </th>
                              <th scope="col">Perihal </th>
                              <th scope="col">Isi</th>
                              <th scope="col">File</th>
                              <th scope="col">Action </th>
                          </thead>
                          <tbody>
                            @php $i=0 @endphp
                            @foreach ( $arsips as $arsip)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td> {{ $arsip->no_surat }} </td>
                                <td>{{ \Carbon\Carbon::parse($arsip->tgl_surat)->format('l, d M Y')}}</td>
                                <td> {{ $arsip->pengirim }} </td>
                                <td> {{ $arsip->penerima }} </td>
                                <td> {{ $arsip->sifat }} </td>
                                <td> {{ $arsip->perihal }} </td>
                                <td> {{ $arsip->isi }}</td>
                                <td><a href="{{ asset('/asset/file/masuk'.$arsip->file) }}">{{ $arsip->file }}</a>
                                <td>
                                <form method="post" action="{{ route('masuk-destroy', $arsip->id) }}">
                              <a button type="button" class="btn btn-warning btn-circle" href="{{ route('masuk-edit', $arsip->id) }}"><i class="fas fa-pen"></i></button></a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
     </div>
 </div>
 </div>
 </div>
 </div>
 <div class="section-body">
 </div>
 </section>
 @endsection

 @section('script')
 <script>
 $(document).ready( function () {
 $('#table_id').DataTable();
 } );
 </script>
 @endsection


