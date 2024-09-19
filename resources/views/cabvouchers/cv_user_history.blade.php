@extends('layouts.A4')

@section('body-content')
<div class="row"  style="justify-content: center; text-align:center;">
    <h4>Cab Voucher Usage History</h4>
</div>
<div class="row">
    <p>User : {{ $user->name }}</p>
    <hr>
</div>
<hr>
<div class="row">
    @php
        $counter =1;
    @endphp
    <table style="border: 1px;" class="table tbl-sm table-striped">
        <thead>
            <th width="5%" style="text-align: right;">#</th>
            <th width="12.5%" style="text-align: right;">CV No.</th>
            <th width="12.5%" style="text-align: right;">Taxi</th>
            <th width="12.5%" style="text-align: right;">Date</th>
            <th width="12.5%" style="text-align: right;">From</th>
            <th width="12.5%" style="text-align: right;">To</th>
            {{-- <th width="12.5%" style="text-align: right;">Distance</th> --}}
            <th width="12.5%" style="text-align: right;">Amount</th>
        </thead>
        <tbody>
            @foreach ($user_cabVouchers as $user_cabVoucher)
                <tr>
                    <td style="text-align: right;">{{ $counter++ }}</td>
                    <td style="text-align: right;">{{ $user_cabVoucher->cv_number }}</td>
                    <td style="text-align: right;">{{ $user_cabVoucher->cv_provider }}</td>
                    <td style="text-align: right;">{{ $user_cabVoucher->requestDate }}</td>
                    <td style="text-align: right;">{{ $user_cabVoucher->cv_from }}</td>
                    <td style="text-align: right;">{{ $user_cabVoucher->cv_to }}</td>
                    {{-- <td style="text-align: right;">{{ $user_cabVoucher->km_done }}</td> --}}
                    <td style="text-align: right;">{{ number_format($user_cabVoucher->amount, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                {{-- <td></td> --}}
                <td></td>
                <td></td>
                <td style="text-align: right;"><b>{{ number_format($user_total, 2) }}</b></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="footer">
    <hr>
    <p style="text-align: center;">All rights reserved. ITD, CBSL</p>
</div>

@endsection
