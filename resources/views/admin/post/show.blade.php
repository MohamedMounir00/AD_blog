@extends('admin.layouts.app')
@section('head')
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css
')}}">


@endsection
@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           <div class="box">
            <div class="box-header">

           <a class="btn btn-default" href="{{ route('post.create') }}"> Add New Post </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Slug</th>
                  <th>Created_at</th>
                  <th>Edtie</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
            <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{$post->created_at}}</td>
                 <td><a href="{{  route('post.edit',$post->id) }}" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"></span> Edite</a> </td>


                  <td>
                    <form id="delete-form-{{$post->id}}" method="post" action="{{ route('post.destroy',$post->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href=""  onclick="if(confirm('Are you sure , went to delete this?')){event.preventDefault() ;document.getElementById('delete-form-{{ $post->id }}').submit();}else{event.preventDefault();}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Delete</a> </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>S.No</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Slug</th>
                  <th>Created_at</th
                  <th>Edtie</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


  @endsection

  @section('footer')
  <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script>
  $(function () {
    $('#example1').DataTable()
    
  })
</script>
  @endsection
