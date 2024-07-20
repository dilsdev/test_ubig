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
                               <form action="">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Kota</label>
                                    <input type="text" class="form-control" name="kota" placeholder="Nama kota" fdprocessedid="ykykumn">
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
                        <th class="w-1"></th>
                        <th class="w-1">No</th>
                        <th>Id</th>
                        <th>Nama Kota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            hapus
                        </td>
                        <td><span class="text-secondary">001401</span></td>
                        <td>Design Works</td>
                        <td>Design Works</td>
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
