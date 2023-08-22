<div class="content">
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span><b> Success </b> Subject Has Been Created Succesfully. </span>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="default" id="hideshow">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title"><i class="las la-book"></i> Add Subjects</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-6 pl-3 pr-3">
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <select class="form-control" wire:model.defer="subject_name" aria-label="Enter a Subject Name">
                                            <option selected>Enter a Subject Name</option>
                                            <option value="English">English</option>
                                            <option value="Science">Science</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Filipino">Filipino</option>
                                          </select>
                                          @error('subject_name')
                                          <span class="text-danger error">{{$message}}</span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Grade Level</label>
                                        <select class="form-control" wire:model ="grade_id">
                                            <option value="">Grades</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('grade_id')
                                        <span class="text-danger error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                          
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round"><i
                                                class="nc-icon nc-check-2"></i> Comfirm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nc-icon nc-paper"></i>Subjects</h4>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th></th>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Grade</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td></td>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>{{$subject->subject_code}}</td>
                                    <td>{{$subject->grade->grade_name}}</td>
                                    <td><a class=" btn btn-danger btn-round" href="#"
                                           wire:click="$emit('triggerDelete',{{ $subject->id }})"> Delete </a></td>
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
                text: 'Subject record will be deleted!',
                type: "warning",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                @this.call('destroy', id)
                    Swal.fire('Deleted!', '', 'success')
                }
            });
        });
        });
    </script>
@endsection
