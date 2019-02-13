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
              <h3>CATEGORY</h3>
            </div>
    <!-- end: BREADCRUMB -->
    <div class="department">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="add-department panel panel-white">
                    <div class="panel-heading">
                        <h5 class="panel-title">ADD CATEGORY </h5>
                    </div>
                    <div class="panel-body" style="padding: 25px">
                        {{Form::open(['url'=>'category_add','method'=>'POST','class'=>'GlobalForm','id'=>'form','files'=>'true'])}}
                        <div class="row">
                            <div class="alert alert-white" id="divi_add" style="margin-top:10px;display: none;">
                                <strong id='msg_add'></strong>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('category','<strong>CATEGORY NAME:</strong>', [], false) }}
                            {{ Form::text('category', null ,array('placeholder' => ' Enter Category',
                            'id' => 'category',
                            'class' => 'form-control',
                            'data-fv-notempty'=>"true",
                            'data-fv-notempty-message'=>"Please enter category" )) }}

                            @if($errors->has('category'))
                            <div class="error text-left" style='color: red'>
                                {{ $errors->first('category') }}
                            </div>
                            @endif
                        </div>
                        <div class="space20">
                            {{ Form::button('ADD', ['type' => 'submit', 'class' => 'btn btn-sm btn-success add-row'] )  }}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="all-department">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">ALL CATEGORIES</h5>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered dt-responsive nowrap" id="data_table" width="100%" cellspacing="0">                                <thead>
                                    <tr>
                                        <th>SR</th>
                                        <th>CATEGORY NAME</th>
                                        <th class="desktop">ACTIONS</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--edit model-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">EDIT CATEGORY</h4>
            </div>

            <div class="modal-body" style="padding: 25px">

                {{ Form::open(['method' => 'PUT','class'=>'GlobalForm','id'=>'form','files'=>'true']) }}
                     <div class="row">
                            <div class="alert alert-white" id="divi" style="margin-top:10px;display: none;">
                                <strong id='msg'></strong>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('category','<strong>CATEGORY NAME:</strong>', [], false) }}
                            {{ Form::text('category', null ,array('placeholder' => ' Enter Category',
                            'id' => 'c_name',
                            'class' => 'form-control',
                            'data-fv-notempty'=>"true",
                            'data-fv-notempty-message'=>"Please enter category" )) }}

                            @if($errors->has('category'))
                            <div class="error text-left" style='color: red'>
                                {{ $errors->first('category') }}
                            </div>
                            @endif
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    CLOSE
                </button>
                <button type="submit" class="btn btn-sm btn-success" id="btn_update">
                    UPDATE
                </button>
            </div>
            {{Form::close()}}

        </div>
    </div>
</div>

<!--delete model-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">DELETE CATEGORY</h4>
            </div>
            <div class="modal-body">
                <label><strong id="del_category"></strong></label><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    CANCEL
                </button>
                <button type="button" class="btn btn-sm btn-success" id="btn_delete">
                    YES
                </button>
            </div>
        </div>
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