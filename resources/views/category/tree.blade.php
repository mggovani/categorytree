@extends('layouts.admin')
@section('title','Category')
@section('style')
{!! Html::style('bower_components/DataTables/media/css/dataTables.bootstrap.min.css') !!}
{!! Html::style('bower_components/DataTables/media/css/responsive.bootstrap.min.css') !!}
@endsection
@section('content')
<div class="wrap-content" id="container">
    </div>
    <div class="alert alert-white" id="division" style="margin-top:10px;display: none;">
            <strong id='all_msg'></strong>
        </div>
    <div class="head">
              <h3>TREEVIEW</h3>
            </div>
    <!-- end: BREADCRUMB -->
    <div class="department">
        <h4>
            @foreach($category as $cat)
            =>{{$cat->category}}<br>
            @foreach($subcategory as $subcat)
            @if($cat->id == $subcat->category_id)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$subcat->subcategory}}<br>
                @foreach($item as $it)
            @if($subcat->id == $it->subcategory_id)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$it->item}}<br>
                @endif
        @endforeach
                @endif
                
        @endforeach
        @endforeach
        </h4>
    </div>
</div>

@endsection
@section('pagejs')
{{ Html::script('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('bower_components/DataTables/media/js/dataTables.bootstrap.min.js') }}
{{ Html::script('bower_components/DataTables/media/js/dataTables.responsive.min.js') }}
{{ Html::script('bower_components/DataTables/media/js/responsive.bootstrap.min.js') }}
{!! Html::script('bower_components/formValidation/js/formValidation.min.js') !!}
{!! Html::script('bower_components/formValidation/js/framework/bootstrap.min.js') !!}
{!! Html::script('js/category/category_add.js') !!}
{!! Html::script('js/category/category.js') !!}
@endsection