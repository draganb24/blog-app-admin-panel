 @extends('layouts.app')

 @section('content')
     <div class="container">
         <div class="row">
             @foreach ($subcategories as $subcategory)
                 <div class="col-md-6 col-lg-3 mb-4">
                     <div class="card">
                         <a href="{{ route('subcategory.show', $subcategory->slug) }}">
                         <div class="card-body">
                             <h3 class="card-title">{{ $subcategory->name }}</h3>
                                <a href="#" class="btn">
                                  Izmjeni
                                </a>
                                <a href="#" class="btn">
                                  Obriši
                                </a>
                         </div>
                        </a>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 @endsection
