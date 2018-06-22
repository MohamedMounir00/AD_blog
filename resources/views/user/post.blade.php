@extends('user.app')


@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('sub-heading',$post->subtitle)
@section('main-content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1553338148109593&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       <small>Created at {{ $post->created_at }}  </small>
       @foreach($post->cats as $cat)
       <small class="pull-right" style="margin-right:20px; ">

        <a href="{{ route('cat',$cat->slug) }}"> {{ $cat->name}}</a>
        </small>

       @endforeach
       {!!htmlspecialchars_decode($post->body)!!}
       <h3>Tags Clouds</h3>
       @foreach($post->tags as $tag)
       <small class="pull-left" style="margin-right:20px; border-radius: 5px; border:1px solid gray; padding: 5px; ">

         <a href="{{ route('tag',$tag->slug) }}">{{ $tag->name }}</a>
       </small>

       @endforeach
     </div>
     <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="12"></div>

   </div>
 </div>
</article>




@endsection