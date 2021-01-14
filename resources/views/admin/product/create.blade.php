@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
    </div>
    <div class="row justify-content-center mb-5 rounded">
      <div class="col-lg-10">
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">@csrf
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create </h6>
                  <a class="btn btn-info" href="{{route('products.index')}}">
                    Back
                 </a>
                </div> 
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby=""
                        placeholder="Enter name of product">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file"> 
                          <label for="">Select Category</label>
                          <select name="category_id" class="form-control @error('category') is-invalid @enderror " id="">
                            <option value="">Select Category</option>
                            @foreach (App\Models\Category::all() as $category)
                            <option value="{{$category->id}} ">{{$category->name}}</option>
                            @endforeach 
                            
                          </select>
                          
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                         @enderror
                        </div>
                         
                      </div>
  
                      
                  <div class="form-group">
                    <label for="">Choose Subcategory</label>
                      <select name="subcategory"  class="form-control @error('subcategory') is-invalid @enderror" >
                        <option value="">select</option>
                      </select>
                  </div>
                  <div class="form-group"> 
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="name" aria-describedby=""
                      placeholder="Enter price of product">
                          @error('price')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                         @enderror
                  </div>   
                    <div class="form-group">
                      <label for="summernote">Description</label>
                      <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                                                          
                    <div class="form-group mb-5">
                        <div class="custom-file"> 
                          <input type="file"onchange="preview_image(event)"  class="custom-file-input @error('image') is-invalid @enderror " id="customFile" name="image">
                          <img id="output_image"/ width="180px;" height="120" class="m-3 mb-5">
                          <label  class="custom-file-label " for="customFile">Choose file</label>
                           @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                         @enderror
                        </div>
                         
                      </div>
 
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>

          </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
      $('select[name="category_id"]').on('change', function() {
          var catId = $(this).val();
          if(catId) {
              $.ajax({
                  url: "/subcategories/"+catId,
                  type: "GET",
                  dataType: "json",
                  success:function(data) {
                      $('select[name="subcategory"]').empty();
                      $.each(data, function(key, value) {
                          $('select[name="subcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                      });


                  }//success close
              });
          }else{ //if close and starts
              $('select[name="subcategory"]').empty();
          }
      });
  });
</script>
@endsection