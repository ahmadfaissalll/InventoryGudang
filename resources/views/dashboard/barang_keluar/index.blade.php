  <x-layout>
      <div class="content-wrapper">
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Barang</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="/">Home</a></li>
                              <li class="breadcrumb-item active">Barang Keluar</li>
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
                                  <a href="/barang-keluar/create" class="btn btn-success">Tambah Data</a>
                              </div>

                              <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Nama</th>
                                              <th>Jenis</th>
                                              <th>Merk</th>
                                              <th>Ukuran</th>
                                              <th>Stok</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @php
                                              // No notes
                                              $counter = ($barangKeluars->currentpage() - 1) * $barangKeluars->perpage() + 1;
                                          @endphp
                                          @forelse ($barangKeluars as $barangKeluar)
                                              <tr>
                                                  <td>{{ $counter++ }}</td>
                                                  <td>{{ $barangKeluar->barang->nama }}</td>
                                                  <td>{{ $barangKeluar->jumlah }}</td>
                                                  <td>{{ $barangKeluar->penerima }}</td>
                                                  <td>{{ $barangKeluar->keterangan }}</td>
                                                  <td>
                                                      {{ Carbon\Carbon::parse($barangKeluar->tanggal)->translatedFormat('l, d F Y / H:i:s') }}
                                                  </td>
                                                  <td>
                                                    
                                                    <form method="post" action="/barang-keluar/{{ $barangKeluar->id }}"
                                                          class="form-inline">
                                                          @csrf
                                                          @method('DELETE')
                                                          <div class="form-group mr-1">
                                                              <a href="/barang-keluar/{{ $barangKeluar->id }}/edit"
                                                                  class="btn btn-info">Edit</a>
                                                          </div>
                                                          <button type="submit" class="btn btn-danger"
                                                              onclick="return confirm('kamu yakin ingin menghapus ini?')">Hapus</button>
                                                      </form>
                                                  </td>
                                              </tr>
                                          @empty
                                              <p>Data Barang Keluar Kosong</p>
                                          @endforelse
                                      </tbody>
                                  </table>
                                  <div class="d-flex justify-content-end my-3">
                                      {{ $barangKeluars->links() }}
                                  </div>
                              </div>

                          </div>

                      </div>

                  </div>

              </div>

          </section>

      </div>

  </x-layout>
