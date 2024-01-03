<div>
    <div class="row">
        @forelse ($histories as $item)
        <div class="col-md-3">
            <div class="card border border-primary">
                <div class="card-header">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">Pemesanan</div>
                            <div class="col-md-6">
                                <span class="float-end">{{ \Carbon\Carbon::parse($item->order_date)->format('d-m-Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nomor Meja <span class="float-end">{{ $item->table_number }}</span></li>
                    <li class="list-group-item">Nama Pemesan <span class="float-end">{{ $item->order_name }}</span></li>
                    <li class="list-group-item">Status <span class="float-end">{{ $item->status }}</span></li>
                    <li class="list-group-item">Total Harga <span class="float-end">Rp. {{ rupiah($item->grand_total) }}</span></li>
                </ul>
                <div class="card-footer">
                    <a href="{{ route('admin.order.detail', [$item->_id, 'history']) }}" class="btn btn-primary float-end">Detail Pesanan</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="alert alert-danger text-center">Tidak Ada Riwayat Pemesanan</div>
        </div>
        @endforelse
    </div>
</div>
