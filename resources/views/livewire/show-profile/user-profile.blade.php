
<div class="content">
  @if(session('message'))
  <div class="alert alert-success alert-dismissible fade show">
      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
          <i class="nc-icon nc-simple-remove"></i>
      </button>
      <span><b> Success -  </b> {{session('message')}}</span>
  </div>
  @endif
  @include('livewire.show-profile.edit')
    <div class="row">
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="../assets/img/damir-bosnjak.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="../assets/img/admin.jfif" alt="...">
                <h5 class="title">{{$profile->full_name}}</h5>
              </a>
              <p class="description">
                {{$profile->email}}
              </p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">My Subjects</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled team-members">
              @foreach ($subjects as $subject)
              <li>
                <div class="row">
                  <div class="col-md-2 col-2">
                    <div class="avatar">
                      <img src="../assets/img/faces/subject.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                  </div>
                  <div class="col-md-7 col-7">
                    {{$subject->subject_name}}
                    <br />
                    <span class="text-muted"><small>{{$subject->grade->grade_name}}</small></span>
                  </div>
                </div>
              </li> 
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">My Profile</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Email" value="{{$profile->email}}">
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>Date Joined</label>
                    <input type="text" class="form-control" placeholder="Last Name" value="{{$profile->created_at}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="Company" value="{{$profile->first_name}}">
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" value="{{$profile->last_name}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>Gender</label>
                    <select id="single" class="form-control select2">
                      @if($profile->gender == 1){
                          <option value="1" selected>Male</option>
                          <option value="0" >Female</option>
                      }
                      @else
                          <option value="0" selected>Female</option>
                          <option value="1" >Male</option>
                  
                      @endif
                  </select>
                  </div>
                </div>
                <div class="col-md-6 pl-1">
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" placeholder="Country" value="{{$profile->age}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <a class="edit btn btn-success" data-toggle="modal" data-target="#updateModal" wire:click="editProfile({{ $profile->id }})"  href="javascript:;"> Edit </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@section('scripts')
  <script type="text/javascript">
    window.livewire.on('hideModal', (modalId) => {
        $(modalId).modal('hide');
    });
</script>
@endsection
