@extends('layouts.admin_master')

@section('content')
    

<div class="card-body">
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
                    <th class="border-0 text-uppercase font-weight-bold text-muted">Customer Name</th>
                    <th class="border-0 text-uppercase font-weight-bold text-muted">Email</th>
                    <th class="border-0 text-uppercase font-weight-bold text-muted">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <td class="font-weight-bold text-muted">{{ ++$i }}</td>
                <td class="font-weight-bold text-muted">{{ $user->name }}</td>
                <td class="font-weight-bold text-muted">{{ $user->email }}</td>
                <td class="font-weight-bold">
                <a class="btn btn-sm btn-flat btn-info" href="/admin_galleries/{{ $user->id }}">Add Photos</a>

                </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection