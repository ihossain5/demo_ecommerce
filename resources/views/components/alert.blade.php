<div>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible shadow-lg p-3 mb-5 rounded" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('success'))  
<div class="alert alert-info alert-dismissible shadow-lg p-3 mb-5 rounded" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

@if (session('message'))  
<div class="alert alert-success alert-dismissible shadow-lg p-3 mb-5 rounded" role="alert">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
</div>