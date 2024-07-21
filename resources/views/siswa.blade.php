@extends('layout.app')
@section('title', 'Dashboard admin')
@section('page-pretitle', 'Dashboard admin')
@section('page-title', 'Daftar siswa')
@section('isi')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <form class="d-flex gap-4" action="/siswa">
                <div>
                    <div class="form-label">Jenis Kelamin</div>
                    <select name="jk" class="form-select form-select-sm" fdprocessedid="g5c77a">
                        <option value="">all    </option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <div class="form-label">Kota</div>
                    <select name="k" class="form-select form-select-sm" fdprocessedid="g5c77a">
                        <option value="">all</option>
                        @foreach ($kotas as $kota) 
                            <option value="{{ $kota->nama }}">{{ $kota->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex align-items-end">
                    <button class="btn btn-sm" type="submit">aply</button>
                </div>
            </form>
            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-large">
                Tambah
            </a>
            <div class="modal modal-blur fade" id="modal-large" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tambahsiswa') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">NIS</label>
                                    <input type="number" class="form-control" name="nis" placeholder="Nis"
                                        fdprocessedid="ykykumn">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama"
                                        fdprocessedid="ykykumn">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" fdprocessedid="ykykumn">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Jenis Kelamin</div>
                                    <select name="jenis_kelamin" class="form-select" fdprocessedid="3kru49h">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" data-bs-toggle="autosize" placeholder="Alamat"
                                        style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 60px;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Kota</div>
                                    <select name="id_kota" class="form-select" fdprocessedid="3kru49h">
                                        @foreach ($kotas as $kota) 
                                        <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                                        @endforeach
                                    </select>
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
                <div class="text-secondary">
                    Show
                    <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="8" size="3"
                            aria-label="Invoices count" fdprocessedid="y4ajnd">
                    </div>
                    entries
                </div>
                <div class="ms-auto text-secondary">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-sm" aria-label="Search invoice"
                                fdprocessedid="mtv35">
                            <button data-bs-toggle="dropdown" type="button"
                                class="btn dropdown-toggle dropdown-toggle-split" fdprocessedid="bj4qa"
                                aria-expanded="false"></button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item" href="#">
                                    Action
                                </a>
                                <a class="dropdown-item" href="#">
                                    Another action
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Tanggal lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $key => $siswa)
                    <tr>
                        <td><span class="text-secondary">{{ $key+1 }}</span></td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->namasiswa }}</td>
                        <td>
                            {{ $siswa->tanggal_lahir }}
                        </td>
                        <td>
                            {{ $siswa->jenis_kelamin }}
                        </td>
                        <td>
                            {{ $siswa->alamat }}
                        </td>
                        <td>
                            {{ $siswa->kota }}
                        </td>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
            <ul class="pagination m-0 ms-auto">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 6l-6 6l6 6"></path>
                        </svg>
                        prev
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
