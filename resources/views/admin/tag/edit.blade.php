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
                     <form role="form" action="{{ route('tag.update',$tag->id) }} " method="POST">

                          {{ csrf_field() }}  
                                                                          {{ method_field('PATCH') }}
            <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="tag"> Post tag</label>
                  <input type="text" class="form-control" id="tag" name="name" placeholder="Enter title" value="{{ $tag->name }}">
                </div>
                 <div class="form-group">
                  <label for="slug"> Post slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="{{ $tag->slug }}">
                </div>
             
            
               <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href='{{ route('tag.index') }}'> Back </a>

              </div>




                     </div>
             
          </div>
              <!-- /.box-body -->
     
            
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
