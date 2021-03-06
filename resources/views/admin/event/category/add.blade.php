@extends('admin.partials.master')

@section('title')
@if(Route::currentRouteName() == 'eventcategory.edit')
Edit Event Category
@else
Add Event Category
@endif

@endsection



@section('stylespagelevel')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('adminassets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('adminassets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('content')

<?php $eventcategory = isset($eventcategory) ? $eventcategory : null;?>
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->

    @if(Route::currentRouteName() == 'eventcategory.edit')
    <h1 class="page-title"> Edit Event Category
        <small>edit event category</small>
    </h1>
    @else
    <h1 class="page-title"> Add Event Category
        <small>add new event category</small>
    </h1>
    @endif

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{route('dashboard')}}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('eventcategory.list')}}">Event Categories</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                @if(Route::currentRouteName() == 'eventcategory.edit')
                <span>Edit Event Category</span>
                @else
                <span>Add Event Category</span>
                @endif

            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-pencil font-dark"></i>
                        @if(Route::currentRouteName() == 'eventcategory.edit')
                        <span class="caption-subject bold uppercase">Edit Event Category</span>
                        @else
                        <span class="caption-subject bold uppercase">Add Event Category</span>
                        @endif
                    </div>
                </div>
                <div class="portlet-body">
                    @if (Session::has('errorCustom'))
                    <div class="alert alert-danger">
                        <p>{{Session::get('errorCustom')}}</p>
                    </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form role="form" action="<?php echo (Route::currentRouteName() == 'eventcategory.edit' ? route('eventcategory.update', $eventcategory->id) : route('eventcategory.store')); ?>" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(Route::currentRouteName() == 'eventcategory.edit')
                        {{ method_field('PATCH') }}
                        @endif

                        <div class="form-body">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control" id="form_control_1" name="title" required="" 
                                       value="<?php echo null !== old('title') ? old('title') : (null !== ($eventcategory) ? $eventcategory->title : null);?>">
                                <label for="form_control_1">Title</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <textarea class="form-control" rows="3" name="description" required="" 
                                          style="margin: 0px -1px 0px 0px; height: 126px; width: 502px;">
                                <?php echo null !== old('description') ? old('description') : (null !== ($eventcategory) ? $eventcategory->description : null);?>
                                </textarea>
                                <label for="form_control_1">Description</label>
                            </div>
                       
                        </div>
                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

</div>
<!-- END CONTENT BODY -->

@endsection


@section('scriptspluginpagelevel')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('adminassets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('scriptspagelevel')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('adminassets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection


