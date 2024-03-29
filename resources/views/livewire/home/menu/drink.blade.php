<div>
    <x-alert />
    <x-menu-header title="Minuman" />
    <div class="row">
        @forelse ($drinks as $drink)
        <div class="col-md-6">
            <div class="card border-warning mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $drink->image }}" class="img-fluid rounded-start" alt="{{ $drink->name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $drink->name }}<span class="float-end">Rp. {{ rupiah($drink->price) }}</h5>
                            <p class="card-text">{{ $drink->desc }}</p>
                            <p class="card-text"><small class="text-body-secondary">&nbsp;</small></p>
                            <button type="button" class="btn btn-warning float-end text-white mb-3" wire:click="addToCart('{{ $drink->_id }}', '{{ $drink->name }}', '{{ $drink->price }}')">Tambah Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="card text-bg-warning text-center">
                <div class="card-header">
                    <div class="card-title text-white text-center">No Data Found</div>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
