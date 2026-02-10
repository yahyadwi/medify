<div class="card mb-3">
    <div class="card-body">

        <h5 class="mb-3">Filter</h5>

        <div class="row align-items-end">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" class="form-control" id="filter-kode">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="filter-nama">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Harga Min</label>
                    <input type="number" class="form-control" id="filter-harga-min">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Harga Max</label>
                    <input type="number" class="form-control" id="filter-harga-max">
                </div>
            </div>

            <div class="col-md-2 d-flex gap-2">
                <button class="btn btn-primary btn-get-data w-100">
                    Filter
                </button>

                <a href="{{ url('master-items/export-excel') }}" class="btn btn-success w-100">
                    Excel
                </a>
            </div>
        </div>

        <div class="mt-2">
            <span id="loading-filter" class="text-muted" style="display:none;">
                Loading...
            </span>
        </div>

    </div>
</div>