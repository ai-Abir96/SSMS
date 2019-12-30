@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Permission Denied') }}</div>

                <div class="card-body">
                    <h1> You are Restricted to Access this Area</h1>
                    <h1> Your User ID is: {{Auth::user()->id}}</h1>
                    <h1> Please Wait Untill You Get Your Role</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
