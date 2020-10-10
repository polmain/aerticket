@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">@lang('home.search_header')</div>

                <div class="card-body">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departureAirport">@lang('home.departure_airport')</label>
                                    <input type="text" class="form-control" id="departureAirport" name="departureAirport" placeholder="@lang('home.departure_airport')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="arrivalAirport">@lang('home.arrival_airport')</label>
                                    <input type="text" class="form-control" id="arrivalAirport" name="arrivalAirport" placeholder="@lang('home.arrival_airport')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departureDate">@lang('home.departure_date')</label>
                                    <input type="date" class="form-control" id="departureDate" name="departureDate" placeholder="@lang('home.departure_date')">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">@lang('home.search_btn')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">@lang('home.header_result')</div>

                <div class="card-body" id="result">
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

        $('#search_form').submit(function (e){
            e.preventDefault();
            var query = {
                "searchQuery": {
                    "departureAirport": $('#departureAirport').val(),
                    "arrivalAirport": $('#arrivalAirport').val(),
                    "departureDate": $('#departureDate').val()
                }
            };

            $('#result').html('');

            $.ajax({
                method: "GET",
                url: "{{url('/api/search')}}",
                data: query,
                success: function(resp)
                {
                    var table = $('#result').append(
                        '<table class="table">\n' +
                        '  <thead>\n' +
                        '    <tr>\n' +
                        '      <th>@lang('home.transporter')</th>\n' +
                        '      <th>@lang('home.flight_number')</th>\n' +
                        '      <th>@lang('home.departure_time')</th>\n' +
                        '      <th>@lang('home.arrival_time')</th>\n' +
                        '      <th>@lang('home.duration')</th>\n' +
                        '    </tr>\n' +
                        '  </thead>\n' +
                        '  <tbody></tbody>\n' +
                        '</table>'
                    );
                    resp.searchResults.forEach(function (e){
                        $(table).find('tbody').append(
                            '<tr>\n' +
                            '   <td>'+e.transporter.name+'</td>\n' +
                            '   <td>'+e.flightNumber+'</td>\n' +
                            '   <td>'+e.departureDateTime+'</td>\n' +
                            '   <td>'+e.arrivalDateTime+'</td>\n' +
                            '   <td>'+e.duration+'</td>\n' +
                            '</tr>'
                        );
                    });
                },
                error:  function(xhr, str){
                    Object.entries(xhr.responseJSON.errors).forEach(function(e){
                        $('#result').append('<p class="text-danger text-bold">'+e[1][0]+'</p>');
                    })
                }
            });
            return false;
        });
    </script>
@endpush
