<div> {{-- ROOT WAJIB UNTUK LIVEWIRE --}}
    
    <div class="page-heading">
        <h3>Master Kategori Pembayaran</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Daftar Kategori Pembayaran</h4>

                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            Tambah Kategori
                        </button>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Harga</th>
                                    <th width="160px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>Rp {{ number_format($category->price, 0, ',', '.') }}</td>

                                        <td>
                                            <button
                                                class="btn btn-success btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                wire:click="$dispatch('edit-category', { id: {{ $category->id }} })"
                                            >
                                                Edit
                                            </button>

                                            <button
                                                class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $category->id }})"
                                            >
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    {{-- Modal Create --}}
                    <livewire:payment-category.payment-category-create />

                    {{-- Modal Edit --}}
                    <livewire:payment-category.payment-category-edit />

                </div>

            </div>
        </section>
    </div>

</div>
