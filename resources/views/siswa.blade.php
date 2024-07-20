@extends('layout.app')
@section('title', 'Dashboard admin')
@section('page-pretitle', 'Dashboard admin')
@section('page-title', 'Daftar siswa')
@section('isi')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <form class="d-flex gap-4">
                @csrf
                <div>
                    <div class="form-label">Jenis Kelamin</div>
                    <select name="jenis_kelamin" class="form-select form-select-sm" fdprocessedid="g5c77a">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <div class="form-label">Kota</div>
                    <select name="kota" class="form-select form-select-sm" fdprocessedid="g5c77a">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
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
                            <form action="">
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
                                    <select name="kelamin" class="form-select" fdprocessedid="3kru49h">
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
                                    <select name="kota" class="form-select" fdprocessedid="3kru49h">
                                        {{-- <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option> --}}
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
                    <tr>
                        <td><span class="text-secondary">001401</span></td>
                        <td>Design Works</td>
                        <td>
                            <span class="flag flag-xs flag-country-us me-2"></span>
                            Carlson Limited
                        </td>
                        <td>
                            87956621
                        </td>
                        <td>
                            15 Dec 2017
                        </td>
                        <td>
                            Paid
                        </td>
                        <td>$887</td>
                        <td>
                            hapus
                        </td>
                    </tr>
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
