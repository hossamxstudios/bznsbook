<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdate{{$contact->id}}" aria-labelledby="offcanvasUpdateLabel{{$contact->id}}" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasUpdateLabel{{$contact->id}}" style="color:aliceblue">Update Contact</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('contacts.update', ['id' => $contact->id]) }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="company_id{{$contact->id}}" class="form-label">Company Name</label>
                <select class="form-control" id="company_id{{$contact->id}}" name="company_id" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $contact->company_id === $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name{{$contact->id}}" class="form-label">Contact Name*</label>
                <input type="text" class="form-control" id="name{{$contact->id}}" name="name" value="{{ $contact->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email{{$contact->id}}" class="form-label">Email*</label>
                <input type="email" class="form-control" id="email{{$contact->id}}" name="email" value="{{ $contact->email }}" required>
            </div>
            <div class="mb-3">
                <label for="phone{{$contact->id}}" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone{{$contact->id}}" name="phone" value="{{ $contact->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="title{{$contact->id}}" class="form-label">Title</label>
                <input type="text" class="form-control" id="title{{$contact->id}}" name="title" value="{{ $contact->title }}" required>
            </div>
            <div class="mb-3">
                <label for="status{{$contact->id}}" class="form-label">Status</label>
                <select class="form-control" id="status{{$contact->id}}" name="status" required>
                    <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="active" {{ $contact->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $contact->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Contact</button>
        </form>
    </div>
</div>
