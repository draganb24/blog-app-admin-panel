 @extends('layouts.app')

 @section('content')
     <div class="container">
         <div class="row">
             @foreach ($categories as $category)
                 <div class="col-md-6 col-lg-3 mb-4">
                     <div class="card">
                         <a href="{{ route('category.show', $category->slug) }}">
                         <div class="card-body">
                             <h3 class="card-title">{{ $category->name }}</h3>
                         </div>
                        </a>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 @endsection
