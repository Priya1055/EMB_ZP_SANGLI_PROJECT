@extends('layouts.header')

@section('content')
<div class="container-fluid" style="margin-top:20px;">
        <table class="table">
            <thead>
                <tr class="table-success" style="background-color: #333; color: #fff;" >
                    <th>Sr No</th>
                    <th>Item of Work</th>
                    <th>Executed Quantity</th>
                    <th>Theoretical Rate Of Consumption</th>
                    <th>Theoretical Consumption</th>
                    <th>Actual Rate Of Consumption</th>
                    <th>Actual Consumption</th>
                    <th>Unit</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will go here -->
            </tbody>
        </table>
    </div>


@endsection