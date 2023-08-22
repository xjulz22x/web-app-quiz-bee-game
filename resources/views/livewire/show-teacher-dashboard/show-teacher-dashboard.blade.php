<div>
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="las la-door-closed text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Room</p>
                                    <p class="card-title">{{$rooms}}<p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Update Now
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="las la-scroll text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Subjects</p>
                                    <p class="card-title">{{$subjects}}<p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            Last day
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="las la-users text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Competitors</p>
                                    <p class="card-title">{{$competitors}}<p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i>
                            In the last hour
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="las la-question text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Questions</p>
                                    <p class="card-title">{{$questions}}<p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Update now
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Leaderboards</h5>
                        <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="row">
                        <div class="col-md-2 ml-3">
                            <div class="form-group">
                                <label>Filter by:</label>
                                <select class="form-control" wire:model ="filterByGrade">
                                    <option value="">Grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if(!is_null($filteredSubject))
                        <div class="col-md-2 ml-3">
                            <div class="form-group">
                                <label>Filter by:</label>
                                <select class="form-control" wire:model ="filterBySubject">
                                    <option value="">Subject</option>
                                    @foreach($filteredSubject as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        @if(!is_null($filteredRoom))
                            <div class="col-md-2 ml-3">
                                <div class="form-group">
                                    <label>Filter by:</label>
                                    <select class="form-control" wire:model ="filterByRoom">
                                        <option value="">Room</option>
                                        @foreach($filteredRoom as $room)
                                            <option value="{{$room->id}}">{{$room->room_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body ">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th>Age</th>
                                <th scope="col">Scores</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($leaders))
                            @foreach($leaders as $leader)
                                <tr>
                                    <th scope="row">{{$rank++}}</th>
                                    <td>{{$leader->first_name}}</td>
                                    <td>{{$leader->last_name}}</td>
                                    <td>{{$leader->age}}</td>
                                    @if($leader->score != null)
                                        <td>{{$leader->score->score}}</td>
                                    @else
                                    <td>
                                        Not Available
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                           
                        </table>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a class="btn btn-success" wire:click = "exportPDF">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
