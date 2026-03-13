<div class="offcanvas offcanvas-end" role="dialog" aria-hidden="true" id="offcanvasAddd" aria-labelledby="offcanvasAddd" style="width:1050px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddd" style="color:aliceblue">{{ x_('Add Interview', 'general') }}</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <form action="{{ route('interviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row g-3">
                    <div class="col-6">
                        <label for="company_id" class="form-label ">{{ x_('Company Email *', 'general') }}</label>
                        <select class="form-select select2" name="company_id" required>
                            <option value="">{{ x_('Select Company', 'general') }}</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->website }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="career_id" class="form-label">{{ x_('Job Title *', 'general') }}</label>
                        <select class="form-select select2" name="career_id" required>
                            <option value="">{{ x_('Select career', 'general') }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="candidate_id" class="form-label" ></label>{{ x_('Candidate Email *', 'general') }}</label>
                        <select class="form-select select2" name="candidate_id" required>
                            <option value="">{{ x_('Select candidate', 'general') }}</option>
                            @foreach($candidates as $candidate)
                                <option value="{{ $candidate->id }}">{{ $candidate->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="interview_type" class="form-label" >{{ x_('Interview Type *', 'general') }}</label>
                        <select class="form-select select2" name="interview_type" required>
                            <option value="">{{ x_('Select interview type', 'general') }}</option>
                            <option value="Technical">{{ x_('Technical', 'general') }}</option>
                            <option value="HR">HR</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="job_type" class="form-label">{{ x_('Job Type *', 'general') }}</label>
                        <select class="form-select select2" name="job_type" required>
                            <option value="">{{ x_('Select Job type', 'general') }}</option>
                            <option value="On Site">{{ x_('On Site', 'general') }}</option>
                            <option value="Remotely">{{ x_('Remotely', 'general') }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="date" class="form-label">{{ x_('Date *', 'general') }}</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="col-6">
                        <label for="time" class="form-label">{{ x_('Time *', 'general') }}</label>
                        <input type="time" class="form-control" name="time" required>
                    </div>
                    <div class="col-6">
                        <label for="duration" class="form-label">{{ x_('Duration (in Mintues)*', 'general') }}</label>
                        <input type="number" class="form-control" name="duration" required>
                    </div>
                    <div class="col-6">
                        <label for="meeting_type" class="form-label  -ml-px">{{ x_('Meeting Type *', 'general') }}</label>
                        <select class="form-select select2" name="meeting_type" required>
                            <option value="">{{ x_('Select meeting type', 'general') }}</option>
                            <option value="On Site">{{ x_('On Site', 'general') }}</option>
                            <option value="Online">{{ x_('Online', 'general') }}</option>
                        </select>
                    </div>
                   <div class="col-12" >
                        <div class="row" id="here">
                        </div>
                   </div>
                    <div class="col-12">
                        <label for="notes" class="form-label">{{ x_('Notes', 'general') }}</label>
                        <textarea class="form-control" id="classic" name="notes" rows="4"></textarea>
                    </div>
                    {{-- <div class="col-6">
                        <div class="form-check  form-switch  form-switch-lg">
                            <label for="is_active" class="form-label">{{ x_('Is Active', 'general') }}</label>
                            <input class="form-check-input" type="checkbox" name="is_active" >
                            <label class="form-check-label" for="is_active"></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check  form-switch  form-switch-lg">
                            <label for="is_published" class="form-label">{{ x_('Is Published', 'general') }}</label>
                            <input class="form-check-input" type="checkbox" name="is_published" >
                            <label class="form-check-label" for="is_published"></label>
                        </div>
                    </div> --}}
                    <h5> {{ x_('Attachment', 'general') }} </h5>
                    <div class="col-xxl-12">
                        <label for="attachment" class="form-label">{{ x_('Attachment', 'general') }} </label>
                        <input type="file" name="attachments" class="form-control">
                    </div>
                    <div class="col-xxl-12">
                        <button type="submit" class="btn btn-dark">{{ x_('Add Interview', 'general') }}</button>
                    </div>

                </div>


        </form>
    </div>
</div>
