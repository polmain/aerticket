@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'Authorization': 'Bearer {!! auth()->user()->api_token !!}',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "GET",
            url: "{{url('/api/user')}}",
            success: function(resp)
            {
                console.log(resp);
            },
            error:  function(xhr, str){
                console.log(xhr);
            }
        });
    </script>
@endpush
