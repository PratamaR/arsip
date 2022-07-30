@extends('layouts.admin.app')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Arsip</h1>
      <div class="d-flex ml-3">
        <a href="/add-keluar" class="btn btn-primary">Add New</a>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="col-12">
                @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                </div>
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
                            @foreach ( $keluars as $keluar)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td> {{ $keluar->no_surat }} </td>
                                <td>{{ \Carbon\Carbon::parse($keluar->tgl_surat)->format('l, d M Y')}}</td>
                                <td> {{ $keluar->pengirim }} </td>
                                <td> {{ $keluar->penerima }} </td>
                                <td> {{ $keluar->sifat }} </td>
                                <td> {{ $keluar->perihal }} </td>
                                <td> {{ $keluar->isi }}</td>
                                <td><a href="{{ asset('/asset/file/keluar/'.$keluar->file) }}">{{ $keluar->file }}</a>
                                <td>
                                <form method="post" action="{{ route('keluar-destroy', $keluar->id) }}">
                              <a button type="button" class="btn btn-warning btn-circle" href="{{ route('keluar-edit', $keluar->id) }}"><i class="fas fa-pen"></i></button></a>
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

{{-- @section('script')
 <script>
     $(document).ready(function() {
         window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove();
             });
         }, 4000);
     });
</script> --}}


 @section('script')
 <script>
 $(document).ready( function () {
 $('#table_id').DataTable({
    columnDefs: [
            { width: 250, targets: 7 },
            { width: 150, targets: 9 }
        ],
 });
 } );
 </script>
 @endsection


