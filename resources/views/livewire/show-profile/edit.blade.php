<!-- Modal-->
<div wire:ignore.self  class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title caption-subject font-red sbold uppercase" id="updateModal">Update</h5>
            </div>
            <form>
               <div class="modal-body">
                    <div class="form-group">
                        <label>Email<span class="text-danger">*</span></label>
                        <input  name="first_name"  class="form-control"  wire:model.defer="email" />
                    </div>
                    <div class="form-group">
                        <label>First Name<span class="text-danger">*</span></label>
                        <input  name="last_name"  class="form-control"  wire:model.defer="first_name" />
                    </div>
                    <div class="form-group">
                       <label>Last Name<span class="text-danger">*</span></label>
                       <input  name="last_name"  class="form-control"  wire:model.defer="last_name" />
                    </div>
                    <div class="form-group">
                        <label>Age<span class="text-danger">*</span></label>
                        <input  name="last_name"  class="form-control"  wire:model.defer="age" />
                     </div>
                    <div class="form-group">
                       <label for="single" class="control-label">Gender<span class="text-danger">*</span></label>
                       <select id="single" class="form-control select2" wire:model="gender" >
                           @if($this->gender == 1)
                               <option value="1" selected>Male</option>
                               <option value="0">Female</option>
                           @else
                               <option value="0" selected>Female</option>
                               <option value="1">Male</option>
                           @endif
                       </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" wire:click.prevent="cancel()">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold" wire:click.prevent="update()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
