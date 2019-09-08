@extends('layouts.admin_master')

@section('content')
    

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <div>
                            <h4 class="card-title">Categories<button type="button" class="btn btn-flat btn-sm btn-success float-right"  data-toggle="modal" data-target="#add_category">Create New</button></h4>
                        </div>
                <div class="d-md-flex align-items-center">
                  
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap v-middle">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 text-uppercase font-weight-bold">No.</th>
                                <th class="border-0 text-uppercase font-weight-bold">Name</th>
                                <th class="border-0 text-uppercase font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <td class="font-weight-bold">{{++$i}}</td>
                            <td class="font-weight-bold">{{$category->name}}</td>
                            <td class="font-weight-bold">
                              <button type="button" class="btn btn-sm btn-flat btn-info"

                              data-mycatid = {{ $category->id }} data-myname = {{ $category->name }} 

                              data-toggle="modal" data-target="#edit_category">Edit</button>
                              
                              <button type="button" class="btn btn-sm btn-flat btn-danger"
                              data-mycatid = {{ $category->id }} 
                
                              data-toggle="modal" data-target="#delete_category"
                              >Delete</button>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div> 



<!-- Modal -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('categories.store')}}">
        <div class="modal-body">
          @csrf
          @include('categories.create')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">Add Category</button>
        </div>
        </form>
      </div>
    </div>
  </div>


        <!-- Modal edit-->
<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Car Make</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('categories.update','test')}}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="category_id" id="category_id" value="">
        
        @include('categories.create')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <!-- Modal delete-->
  <div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('categories.destroy','test')}}">
          {{method_field('delete')}}
          @csrf
        <div class="modal-body mt-0 mb-0">
          <p class="text-center">
            Are you sure you want to delete this car make?
          </p>
          <input type="hidden" name="category_id" id="category_id" value="">
        
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<script>
  $('#edit_category').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var category_id = button.data('mycatid')
  var name = button.data('myname') 
 
  var modal = $(this)
  modal.find('.modal-body #category_id').val(category_id)
  modal.find('.modal-body #name').val(name)
})
  </script>

<script>
  $('#delete_category').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var category_id = button.data('mycatid')
  var modal = $(this)
  modal.find('.modal-body #category_id').val(category_id)
})
  </script>
@endsection