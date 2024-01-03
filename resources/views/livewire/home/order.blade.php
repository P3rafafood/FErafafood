<div>
    <x-alert />
    <div class="card mb-3">
        <div class="card-header">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        Pemesanan
                    </div>
                    <div class="col-md-6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#orderModal">
                            Order
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="orderModalLabel">Order</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" id="modalClose"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" style="text-align: center;">HARAP DI ISI</div>
                                            </div>
                                            <div class="card-body">
                                                <form wire:submit='store' method="POST">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="order_name">
                                                                    <i class="bi bi-person"></i>
                                                                </span>
                                                                <input type="text" class="form-control @error('order_name') is-invalid @enderror"
                                                                    placeholder="Nama Pemesan" wire:model='order_name'>
                                                            </div>
                                                            @error('order_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="table_number">
                                                                    <i class="bi bi-journal-richtext"></i>
                                                                </span>
                                                                <input type="number" class="form-control @error('table_number') is-invalid @enderror"
                                                                    placeholder="No Meja" wire:model='table_number'>
                                                            </div>
                                                            @error('table_number')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <label class="input-group-text" for="payment">Metode Pembayaran</label>
                                                                <select class="form-select @error('payment') is-invalid @enderror" id="payment"
                                                                    wire:model='payment'>
                                                                    <option selected>Pilih</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="debit">Debit</option>
                                                                </select>
                                                            </div>
                                                            @error('payment')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cartItems as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>
                                Rp. {{ rupiah($item['price']) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger"
                                    wire:click="removeCart('{{ $item['id'] }}')">Remove</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center;">Belum Ada Pemesanan</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td class="fw-bold" colspan="2">Total Item : {{ Cart::getTotalQuantity()}}</td>
                            <td colspan="2">
                                Rp. {{ Rupiah(Cart::getTotal()) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('close-modal', (event) => {
            document.getElementById('modalClose').click();
        });
    });
    </script>
</div>
