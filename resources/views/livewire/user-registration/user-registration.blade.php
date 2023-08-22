<div>
    @include('livewire.user-registration.edit')
    <div class="row justify-content-center">
        <div class="col">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <span><b> Success - </b> {{session('message')}}</span>
                </div>
            @endif
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">User Registration</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent = "submit">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" wire:model ="first_name">
                                    @error('first_name')
                                    <span class="error text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" wire:model ="last_name">
                                    @error('last_name')
                                    <span class="error text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" class="form-control" placeholder="Age" wire:model ="age" min="1" max="100">
                                    @error('age')
                                    <span class="error text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" wire:model ="gender">
                                        <option value="">Gender</option>
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="error text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" wire:model ="email">
                                    @error('email')
                                    <span class="error text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" wire:model ="password">
                                    @error('password')
                                    <span class="error text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Submit Competitor</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>email</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>
                                        @if($user->gender == 1)
                                            Male
                                        @else
                                            Female
                                        @endif</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="edit btn btn-success btn-round" data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $user->id }})"  href="javascript:;"> Edit </a>
                                        <a class=" btn btn-danger btn-round" href="#" wire:click="$emit('triggerDelete',{{ $user->id }})"> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> 
@section('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', id => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Question will be deleted!',
                type: "warning",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                @this.call('destroy',id)
                    Swal.fire('Deleted!', '', 'success')
                }
            });
        });
        });
      
    window.livewire.on('hideModal', (modalId) => {
        $(modalId).modal('hide');
    });
    </script>
@endsection