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
                <div class="ms-auto text-secondary">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <form action="/siswa" class="input-group">
                            <input type="search" name="q" class="form-control form-control-sm" aria-label="Search invoice"
                                fdprocessedid="mtv35">
                            <select name="type" class="form-select form-select-sm" style="width: 30px; max-width:80px" fdprocessedid="qljr7k">
                                <option value="all">All</option>
                                <option value="nama">Nama</option>
                                <option value="nis">Nis</option>
                            </select>
                        </form>
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
                            <form action="{{ route('hapus.siswa', ['id' => $siswa->id]) }}" method="POST">
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
                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-siswa{{ $siswa->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/></svg>
                            </a>
                            <div class="modal modal-blur fade" id="modal-siswa{{ $siswa->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('editsiswa',['id'=>$siswa->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="mb-3">
                                                    <label class="form-label">NIS</label>
                                                    <input type="number" class="form-control" name="nis" value="{{ $siswa->nis }}" placeholder="Nis"
                                                        fdprocessedid="ykykumn">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="{{ $siswa->namasiswa }}" placeholder="Nama"
                                                        fdprocessedid="ykykumn">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" fdprocessedid="ykykumn">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label">Jenis Kelamin</div>
                                                    <select name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}" class="form-select" fdprocessedid="3kru49h">
                                                        @if ($siswa->jenis_kelamin == 'Laki-laki')
                                                        <option value="Laki-laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        @elseif ($siswa->jenis_kelamin == 'Perempuan')
                                                        <option value="Perempuan">Perempuan</option>
                                                        <option value="Laki-laki">Laki-Laki</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" class="form-control" data-bs-toggle="autosize" placeholder="Alamat"
                                                        style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 60px;">{{ $siswa->alamat }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label">Kota</div>
                                                    <select name="id_kota" value="{{ $siswa->id_kota }}" class="form-select" fdprocessedid="3kru49h">
                                                        @foreach ($kotas as $kota) 
                                                        <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                                                        @endforeach
                                                    </select>
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
            <ul class="pagination m-0 ms-auto">
                <ul class="pagination align-items-center d-flex m-0 ms-auto">
                    {{ $siswas->appends(['q' => request()->input('q'),'jk' => request()->input('jk'),'k' => request()->input('k'),'type' => request()->input('type')])->links('pagination::bootstrap-5') }}
                </ul>
            </ul>
        </div>
    </div>
@endsection
