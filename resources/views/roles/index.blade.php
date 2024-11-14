@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Role</h2>
        </div>
        <div class="pull-right">
       
            <a class="btn btn-outline-primary btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Tambah Role</a>
       
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
  <tr>
     <th width="100px">No</th>
     <th>Nama Role</th>
     <th width="280px">Aksi</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
         
     
             <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        

          
            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
      
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->links('pagination::bootstrap-5') !!}


@endsection
