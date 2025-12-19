<div>
  <div wire:ignore.self data-bs-backdrop="static" class="modal fade" id="createModal" tabindex="-1"
    aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Tambah Data Transaksi Kas</h1>
          <button wire:loading.attr="disabled" type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form wire:submit="save">

            <div class="row">

              {{-- PILIH PELAJAR --}}
              <div wire:ignore class="col-md-6">
                <x-forms.select-with-icon 
                    wire:model.blur="form.student_ids" 
                    label="Pilih Pelajar"
                    name="form.student_ids" 
                    icon="bi bi-people-fill" 
                    multiple>
                  
                  @foreach ($students as $student)
                    <option value="{{ $student->id }}">
                      {{ $student->identification_number }} - {{ $student->name }}
                    </option>
                  @endforeach

                </x-forms.select-with-icon>
                <div class="form-text">Pilih 1 atau lebih pelajar di atas.</div>
              </div>

              <div class="col-sm-12 col-md-6">

                {{-- KATEGORI --}}
                <div class="mb-3">
                  <label class="form-label">Kategori Tagihan</label>
                  <select class="form-select" wire:model="form.payment_category_id" wire:change="updateAmount">
    <option value="">-- Pilih Kategori --</option>

    @foreach ($paymentCategories as $category)
      <option value="{{ $category->id }}">
        {{ $category->name }}
      </option>
    @endforeach
</select>

                  @error('form.payment_category_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                {{-- AMOUNT --}}
                <div class="mb-3">
                  <label class="form-label">Tagihan</label>
                  <input 
                      type="number" 
                      class="form-control" 
                      wire:model="form.amount" 
                      readonly>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                  <label class="form-label">Pilih Tanggal:</label>
                  <input 
                    wire:model.blur="form.date_paid" 
                    type="date"
                    class="form-control @error('form.date_paid') is-invalid @enderror">

                  @error('form.date_paid')
                    <div class="d-block invalid-feedback fw-bold">{{ $message }}</div>
                  @enderror
                </div>

                {{-- CATATAN --}}
                <x-forms.textarea-with-icon 
                    label="Catatan" 
                    name="form.transaction_note"
                    placeholder="Masukan catatan.. (opsional)" 
                    icon="bi bi-card-text" 
                    cols="30" 
                    rows="5" />

              </div>

            </div>

            {{-- UPLOAD BUKTI --}}
            <div class="mt-3">
              <label class="form-label">Upload Bukti Pembayaran</label>
              <input type="file" class="form-control" wire:model="form.proof_file">

              @error('form.proof_file')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="modal-footer mt-4">
              <button wire:loading.attr="disabled" type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Tutup</button>

              <button wire:loading.remove type="submit" class="btn btn-primary">
                Simpan
              </button>

              <div wire:loading wire:target="save">
                <button class="btn btn-primary" type="button" disabled>
                  <span class="spinner-border spinner-border-sm"></span>
                  <span>Menyimpan...</span>
                </button>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>
