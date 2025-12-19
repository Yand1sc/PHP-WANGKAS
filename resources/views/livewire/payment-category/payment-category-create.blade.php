<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form wire:submit="save">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" wire:model="price">
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>
