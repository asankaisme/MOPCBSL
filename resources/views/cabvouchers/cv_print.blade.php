@extends('layouts.A4')

@section('body-content')
<div class="row"  style="justify-content: center; text-align:center;">
    <h3>Vehicle Request Form</h3>
</div>
<div class="row">
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th colspan="4" style="background-color: black; color: white; text-align: left;">01. Requester Details</th>
            </tr>
            <tr>
                <th style="width: 25%;">01. 01. Department</th>
                <th style="width: 25%;"></th>
                <th style="width: 25%;">01.02. Ext/ TP No:</th>
                <th style="width: 25%;"></th>
            </tr>
        </thead>
    </table>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th rowspan="4" style="width: 20%; text-align: left;">01.03. Names and ID Numbers of users of transport facility</th>
                <th  style="width:5%;">i</th>
                <th style="width:35%; text-align: left;">{{ $cabVoucher->UserRequested->name }}</th>
                <th style="width:5%;">iv</th>
                <th style="width:35%;"></th>
            </tr>
            <tr>
                <td>ii</td>
                <td></td>
                <td>v</td>
                <td></td>
            </tr>
            <tr>
                <td>iii</td>
                <td></td>
                <td>vi</td>
                <td></td>
            </tr>
            <tr>
                <td>iv</td>
                <td></td>
                <td>vii</td>
                <td></td>
            </tr>
        </thead>
    </table>
</div>


@endsection
