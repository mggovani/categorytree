@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="{{route('category')}}" class="btn btn-dark">Category</a>
                    <a href="{{route('subcategory')}}" class="btn btn-dark">SubCategory</a>
                    <a href="{{route('item')}}" class="btn btn-dark">Item</a>
                    <a href="{{route('tree')}}" class="btn btn-dark">Tree</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
