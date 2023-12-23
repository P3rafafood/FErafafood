<div>
    <div class="col-md-3">
        <div class="card border border-primary">
            <div class="card-header">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">Pesanan No Meja Customer</div>
                        <div class="col-md-6">
                            <span class="float-end">{{ $order->table_number }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($order->details as $item)
                    <li class="list-group-item">{{ $item->menu->name }} <span class="float-end">{{ $item->qty }}</span></li>
                @endforeach
            </ul>
            <div class="card-footer">
                @if ($from == 'history')
                    <a href="{{ route('admin.order.history') }}" class="btn btn-danger">Back</a>
                @else
                    <a href="{{ route('admin.order.today') }}" class="btn btn-danger">Back</a>
                @endif
            </div>
        </div>
    </div>
</div>
