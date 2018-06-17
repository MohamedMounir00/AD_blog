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

                     <form role="form" action="{{ route('role.update',$role->id) }} " method="POST">
                          {{ csrf_field() }}  
                          {{method_field('PUT')}}            
                          <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="role"> Role</label>
                  <input type="text" class="form-control" id="role" name="name" placeholder="Enter title" value="{{ $role->name }}">
                </div>
                 <div class="form-group">
                  <label for="slug"> Post slug</label>
                 
                </div>
             <div class="row">
                                <div class="col-lg-4">
                                  <label for="name">Posts Permissions</label>
                                  @foreach ($permissions as $permission)
                                    @if ($permission->for == 'post')
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                        @foreach ($role->permissions as $role_permit)
                                          @if ($role_permit->id == $permission->id)
                                            checked
                                          @endif
                                        @endforeach
                                        >{{ $permission->name }}</label>
                                      </div>
                                    @endif
                                  @endforeach
                                </div>
                                <div class="col-lg-4">
                                  <label for="name">User Permissions</label>
                                    @foreach ($permissions as $permission)
                                      @if ($permission->for == 'user')
                                        <div class="checkbox">
                                          <label><input type="checkbox" name='permission[]' value="{{ $permission->id }}"
                                          @foreach ($role->permissions as $role_permit)
                                            @if ($role_permit->id == $permission->id)
                                              checked
                                            @endif
                                          @endforeach
                                          >{{ $permission->name }}</label>
                                        </div>
                                      @endif
                                    @endforeach
                                </div>

                                <div class="col-lg-4">
                                  <label for="name">User Permissions</label>
                                    @foreach ($permissions as $permission)
                                      @if ($permission->for == 'other')
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                          @foreach ($role->permissions as $role_permit)
                                            @if ($role_permit->id == $permission->id)
                                              checked
                                            @endif
                                          @endforeach
                                          >{{ $permission->name }}</label>
                                        </div>
                                      @endif
                                    @endforeach
                                </div>
                              </div>
            
               <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href='{{ route('role.index') }}'> Back </a>

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
