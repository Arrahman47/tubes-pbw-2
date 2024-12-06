@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fa-solid fa-pen-to-square"></i> Edit Role</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5>Ubah Detail Role</h5>
                    <a class="btn btn-secondary btn-sm" href="{{ route('roles.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Role Name Input -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter role name" class="form-control" value="{{ $role->name }}" required>
                    </div>

                    <!-- Permission Section -->
                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissions</label>
                        <div class="row">
                            @foreach($permission as $value)
                                <div class="col-md-4 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="form-check-input" id="permission{{$value->id}}" @if(in_array($value->id, $rolePermissions)) checked @endif>
                                        <label class="form-check-label" for="permission{{$value->id}}">
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-2 mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

