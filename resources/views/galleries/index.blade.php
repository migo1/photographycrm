@extends('layouts.master')

@section('content')
 
<div class="mb-2">
        <h4 class="float-left text-uppercase" >{{ auth()->user()->name }}'s photos</h4>  
      
        
        </div>

        <br>
<div class="row el-element-overlay">
        @foreach ( $images as $gallery)
    <div class="col-lg-3 col-md-6 mt-2">
        <div class="card">
            <div class="el-card-item">
                    @php
                    $pic_url =  asset('./assets/images/users/noimage.jpg');
                    if($gallery->image){
                        $pic_url =  "/public/cover_images/".$gallery->image;
                   }

                @endphp
                <div class="el-card-avatar el-overlay-1"> <img src="{{ $pic_url }}" alt="user" />
                    <div class="el-overlay">
                        <ul class="list-style-none el-info">
                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ $pic_url }}"><i class="mdi mdi-magnify"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">

                     <button type="button" class="btn btn-sm btn-danger btn-flat"
                     data-mygid = {{ $gallery->id }} 
                     data-toggle="modal" data-target="#delete"
                     >Delete</button>
                </div>
              
            </div>
        </div>
    </div>
    @endforeach
</div>




       <!-- Modal delete-->
       <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('gallery.destroy','test')}}">
                  {{method_field('delete')}}
                  @csrf
                <div class="modal-body mt-0 mb-0">
                  <p class="text-center">
                    Are you sure you want to delete this Image?
                  </p>
                  <input type="hidden" name="gallery_id" id="gallery_id" value="">
                
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
                $('#delete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var gallery_id = button.data('mygid')
                var modal = $(this)
                modal.find('.modal-body #gallery_id').val(gallery_id)
              })
                </script>
@endsection