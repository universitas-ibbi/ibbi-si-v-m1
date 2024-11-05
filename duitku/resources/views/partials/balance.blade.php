<div class="text-center mt-4">
    <h2>Your Balance</h2>
    <p class="fs-2 fw-bold">Rp
        {{ number_format(
            $duit->where('type', 'income')->sum('amount') - $duit->where('type', 'expense')->sum('amount'),
        ) }}
    </p>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="card-title"><i class="bi-arrow-up"></i> INCOMES</div>
                    <div class="card-text text-success fs-2 fw-bold">Rp
                        {{ number_format($duit->where('type', 'income')->sum('amount')) }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="card-title"><i class="bi-arrow-down"></i> EXPENSES</div>
                    <div class="card-text text-danger fs-2 fw-bold">Rp
                        {{ number_format($duit->where('type', 'expense')->sum('amount')) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
