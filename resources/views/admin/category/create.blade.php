@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
      
        <form action="" method="POST" enctype="multipart/form-data">@csrf
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>                 
                  <a class="btn btn-info" href="">
                    Back
                  </a>
                </div> 
                
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby=""
                        placeholder="Enter name of category">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                    </div>
                    <div class="form-group">
                      <label for="desc">Description</label>
                      <textarea name="description" id="desc" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-file"> 
                        <input type="file" onchange="previewFile(this);"  class="custom-file-input @error('image') is-invalid @enderror " id="customFile" name="image">
                        <img id="previewImg" width="140" height="80">
                        <label  class="custom-file-label " for="customFile">Choose file</label>
                         @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                       
                    </div>
                   
                    <button type="submit" class=" btn btn-primary mt-5">Submit</button>
                </div>
              </div>
            </form>

          </div>
</div>

@endsection