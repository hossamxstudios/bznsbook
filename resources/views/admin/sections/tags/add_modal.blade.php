<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddtLabel" style="color:aliceblue">{{ x_('Add New Tag', 'admin') }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ x_('Tag Name *', 'admin') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ x_('Enter Tag Name', 'admin') }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">{{ x_('Type *', 'admin') }}</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">{{ x_('Please Select Type', 'admin') }}</option>
                    <option value="candidate">{{ x_('candidate', 'admin') }}</option>
                    <option value="job">{{ x_('job', 'admin') }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ x_('Add Tag', 'admin') }}</button>
        </form>
    </div>
</div>

