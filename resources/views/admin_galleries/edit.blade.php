@extends('layouts.admin_master')

@section('content')
    


<form class="form-horizontal" method="POST" action="/admin_galleries/{{ $gallery->id }}" enctype="multipart/form-data">
        {{method_field('patch')}}
        @csrf
      
<input type="hidden" name="user_id" id="user_id" value="{{$gallery->user->id }}">
      
<div class="form-group row">
        <label  class="col-sm-3 text-right control-label col-form-label">Add Image</label>
        <div class="col-sm-9">
            <input type="file" class="form-control" name="image" value="{{$gallery->image }}"placeholder="car photo...">
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>
      </div>
    </form>
@endsection