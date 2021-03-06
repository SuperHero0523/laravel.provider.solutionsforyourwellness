@extends('admin.layouts.default_layout')
@section('content')
@section('title','Template Creation')
{{ Html::script('public/assets/admin/ckeditor/ckeditor.js') }}
<!-- Content Wrapper. Contains page content -->
<style>
.cke_button__imagebutton_icon{
	display:none;
}
</style>
<section id="content">

      <!--breadcrumbs start-->
      <div id="breadcrumbs-wrapper">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 class="breadcrumbs-title">{{ trans('Add Email Template') }}</h5>
              <ol class="breadcrumbs">
                  <li><a href="{{ URL::route('admindashboard')}}">{{ trans('Dashboard') }}</a></li>
                  <li><a href="{{ URL::route('emailtemplateslist')}}">{{ trans('Email Template') }}</a></li>
                  <li class="active">{{ trans('Add Email Template') }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

       <!--start container-->
      <div class="container">
          <!--jqueryvalidation-->
          <div id="jqueryvalidation" class="section">
            <div class="row">
              <div class="col s12 m12 l12">
                  <div class="col s12 m12 l10">
                        <div class="card-panel">
                            <h4 class="header2">Add Email Template</h4>
                            <div class="row">
                                {{ Form::open(['class'=>'form-horizontal','id'=>'user_create_form','files'=>'true','method'=>'post','role' => 'form', 'url' =>URL::route('create_email_template')]) }}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="uname">Template Name*</label>
                                              {{ Form::text('templatename',null, ['class'=>'form-control','id'=>'templatename','placeholder' => 'Enter the template name','autocomplete'=>false]) }}
                                              {{ Form::hidden('action',null, ['class'=>'form-control','id'=>'action','autocomplete'=>false]) }}
                                              @if ($errors->has('templatename')) <p class="help-block">{{ $errors->first('templatename') }}</p> @endif
                                        </div>
                                        <div class="input-field col s12">
                                          <label for="crole">Subject *</label>
                                          {{ Form::text('subject',null, ['class'=>'form-control','id'=>'subject','placeholder' => 'Enter the Subject','autocomplete'=>false]) }}
                                          @if ($errors->has('subject')) <p class="help-block">{{ $errors->first('subject') }}</p> @endif
                                        </div>
                                        <div class="input-field col s8">
                                            <label for="Certificates">Constants</label><br><br>
                                            {{ Form::select('constants',$options,null, ['class'=>'browser-default valid','id'=>'constants']) }}
                                        </div>
                                        <div class="input-field col s4">
                                          <button class="btn waves-effect waves-light green" type="button" onclick="InsertHTML();">Insert Variable
                                          <i class="mdi-content-add-circle left"></i>
                                        </button>
                                        </div>

                                          <div class="input-field col s12">
                                            <label for="Certificates">Action Options</label><br><br>
                                            {{ Form::text('action_constants','', ['class'=>'form-control','id'=>'action_constants','autocomplete'=>false]) }}
                                        </div>
                                        <div class="input-field col s12">
                                            <label for="Certificates">Body</label><br><br>
                                            {{ Form::textarea("body",'', ['id' => 'body']) }}
                                            @if ($errors->has('body')) <p class="help-block">{{ $errors->first('body') }}</p> @endif
                                        </div>
                                         
                                      <script type="text/javascript">
										/* For CKEDITOR */
											
											CKEDITOR.replace( <?php echo 'body'?>,
											{
												//*height: 350,
												//*width: 600,
												filebrowserUploadUrl : '<?php echo URL::to('base/uploder'); ?>',
												filebrowserImageWindowWidth : '640',
												filebrowserImageWindowHeight : '480',
												enterMode : CKEDITOR.ENTER_BR
											});
												
										</script>
                                        <div class="input-field col s12">
                                          {{Form::submit('Submit',['class'=>'btn waves-effect waves-light right green submit','id'=>'createtemplate']) }}
                                          <a href="{{URL::route('emailtemplateslist')}}" class="btn waves-effect waves-light right red">Back</a>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
            </div>
          </div>
          </div>
        </div>
      <!--end container-->
 </section>
<!-- END CONTENT -->
@stop
