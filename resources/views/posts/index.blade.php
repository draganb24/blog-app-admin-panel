 @extends('layouts.app')

 @section('content')
     <div class="container">
         <div class="row">
             @foreach ($posts as $post)
                 <div class="col-md-6 col-lg-3 mb-4">
                     <div class="card">
                         @php
                             $imageUrl = App\Models\Image::where('id', $post->image_id)->value('image_path');
                         @endphp
                         <a href="{{ route('posts.show', $post->slug) }}">
                             <div class="img-responsive img-responsive-21x9 card-img-top"
                                 style="background-image: url('{{ $imageUrl }}')"></div>
                         </a>
                         <div class="card-body">
                             <h3 class="card-title">{{ $post->title }}</h3>
                             <p class="text-muted">Author: {{ $post->author }}</p>
                             <p class="text-muted">Created At: {{ $post->created_at }}</p>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 @endsection
