<x-layout :title="'Barang Masuk'">
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Barang Masuk</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item active">Barang Masuk</li>
                      </ol>
                  </div>
              </div>
              <x-success-message />
              <x-failed-message />
          </div>
      </section>

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <a href="/dashboard/barang-masuk/create" class="btn btn-success">Tambah Data</a>
                          </div>

                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Nama Barang</th>
                                          <th>Jumlah</th>
                                          <th>Pengirim</th>
                                          <th>Keterangan</th>
                                          <th>Tanggal</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          // No notes
                                          $counter = ($barangMasuks->currentpage() - 1) * $barangMasuks->perpage() + 1;
                                      @endphp
                                      @forelse ($barangMasuks as $barangMasuk)
                                          <tr>
                                              <td>{{ $counter++ }}</td>
                                              <td>{{ $barangMasuk->barang->nama }}</td>
                                              <td>{{ $barangMasuk->jumlah }}</td>
                                              <td>{{ $barangMasuk->pengirim }}</td>
                                              <td>{{ $barangMasuk->keterangan }}</td>
                                              <td>
                                                  {{ Carbon\Carbon::parse($barangMasuk->tanggal)->translatedFormat('l, d F Y') }}
                                              </td>
                                              <td>
                                                
                                                <form method="post" action="/dashboard/barang-masuk/{{ $barangMasuk->id }}"
                                                      class="form-inline">
                                                      @csrf
                                                      @method('DELETE')
                                                      <div class="form-group mr-1">
                                                          <a href="/dashboard/barang-masuk/{{ $barangMasuk->id }}/edit"
                                                              class="btn btn-info">Edit</a>
                                                      </div>
                                                      <button type="submit" class="btn btn-danger"
                                                          onclick="return confirm('kamu yakin ingin menghapus ini?')">Hapus</button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @empty
                                          <p>Data Barang Masuk Kosong</p>
                                      @endforelse
                                  </tbody>
                              </table>
                              <div class="d-flex justify-content-end my-3">
                                  {{ $barangMasuks->links() }}
                              </div>
                          </div>

                      </div>

                  </div>

              </div>

          </div>

      </section>

  </div>

</x-layout>
