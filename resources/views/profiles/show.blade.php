@extends('layouts.master')

@section('content')
<div class="row">
    <!-- Column        ../../assets/images/users/1.jpg-->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">

                @php
                $pic_url =  asset('./assets/images/users/1.jpg');
                if($user->profiles){
                    $pic_url =  "/public/cover_images/".$user->profiles->image;
               }

            @endphp

              <center class="m-t-30"> <img src="{{ $pic_url }}" class="rounded-circle" width="150" />
                <h4 class="card-title m-t-10">{{ auth()->user()->name }}</h4>
                 @php
                          if ($user->profiles) {
                            $identity = $user->profiles->id;
                          }else {
                            $identity = "{{$user->id}}";
                          }
                      @endphp

         
                <a class="btn btn-sm btn-info btn-flat" href="/profiles/{{ $user->id }}/edit">Edit Your Profile</a>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6>{{ auth()->user()->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                @php
                if ($user->profiles) {
                  $contact = $user->profiles->contact;
                }else {
                  $contact = '';
                }
            @endphp
                <h6>{{ $contact }}</h6> <small class="text-muted p-t-30 db">Address</small>
                @php
                if ($user->profiles) {
                  $address = $user->profiles->address;
                }else {
                  $address = '';
                }
            @endphp
                <h6>{{ $address}}</h6>
             {{-- @php
                          if ($user->profiles) {
                            $mobile_number = $user->profiles->contact;
                          }else {
                            $mobile_number = '';
                          }
                      @endphp

            {{ $mobile_number}}--}}
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tabs -->
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Photo shoots</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
            </ul>
            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                        </div><br />
                        @endif
                            <div>
                                    <h4 class="card-title">photoshoot History<button type="button" class="btn btn-flat btn-sm btn-success float-right"  data-toggle="modal" data-target="#book">Book A photoshoot</button></h4>
                                </div>
                        <div class="d-md-flex align-items-center">
                          
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">No.</th>
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">category</th>
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">Date</th>
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">Time</th>
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">Total Photos</th>
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">Charges</th>
                                        <th class="border-0 text-uppercase font-weight-bold text-muted">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $book)
                                    <tr>
                                    <td class="font-weight-bold text-muted">{{ ++$i }}</td>
                                    <td class="font-weight-bold text-muted">{{ $book->category->name }}</td>
                                    <td class="font-weight-bold text-muted">{{ $book->date }}</td>
                                    <td class="font-weight-bold text-muted">{{ $book->time }}</td>
                                    <td class="font-weight-bold text-muted">{{ $book->total_photos }}</td>
                                    <td class="font-weight-bold text-muted">{{ $book->charges }}</td>
                                    <td class="font-weight-bold">
                                  
        
                                    {{--  <button type="button" class="btn btn-sm btn-flat btn-info"
        
                                      data-mybid = "{{ $book->id }}"  data-myuid = "{{ $book->user_id }}" data-mycid = "{{ $book->category_id }}" 

                                      data-mysid = "{{ $book->size_id }}" data-mydate = "{{ $book->date }}" data-mytime = "{{ $book->time }}" 

                                      data-mycharge = "{{ $book->charges }}" data-myphoto = "{{ $book->total_photos }}"

        
                                      data-toggle="modal" data-target="#edit_book">Edit</button>--}}
                                        <a href="#" class="btn btn-sm btn-flat btn-info">Checkout`</a>

                                      <button type="button" class="btn btn-sm btn-flat btn-danger"
                                      data-mybid = "{{ $book->id }}" 
                        
                                      data-toggle="modal" data-target="#delete"
                                      >Delete</button>
                                    </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{ $user->name }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                <br>
                                <p class="text-muted">{{ $contact }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                <br>
                                <p class="text-muted">{{ $address }}</p>
                            </div>
                        </div>
                        <hr>
                        <p>Bio</p>

                        @php
                        if ($user->profiles) {
                          $bio = $user->profiles->bio;
                        }else {
                          $bio = '';
                        }
                    @endphp
                      <p class="m-t-30">{{ $bio }}</p>
                        <hr>                        
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Column -->
</div>



<!-- Modal -->
<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book Photoshoot</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    
        <form class="form-horizontal" method="POST" action="{{ route('bookings.store')}}">
        <div class="modal-body">
          @csrf
          @include('bookings.create')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">Book</button>
        </div>
        </form>
      </div>
    </div>
  </div>


          <!-- Modal edit-->
<div class="modal fade" id="edit_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit your Booking</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('bookings.update','test')}}">
              {{method_field('patch')}}
              @csrf
            <div class="modal-body">
            <input type="hidden" name="book_id" id="book_id" value="">
              
              @include('bookings.edit')
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
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Cancel Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('bookings.destroy','test')}}">
              {{method_field('delete')}}
              @csrf
            <div class="modal-body mt-0 mb-0">
              <p class="text-center">
                Are you sure you want to cancel this appointment?
              </p>
              <input type="hidden" name="book_id" id="book_id" value="">
            
            </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm btn-flat" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Cancel</button>
            </div>
          </form>
          </div>
        </div>
      </div>



      <script>
            $('#edit_book').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var book_id = button.data('mybid')
            var user_id = button.data('myuid')
            var category_id = button.data('mycid')
            var size_id = button.data('mysid')
            var date = button.data('mydate')
            var time = button.data('mytime')
            var total_photos = button.data('myphoto')
            var charges = button.data('mycharge')
           
            var modal = $(this)
            modal.find('.modal-body #book_id').val(book_id)
            modal.find('.modal-body #user_id').val(user_id)
            modal.find('.modal-body #category_id').val(category_id)
            modal.find('.modal-body #size_id').val(size_id)
            modal.find('.modal-body #date').val(date)
            modal.find('.modal-body #time').val(time)
            modal.find('.modal-body #total_photos').val(total_photos)
            modal.find('.modal-body #charges').val(charges)

            
          })
            </script>

<script>
        $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var book_id = button.data('mybid')

        var modal = $(this)
        modal.find('.modal-body #book_id').val(book_id)
      })
        </script>
@endsection