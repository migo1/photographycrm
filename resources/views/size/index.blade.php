@extends('layouts.admin_master')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <div>
                            <h4 class="card-title">Available Sizes<button type="button" class="btn btn-flat btn-sm btn-success float-right"  data-toggle="modal" data-target="#add_size">Create New</button></h4>
                        </div>
                <div class="d-md-flex align-items-center">
                  
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap v-middle">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 text-uppercase font-weight-bold">No.</th>
                                <th class="border-0 text-uppercase font-weight-bold">Size</th>
                                <th class="border-0 text-uppercase font-weight-bold">Charges</th>
                                <th class="border-0 text-uppercase font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach( $sizes as $size )
                            <tr>
                            <td class="font-weight-bold">{{ ++$i }}</td>
                            <td class="font-weight-bold">{{ $size->size }}</td>
                            <td class="font-weight-bold">{{ $size->amount }}</td>
                            <td class="font-weight-bold">
                              <button type="button" class="btn btn-sm btn-flat btn-info"

                              data-mysid = {{ $size->id }} data-mysize = {{ $size->size }}  
                              data-myam = {{ $size->amount }}

                              data-toggle="modal" data-target="#edit_size">Edit</button>
                              
                              <button type="button" class="btn btn-sm btn-flat btn-danger"
                            data-mysid = {{ $size->id }} 
                
                              data-toggle="modal" data-target="#delete_size"
                              >Delete</button>
                            </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
              {{$sizes->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add_size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Size</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('sizes.store')}}">
        <div class="modal-body">
          @csrf
          @include('size.create')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">Add Size</button>
        </div>
        </form>
      </div>
    </div>
  </div>

          <!-- Modal edit-->
<div class="modal fade" id="edit_size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Size</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('sizes.update','test')}}">
          {{method_field('patch')}}
          @csrf
        <div class="modal-body">
        <input type="hidden" name="size_id" id="size_id" value="">
          @include('size.edit')
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
    <div class="modal fade" id="delete_size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('sizes.destroy','test')}}">
              {{method_field('delete')}}
              @csrf
            <div class="modal-body mt-0 mb-0">
              <p class="text-center">
                Are you sure you want to delete this size?
              </p>
              <input type="hidden" name="size_id" id="size_id" value="">
            
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
    $('#edit_size').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var size_id = button.data('mysid')
    var size = button.data('mysize') 
    var amount = button.data('myam')
   
    var modal = $(this)
    modal.find('.modal-body #size_id').val(size_id)
    modal.find('.modal-body #size').val(size)
    modal.find('.modal-body #amount').val(amount)
  })
    </script>

<script>
    $('#delete_size').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var size_id = button.data('mysid')

    var modal = $(this)
    modal.find('.modal-body #size_id').val(size_id)
  })
    </script>

@endsection