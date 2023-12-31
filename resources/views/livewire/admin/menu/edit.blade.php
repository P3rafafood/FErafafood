<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">Ubah Data Menu</div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-danger float-end">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit='update' method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('livewire.admin.menu._form')
                </form>
            </div>
        </div>
    </div>
</div>
