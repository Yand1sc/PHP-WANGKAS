<div>
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-body px-4">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon purple">
                <i class="iconly-boldChart"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Total Bulan Ini</h6>
              <h6 class="font-extrabold mb-0">{{ $statistics['totalCurrentMonth'] }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-body px-4">
          <div class="row">
            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
              <div class="stats-icon purple">
                <i class="iconly-boldChart"></i>
              </div>
            </div>
            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
              <h6 class="text-muted font-semibold">Total Tahun Ini</h6>
              <h6 class="font-extrabold mb-0">{{ $statistics['totalCurrentYear'] }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- FILTER BULAN --}}
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header text-center">
          <h4>Filter Data Berdasarkan Bulan</h4>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto">
              <div class="mb-3">
                <label for="selected_month" class="form-label">Pilih Bulan:</label>
                <input wire:model.live="selected_month"
                       type="month"
                       class="form-control"
                       id="selected_month">
              </div>
            </div>
          </div>

          <div class="divider">
            <div class="divider-text fw-bold">Gunakan filter bulan untuk menampilkan data</div>
          </div>

          {{-- Jika Ada yang Belum Bayar --}}
          @if($statistics['studentsNotPaidCount'] > 0)
          <div class="card mt-4">
            <div class="card-body">
              <button type="button" class="btn btn-danger btn-block btn-xl font-bold" data-bs-toggle="modal"
                data-bs-target="#notPaidModal">
                Ada <b>{{ $statistics['studentsNotPaidCount'] }}</b> orang belum membayar bulan ini!
                <i class="bi bi-exclamation-triangle"></i>
              </button>

              <div class="row text-center mt-3">
                @foreach ($statistics['studentsNotPaidLimit'] as $student)
                <div class="col-sm-12 col-md-6 mb-3">
                  <div class="p-3 border rounded">
                    <h5 class="mb-1">{{ $student->name }}</h5>
                    <h6 class="text-muted mb-0">{{ $student->identification_number }}</h6>
                  </div>
                </div>
                @endforeach
              </div>

              <button type="button" class="btn btn-primary btn-block btn-xl font-bold" data-bs-toggle="modal"
                data-bs-target="#notPaidModal">Lihat Selengkapnya</button>

              {{-- MODAL --}}
              <div wire:ignore.self data-bs-backdrop="static" class="modal fade" id="notPaidModal" tabindex="-1"
                aria-labelledby="notPaidModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="notPaidModalLabel">Daftar Pelajar Yang Belum Membayar</h1>
                      <button wire:loading.attr="disabled" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <div class="row">
                        @foreach ($statistics['studentsNotPaid'] as $student)
                        <div class="col-sm-12 col-md-6 mb-3">
                          <div class="card border rounded">
                            <div class="card-body">
                              <h5 class="card-title fw-bold">{{ $student->name }}</h5>
                              <p class="card-text text-muted">{{ $student->identification_number }}</p>
                              <p class="card-text text-muted">
                                <span class="badge bg-secondary"><i class="bi bi-telephone-fill"></i>
                                  {{ $student->phone_number }}</span>
                              </p>
                              <span class="badge bg-primary"><i class="bi bi-bookmark"></i>
                                {{ $student->schoolClass->name }}</span>
                              <span class="badge bg-success"><i class="bi bi-briefcase"></i>
                                {{ $student->schoolMajor->name }}</span>
                              <span class="badge bg-light-{{ $student->gender == 1 ? 'primary' : 'danger' }}">
                                <i class="bi bi-gender-{{ $student->gender == 1 ? 'male' : 'female' }}"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button wire:loading.attr="disabled" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Tutup</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex flex-wrap justify-content-end">
              <button wire:click="$refresh" class="btn btn-outline-secondary btn-sm rounded">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
              </button>
            </div>
          </div>
          @endif

          {{-- SEARCH --}}
          <div class="mb-3 mt-4">
            <div class="form-group has-icon-left">
              <div class="position-relative">
                <input wire:model.live="query" type="text" class="form-control shadow-sm rounded fw-bold"
                  placeholder="Masukan keyword pencarian...">
                <div class="form-control-icon">
                  <i class="bi bi-search"></i>
                </div>
              </div>
            </div>
          </div>

          {{-- TABEL --}}
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pelajar</th>
                  <th>Total Bayar</th>
                  <th>Tanggal</th>
                  <th>Dicatat Oleh</th>
                </tr>
              </thead>

              <tbody>
                <tr wire:loading>
                  <td colspan="5" class="text-center">
                    <div class="spinner-border"></div>
                  </td>
                </tr>

                @php
                $startIndex = ($filteredResult->currentPage() - 1) * $filteredResult->perPage() + 1;
                @endphp

                @forelse ($filteredResult as $index => $cashTransaction)
                <tr>
                  <th>{{ $startIndex + $index }}</th>
                  <td class="fw-bold text-uppercase">
                    {{ $cashTransaction->student->name }}
                  </td>
                  <td>{{ local_amount_format($cashTransaction->amount) }}</td>
                  <td>{{ $cashTransaction->date_paid }}</td>
                  <td class="text-center">
                    <span class="badge bg-primary">
                      <i class="bi bi-person-badge-fill"></i>
                      {{ $cashTransaction->createdBy->name }}
                    </span>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center fw-bold">Tidak ada data pada bulan ini</td>
                </tr>
                @endforelse
              </tbody>

              @if($filteredResult->count() > 0)
              <tfoot>
                <tr>
                  <td colspan="2" class="fw-bold">Total</td>
                  <td colspan="3" class="fw-bold">{{ local_amount_format($sumAmountDateRange) }}</td>
                </tr>
              </tfoot>
              @endif

            </table>

            {{ $filteredResult->links(data: ['scrollTo' => false]) }}

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
