<div class="row">
    <div class="col-sm-6">
        <h6>Nama</h6>
        <div class="form-group position-relative has-icon-left">
            <input type="text" class="form-control" placeholder="Menu Name" wire:model='name'>
            <div class="form-control-icon">
                <i class="bi bi-tag"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <h6>Harga</h6>
        <div class="form-group position-relative has-icon-left">
            <input type="number" class="form-control" placeholder="Menu Price" wire:model='price'>
            <div class="form-control-icon">
                <i class="bi bi-cash"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <h6>Deskripsi</h6>
            <textarea class="form-control" id="desc" rows="3" placeholder="Menu Description"  wire:model='desc'></textarea>
        </div>
    </div>
    <div class="col-sm-12">
        <h6>Jenis Menu</h6>
        <fieldset class="form-group">
            <select class="form-select" id="type" wire:model='type'>
                <option>Pilih Jenis Menu</option>
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
                <option value="cemilan">Cemilan</option>
            </select>
        </fieldset>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <h6>Gambar</h6>
            <input class="form-control form-control-sm" id="image" type="file" wire:model='image'>
        </div>
    </div>
    @if (isset($oldImage))
        <div class="col-md-3">
            <img src="{{ $oldImage }}" alt="{{ $name }}" height="100px">
        </div>
    @endif
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
    </div>
</div>
