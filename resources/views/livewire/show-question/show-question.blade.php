<div class="col-md-12">

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
            <h5 class="card-title">Questions</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-8 pr-1">
                        <div class="form-group">
                            <label>Question Title</label>
                            <input type="text" class="form-control" placeholder="Insert your Question Here." wire:model ="question_title">
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <div class="form-group">
                            <label>Grades</label>
                            <select type="text" class="form-control" wire:model="filterybygrade">
                                <option value="">Grades</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(!is_null($filteredSubject))
                    <div class="col-md-2 ">
                        <div class="form-group">
                            <label>Grades</label>
                            <select type="text" class="form-control" wire:model="subject_id" >
                                <option value="">Subject</option>
                                @foreach($filteredSubject as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="update col-md-3">
                        <button class="btn btn-success" wire:click.prevent="add({{$i}})">Add Answer</button>
                    </div>
                </div>
                @foreach($inputs as $key => $value)
                <div class="row">
                    <div class="col-md-8 pr-1">
                        <div class="form-group">
                            <label>Answer</label>
                            <input type="text" class="form-control" placeholder="Insert ANSWER here." wire:model = "answer_name.{{$value}}">
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <div class="form-group">
                            <label>Status</label>
                            <select type="text" class="form-control" wire:model = "status.{{$value}}">

                                <option value="">status</option>
                                <option value="1" selected>Correct</option>
                                <option value="0">Wrong</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block" wire:click.prevent = "remove({{$key}})">Remove Answer</button>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round" wire:click.prevent = "submit()">Submit Question</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-user">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Question Name</th>
                        <th>Grade</th>
                        <th>Subject</th>
                        <th>Answers</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->question_name}}</td>
                                <td>{{$question->subject->grade->grade_name}}</td>
                                <td>{{$question->subject->subject_name}}</td>
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
                                    <a class="edit btn btn-success btn-round" wire:click="edit({{ $question->id }})"  href="javascript:;" onclick="show()"> Edit </a>
                                    <a class=" btn btn-danger btn-round" href="#" wire:click="$emit('triggerDelete',{{ $question->id }})"> Delete </a>
                                    
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
                <h5 class="card-title">Edit Questions</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-8 pr-1">
                            <div class="form-group">
                                <label>Question Name</label>
                                <input  name="first_name"  class="form-control"  wire:model.defer="question_name" />
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group">
                                <label>Grades</label>
                                <input  name="last_name"  class="form-control"  wire:model.defer="grade_name" disabled/>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group">
                                <label>Subjects</label>
                                <input  name="last_name"  class="form-control"  wire:model.defer="subject_name"  disabled/>
                            </div>
                        </div>
                    </div>
              
                    @foreach($child_answer as $answer)
                    
                    <div class="row">
                        <div class="col-md-8 pr-1">
                            <div class="form-group">
                                <label>Answer</label>
                                <input  name="answer_name"  class="form-control" value="{{$answer->answer_name}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group">
                                <label>Status</label>
                                <select type="text" class="form-control" wire:model = "status" disabled>
                                    @if($answer->status == 1)
                                    <option value="1" selected>Correct</option>
                                    <option value="0" >Wrong</option>
                                </select>
                                @else
                                    <option value="0" selected>Wrong</option>
                                    <option value="1" selected>Correct</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mt-3">
                            <div class="form-group">
                                <a class=" btn btn-danger" href="#" wire:click="$emit('triggerDeleteAnswer',{{ $answer->id }})">Remove</a>
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

        document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDeleteAnswer', id => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Answer will be removed!',
                type: "warning",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                @this.call('destroyAnswer',id)
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
