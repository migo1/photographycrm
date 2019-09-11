@extends('layouts.master')

@section('content')
    


<div class="row">


        <div class="col-sm-12">
            <div class="card card-body">
                <h4 class="card-title">Profile</h4>
                <form class="form-horizontal mt-4" method="POST" action="/profiles/{{ $profile->id }}" enctype="multipart/form-data">
                    {{method_field('patch')}}
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $profile->user->id }}" >
                    <div class="form-group">
                        <label> contacts</label>
                        <input type="text" class="form-control" name="contact" value="{{ $profile->contact }}">
                    </div>
                    <div class="form-group">
                        <label for="example-email">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $profile->address }}">
                    </div>
           
                    <div class="form-group">
                        <label>Bio</label>
                    <textarea class="form-control" rows="5" name="bio" value="{{ $profile->bio }}">{{ $profile->bio }}</textarea>
                    </div>
           
                    <div class="form-group">
                        <label>Default file upload</label>
                    <input type="file" class="form-control" name="image" value="{{ $profile->image }}">
                    </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>

            </div>
                </form>
            </div>
        </div>
    </div






{{ $profile->bio }}

@endsection

