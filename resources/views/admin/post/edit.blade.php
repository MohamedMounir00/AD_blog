@extends('admin.layouts.app')

@section('main-content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">


       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        @include('includes.message')
        <form role="form" action="{{ route('post.update',$post->id) }} " method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}


          <div class="box-body">
           <div class="col-lg-6">
            <div class="form-group">
              <label for="title"> Post Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$post->title}}">
            </div>
            <div class="form-group">
              <label for="subtitle"> Post sub Title</label>
              <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle" value="{{$post->subtitle}}">
            </div>

            <div class="form-group">
              <label for="slug"> Post Slug</label>
              <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="{{$post->slug}}">
            </div>


          </div>
          <div class="col-lg-6">
            <br>
            <div class="form-group">
              <div class="pull-right">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" name="image">
              </div>



              <div class="checkbox pull-left">
                <label>
                  <input type="checkbox" name="status" value="1" @if($post->status == 1){{ 'checked' }} @endif> Publish
                </label>
              </div>
            </div>

            <br>

            <div class="form-group" style="margin-top: 18px;">
              <label>Select tags</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
            name="tags[]"  style="width: 100%;">
              @foreach($tags as $tag)
              <option value="{{$tag->id}}" 
              @foreach($post->tags as $postTag)
              @if($postTag->id == $tag->id)
              selected
              @endif
              @endforeach
                >{{ $tag->name }}</option> 

              @endforeach
             
            </select>
          </div>

          <div class="form-group" style="margin-top: 18px;">
            <label>Select Catagory</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
           name="cats[]" style="width: 100%;">
              @foreach($cats as $cat)
              <option value="{{$cat->id}}"

   @foreach($post->cats as $postCat)
              @if($postCat->id == $cat->id)
              selected
              @endif
              @endforeach

                >{{ $cat->name }}</option> 
              @endforeach
          </select>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Bootstrap WYSIHTML5
          <small>Simple and fast</small>
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>

        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <textarea   name="body" placeholder="Place some text here"
        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ $post->body }}</textarea>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-warning" href='{{ route('post.index') }}'> Back </a>

    </div>
  </form>
</div>
<!-- /.box -->


</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</div>


@endsection()
