<div>
    <div wire:ignore.self data-bs-backdrop="static" class="modal fade" id="editModal" tabindex="-1"
         aria-labelledby="editModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5">Ubah Data Transaksi Kas</h1>
                    <button wire:loading.attr="disabled" type="button"
                            class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form wire:submit="edit">
                        <div class="row">

                            {{-- PILIH PELAJAR --}}
                            <div class="col-md-6">
                                <x-forms.select-with-icon 
                                    wire:model.live="form.student_id"
                                    label="Pilih Pelajar"
                                    name="form.student_id"
                                    icon="bi bi-people-fill">

                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->identification_number }} - {{ $student->name }}
                                        </option>
                                    @endforeach

                                </x-forms.select-with-icon>
                                @error('form.student_id') 
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- KATEGORI --}}
                            <div class="col-md-6">
                                <label class="form-label">Kategori Tagihan</label>
                                <select class="form-select"
                                        wire:model.live="form.payment_category_id"
                                        wire:change="updateAmount">

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

                            {{-- TAGIHAN --}}
                            <div class="col-md-6 mt-3">
                                <label class="form-label">Tagihan</label>
                                <input type="number" class="form-control"
                                       wire:model="form.amount" readonly>
                                @error('form.amount')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- TANGGAL --}}
                            <div class="col-md-6 mt-3">
                                <label class="form-label">Tanggal Bayar</label>
                                <input type="date"
                                       wire:model.live="form.date_paid"
                                       class="form-control @error('form.date_paid') is-invalid @enderror">

                                @error('form.date_paid')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- CATATAN --}}
                            <div class="col-md-12 mt-3">
                                <x-forms.textarea-with-icon 
                                    label="Catatan"
                                    name="form.transaction_note"
                                    placeholder="Masukan catatan.. (opsional)"
                                    icon="bi bi-card-text"
                                    cols="30"
                                    rows="4" />
                            </div>

                          {{-- FILE BUKTI BARU --}}
                            <div class="col-md-12 mt-4">
                                <label class="form-label">Upload Bukti Pembayaran Baru</label>
                                <input type="file" class="form-control" wire:model="form.proof_file">

                                @error('form.proof_file')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        {{-- FOOTER --}}
                        <div class="modal-footer mt-4">

                            <button wire:loading.attr="disabled" type="button" 
                                    class="btn btn-secondary" data-bs-dismiss="modal">
                                Tutup
                            </button>

                            <button wire:loading.remove type="submit"
                                    class="btn btn-primary">
                                Simpan Perubahan
                            </button>

                            {{-- LOADING --}}
                            <div wire:loading wire:target="edit">
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
