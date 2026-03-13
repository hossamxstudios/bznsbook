<div id="edit_task_list" class="modal fade edit-tasklist-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="mb-4">{{ x_('Update Stage', 'pipelines') }}</h5>
                <form>
                    <div class="row gx-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">{{ x_('Name', 'pipelines') }}</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer align-items-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ x_('Cancel', 'pipelines') }}</button>
                <button type="button" class="btn btn-primary btn-edit-tasklist" >{{ x_('Save', 'pipelines') }}</button>
            </div>
        </div>
    </div>
</div>
