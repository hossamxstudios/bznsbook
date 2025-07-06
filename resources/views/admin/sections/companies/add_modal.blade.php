<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdd" aria-labelledby="offcanvasTopLabel" style="width:570px;">
    <div class="offcanvas-header" >
        <h5 id="offcanvasAddtLabel">Create company</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" ></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="industry" class="form-label">Industry *</label>
                <select class="form-control" id="industry_id" name="industry_id" required>
                    @foreach ($industries as $industry)
                        <option value="{{ $industry->id }}">
                            {{ $industry->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Company Name *</label>
                <input type="text" class="form-control" id="name" name="name"  required>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website *</label>
                <input type="url" class="form-control" id="website" name="website" placeholder="Enter website URL" >
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Headcount *</label>
                <select class="form-control" id="capacity" name="capacity" required>
                    <option value="" selected disabled>Select Company Headcount</option>
                    <option value="1-50">1-50</option>
                    <option value="51-200">51-200</option>
                    <option value="201-500">201-500</option>
                    <option value="501-1000">501-1000</option>
                    <option value="1001-2000">1001-2000</option>
                    <option value="2001-5000">2001-5000</option>
                    <option value="5001-10000">5001-10000</option>
                    <option value="10001-20000">10001-20000</option>
                    <option value="20000+">20000+</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="source" class="form-label">Source</label>
                <select class="form-control" id="source" name="source" required>
                    <option value="" selected disabled>Select source</option>
                    <option value="Social media">Social media</option>
                    <option value="Website">Website</option>
                    <option value="Meetings">Meetings</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="mb-3">
                <label for="decision_maker" class="form-label">Decision Maker</label>
                <input type="text" class="form-control" id="decision_maker" name="decision_maker" >
            </div>
            <div class="mb-3">
                <label for="social_media" class="form-label">Linkedin</label>
                <input type="url" class="form-control" id="social_media" name="social_media" placeholder="Enter Linkedin Link" >
            </div>
            <button type="submit" class="btn btn-primary">Add Company</button>
        </form>
    </div>
</div>

