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
                        <label>Question Name<span class="text-danger">*</span></label>
                        <input  name="question_name"  class="form-control" />
                    </div>
                
                    <div class="form-group">
                       <label>Grade<span class="text-danger">*</span></label>
                       <input  name="subject_name"  class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Subject<span class="text-danger">*</span></label>
                        <input  name="grade_name"  class="form-control"/>
                     </div>
                     <div class="form-group">
                        <label>Answers<span class="text-danger">*</span></label>
                        <input  name="answer_name"  class="form-control" />
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
