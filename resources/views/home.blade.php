@extends('app')
@section('content')
	

	<div class="container">
  <h2>Get document by Id</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Enter ID
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Get document by Id</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form-inline" method="POST" action="elasticsearch/test">
    		{{ csrf_field() }}
    			<label>ID</label>
    			<input type="text" width = '70px' class="form-control" id="IdUniversity" name = 'IdUniversity' placeholder="Nhập Id..">	
    			<button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
			</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
        
      </div>
    </div>
  </div>
  
</div>

@endsection