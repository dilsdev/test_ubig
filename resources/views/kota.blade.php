@extends('layout.app')
@section('title', 'Dashboard admin')
@section('page-pretitle', 'Dashboard admin')
@section('page-title', 'Daftar kota')
@section('isi')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0">Kota</h2>
                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-large">
                    Tambah
                </a>
                <div class="modal modal-blur fade" id="modal-large" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah kota</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <form action="{{ route('tambahkota') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Kota</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama kota" fdprocessedid="ykykumn">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah</button>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="ms-auto text-secondary">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <form action="/kota" class="input-group">
                            <input type="search" name="q" class="form-control form-control-sm" aria-label="Search invoice"
                                fdprocessedid="mtv35">
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kota</th>
                        <th class="w-1"></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kotas as $key => $kota)
                    <tr>
                        <td><span class="text-secondary">{{ $key+1 }}</span></td>
                        <td>{{ $kota->nama }}</td>
                        <td>
                            <form action="{{ route('hapus.kota', ['id' => $kota->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: transparent;">
                                    <svg style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666">
                                        <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-kota{{ $kota->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/></svg>
                            </a>
                            <div class="modal modal-blur fade" id="modal-kota{{ $kota->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit kota</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{ route('editkota', ['id'=>$kota->id]) }}" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            <div class="mb-3">
                                                <label class="form-label">Kota</label>
                                                <input type="text" class="form-control" name="nama" value="{{ $kota->nama }}" placeholder="Nama kota" fdprocessedid="ykykumn">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                                            </div>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            <ul class="pagination align-items-center d-flex m-0 ms-auto">
                {{ $kotas->appends(['q' => request()->input('q')])->links('pagination::bootstrap-5') }}
            </ul>
        </div>
    </div>
@endsection
