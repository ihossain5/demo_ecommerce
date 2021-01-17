@extends('admin.layouts.main')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Subsubcategory Tables</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Subsubcategory Tables</li>
      </ol>
    </div>

    <div class="row">
      
      <div class="col-lg-12">
        <x-alert/>
        <!-- Simple Tables -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Subsubcategory Tables</h6>        
                <button class="btn btn-facebook" data-toggle="modal" data-target="#exampleModal">Add new</button>          
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>Sl No</th>
                  <th>Name</th>                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
            @if (count($subcategories)>0)
                @foreach ($subcategories as $key=>$subcategory)                
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$subcategory->name}}</td>
                  <td>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="editModal" onclick="editSubCategory({{$subcategory->id}})">Edit</button>
                  </td>
                  <td>
                      
                      <form action="{{route('subcategory.destroy',[$subcategory->id])}}" method="POST">@csrf
                        {{method_field('DELETE')}}
                        <button  type="submit" class="btn btn-danger" >Delete</button>
                      </form>
                  </td>
                  
                </tr>  
                @endforeach  
              @else
                <td>No subcategory created yet</td>                 
           @endif           
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>


   <!-- Add Modal  -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Modal Vertically Centered</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="{{route('subcategory.store')}}" method="POST">@csrf
            <div class="form-group">
              <label for="name">subcategory Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                 @error('name')
                     <span class="text-danger">{{$message}} </span>
                 @enderror
            </div>
            <div class="form-group">
              <label for="">Select Category</label>
              <select name="category" class="form-control @error('category') is-invalid @enderror " id="">
                <option value="">Select Category</option>
                @foreach (App\Models\Category::all() as $category)
                <option value="{{$category->id}} ">{{$category->name}}</option>
                @endforeach 
                
              </select>
                 @error('category')
                     <span class="text-danger">{{$message}} </span>
                 @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info " data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
       </div>
       
     </div>
   </div>
 </div>

   <!-- Edit Modal  -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Edit category</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="{{route('subcategory.update',[$subcategory->id])}}" method="POST">@csrf @method('PUT')
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" name="name" id="edit_name" class="form-control">         
            </div>
            <div class="form-group">
              <label for="desc">Category Description</label>
              <input type="text" name="description" id="edit_desc" class="form-control ">
            </div>
            <div class="modal-footer d-grid gap-2 ">
              <button type="button" class="btn btn-info " data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
       </div>
       
     </div>
   </div>
 </div>


 <script>
   $.ajax({
     url: "{{url('/subcategory/edit/')}}/"+id," 
     type:"GET",
     contentType: false,
     cache:false,
     processData: false,
     dataType:"json",

     sussess:function(response){
        ("#editModal").modal("toggle")
     }
   });
 </script>
@endsection