<div class="col-md-12">
    @include('livewire.show-room.edit')
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
            <h5 class="card-title">Room</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row justify-content-center">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Room Name</label>
                            <input type="text" class="form-control" placeholder="Insert your Question Here." wire:model ="room_title">
                            @error('room_name')
                            <span class="text-danger error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>Grade</label>
                            <select class="form-control" wire:model ="filterbygrade">
                                <option value="">Grades</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                @endforeach
                            </select>
                            @error('filterbygrade')
                                <span class="text-danger error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    @if(!is_null($filteredSubject))
                        <div class="col-md-2 pr-1">
                            <div class="form-group">
                                <label>Subject</label>
                                <select class="form-control" wire:model ="filterBySubject">
                                    <option value="">Subject</option>
                                    @foreach($filteredSubject as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                                @error('filterBySubject')
                                <span class="text-danger error">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Question Name</th>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>Answers</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                @if(!is_null($filteredQuestions))
                                @foreach($filteredQuestions as $question)
                                    <tr>
                                        <td>{{$question->question_name}}</td>
                                        <td>{{$question->subject->subject_name}}</td>
                                        <td>{{$question->subject->grade->grade_name}}</td>
                                        <td>
                                            @foreach($question->answers->all() as $answer)
                                                @if($answer->status == 1)
                                                    <span class="text-success">{{$answer->answer_name}} | </span>
                                                @else
                                                    <span class="text-danger">{{$answer->answer_name}} | </span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <input type="checkbox" wire:model = "checkbox.{{$question->id}}">
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round" wire:click.prevent = "submit()">Create Room</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <div class="card card-user">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table overflow-auto" >
                        <thead class=" text-primary">
                        <th>Room Name</th>
                        <th>Room Code</th>
                        <th>Grade</th>
                        <th>Subject</th>
                        <th>Questions</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>

                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->room_name}}</td>
                                <td>{{$room->room_code}}</td>
                                <td>{{$room->subject->grade->grade_name}}</td>
                                <td>{{$room->subject->subject_name}}</td>
                                <td>
                                    @foreach($room->questions->all() as $question)
                                        <span class="text-success">{{$question->question_name}} | </span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="edit btn btn-success btn-round " wire:click="edit({{ $room->id }})"  href="javascript:;" onclick="show()"> Edit </a>
                                    <a class=" btn btn-danger btn-round" href="#" wire:click="$emit('triggerDelete',{{ $room->id }})"> Delete </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

         {{-- <--start edit--> --}}
    <div class="default" id="hideshow">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Edit Room</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-7 pr-1">
                            <div class="form-group">
                                <label>Room Name</label>
                                <input  name="first_name"  class="form-control"  wire:model.defer="room_name" />
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <div class="form-group">
                                <label>Room Code</label>
                                <input  name="last_name"  class="form-control"  wire:model.defer="room_code" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 pr-1">
                            <div class="form-group">
                                <label>Subject</label>
                                <input  name="last_name"  class="form-control"  wire:model.defer="subject_name"  disabled/>
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <div class="form-group">
                                <label>Grade</label>
                                <input  name="last_name"  class="form-control"  wire:model.defer="grade_name"  disabled/>
                            </div>
                        </div>
                    </div>
                    @foreach($question_name as $question)
                    <div class="row">
                        <div class="col-md-10 pr-1">
                            <div class="form-group">
                                <label>Question</label>
                                <input  name="answer_name"  class="form-control" value="{{$question->question_name}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-2 mt-3">
                            <div class="form-group">
                                <a class=" btn btn-danger" href="#" wire:click="$emit('triggerDeleteQuestion',{{ $question->id }})">Remove</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="button" class="btn btn-primary font-weight-bold" wire:click.prevent="update()">Save changes</button>
                            <button type="button" class="btn btn-danger font-weight-bold" onclick="hide()">Cancel</button>
                        </div>
                    </div>
                </form>
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
                text: 'Room will be destroyed!',
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

        document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDeleteQuestion', id => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Question will be destroyed!',
                type: "warning",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                @this.call('destroyQuestion',id)
                    Swal.fire('Deleted!', '', 'success')
                }
            });
        });
        });

        $('.default').hide();
            $(document).ready(function(){
            $("#show").click(function(){
                $("#hideshow").show();
               
            });
            $("#hide").click(function(){
                $("#hideshow").hide();
            });

            });
    </script>
@endsection