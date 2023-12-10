<div class="alert-group my-2">
    @if (session('status'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="fas fa-check me-2"></i>
            <div>
                {{ session('status') }}
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fas fa-ban me-2"></i>
            <div>
                {{ session('error') }}
            </div>
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="fas fa-check me-2"></i>
            <div>
                {{ session('warning') }}
            </div>
        </div>
    @endif
</div>
