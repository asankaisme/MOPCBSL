@if (session('msgSuccess'))
    {{-- Successs message --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('msgSuccess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('msgDanger'))
    {{-- Error message --}}
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> {{ session('msgDanger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif (session('msgWarning'))
    {{-- Warning message --}}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Wait!</strong> {{ session('msgWarning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('msgInfo'))
    {{-- Info message --}}
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>FYI!</strong> {{ session('msgInfo') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
