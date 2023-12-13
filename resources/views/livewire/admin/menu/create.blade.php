<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">Tambah Data Menu Restoran</div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-danger float-end">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit='store' method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('livewire.admin.menu._form')
                </form>
            </div>
        </div>
    </div>
</div>
