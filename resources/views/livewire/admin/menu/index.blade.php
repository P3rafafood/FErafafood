<div>
    <x-alert />
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">Menu Manager Admin</div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.menu.create') }}" class="btn btn-sm btn-primary float-end">Create Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $menu->image }}" alt="{{ $menu->name }}" height="100px">
                        </td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->desc }}</td>
                        <td>Rp. {{ rupiah($menu->price) }}</td>
                        <td>{{ $menu->type }}</td>
                        <td>
                            <a href="{{ route('admin.menu.edit', $menu->_id) }}" class="btn btn-sm btn-warning text-white">
                                Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" wire:click="delete('{{ $menu->_id }}')"
                            wire:confirm="Apa kamu yakin ingin menghapus menu ini?">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
