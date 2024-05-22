@extends('auth.layouts')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 login-image">
        </div>
                <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                       ¡Has iniciado sesión!
                    </div>       
                @endif                
            </div>
        </div>
    </div>    
</div>
            </div>
        </div>
    </div>
</div>
@endsection