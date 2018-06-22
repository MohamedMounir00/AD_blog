@extends('user.app')
@section('bg-img',asset('user/img/home-bg.jpg'))

@section('main-content')
@section('head')
<style type="text/css">
  .fa-thumbs-up:hover{
    color:#f41115;
  }
</style>
@endsection

  <div class="container" >
      <div class="row" id="app">
        <div class="col-lg-8 col-md-10 mx-auto">
        <posts 
              v-for='value in blog'
              :title=value.title
              :subtitle=value.subtitle
              :created_at=value.created_at
              :key=value.index
              :post-id = value.id
              login = "{{ Auth::check() }}"
              :likes = value.likes.length
              :slug = value.slug


              ></posts>
          <!-- Pager -->
          <div class="clearfix">
            {{ $posts->links()  }}
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            
          </div>
        </div>
      </div>
    </div>


@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection