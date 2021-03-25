@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/basic.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <form action="/file-upload" class="dropzone">
                        <div class="fallback">
                          <input name="file" type="file" multiple accept="image/*" capture/>
                        </div>
                    </form> --}}

                    <div id="myId">
                        
                    </div>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/dropzone.js') }}"></script>

<script>
    $("div#myId").dropzone({ url: "/file/post" });
</script>

@endsection


