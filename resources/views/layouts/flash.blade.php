@if($flash = session('message'))
    <br>
    <div class="alert alert-danger" role="alert" style="display:inline-block;position: relative">
        {{ $flash }}
    </div>
@endif

@if($flash = session('confirmation'))
    <br>
    <div class="alert alert-success" role="alert" style="display:inline-block;position: relative">
        {{ $flash }}
    </div>
@endif

@if($flash = session('deletion'))
    <br>
    <div class="alert alert-success" role="alert" style="display:inline-block;position: relative">
        {{ $flash }}
    </div>
@endif

@if($flash = session('logout'))
    <div class="alert alert-success" role="alert" style="display:inline-block;position: relative">
        {{ $flash }}
    </div>
@endif