@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Edit Category</div>

                 <div class="card-body">
                     <form method="POST" action="{{ route('categories.update', ['category'=>$category]) }}">
                         @csrf

                         <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                             <div class="col-md-6">
                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection

