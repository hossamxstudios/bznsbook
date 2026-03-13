<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddd" aria-labelledby="offcanvasAddd" style="width:1050px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasAddd" style="color:aliceblue">{{ x_('Add Job', 'general') }}</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <form action="{{ route('company.jobs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <input type="hidden"  name="company_id" value="{{ auth()->user()->company_id }}">
                <div class="col-6">
                    <label for="title" class="form-label">{{ x_('Job Title', 'general') }}</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-6">
                    <label for="job_type" class="form-label">{{ x_('Job Type', 'general') }}</label>
                    <select class="form-select" name="job_type">
                        <option value="">{{ x_('Select Job type', 'general') }}</option>
                        <option value="On Site">{{ x_('On Site', 'general') }}</option>
                        <option value="Remotely">{{ x_('Remotely', 'general') }}</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="country" class="form-label">{{ x_('Country', 'general') }} </label>
                    <select class="form-select " name="country" >
                        <option value="">{{ x_('Select country', 'general') }}</option>
                        <option value="Afghanistan">{{ x_('Afghanistan', 'general') }}</option>
                        <option value="Albania">{{ x_('Albania', 'general') }}</option>
                        <option value="Algeria">{{ x_('Algeria', 'general') }}</option>
                        <option value="Andorra">{{ x_('Andorra', 'general') }}</option>
                        <option value="Angola">{{ x_('Angola', 'general') }}</option>
                        <option value="Antigua and Barbuda">{{ x_('Antigua and Barbuda', 'general') }}</option>
                        <option value="Argentina">{{ x_('Argentina', 'general') }}</option>
                        <option value="Armenia">{{ x_('Armenia', 'general') }}</option>
                        <option value="Australia">{{ x_('Australia', 'general') }}</option>
                        <option value="Austria">{{ x_('Austria', 'general') }}</option>
                        <option value="Azerbaijan">{{ x_('Azerbaijan', 'general') }}</option>
                        <option value="Bahamas">{{ x_('Bahamas', 'general') }}</option>
                        <option value="Bahrain">{{ x_('Bahrain', 'general') }}</option>
                        <option value="Bangladesh">{{ x_('Bangladesh', 'general') }}</option>
                        <option value="Barbados">{{ x_('Barbados', 'general') }}</option>
                        <option value="Belarus">{{ x_('Belarus', 'general') }}</option>
                        <option value="Belgium">{{ x_('Belgium', 'general') }}</option>
                        <option value="Belize">{{ x_('Belize', 'general') }}</option>
                        <option value="Benin">{{ x_('Benin', 'general') }}</option>
                        <option value="Bhutan">{{ x_('Bhutan', 'general') }}</option>
                        <option value="Bolivia">{{ x_('Bolivia', 'general') }}</option>
                        <option value="Bosnia and Herzegovina">{{ x_('Bosnia and Herzegovina', 'general') }}</option>
                        <option value="Botswana">{{ x_('Botswana', 'general') }}</option>
                        <option value="Brazil">{{ x_('Brazil', 'general') }}</option>
                        <option value="Brunei">{{ x_('Brunei', 'general') }}</option>
                        <option value="Bulgaria">{{ x_('Bulgaria', 'general') }}</option>
                        <option value="Burkina Faso">{{ x_('Burkina Faso', 'general') }}</option>
                        <option value="Burundi">{{ x_('Burundi', 'general') }}</option>
                        <option value="Cabo Verde">{{ x_('Cabo Verde', 'general') }}</option>
                        <option value="Cambodia">{{ x_('Cambodia', 'general') }}</option>
                        <option value="Cameroon">{{ x_('Cameroon', 'general') }}</option>
                        <option value="Canada">{{ x_('Canada', 'general') }}</option>
                        <option value="Central African Republic">{{ x_('Central African Republic', 'general') }}</option>
                        <option value="Chad">{{ x_('Chad', 'general') }}</option>
                        <option value="Chile">{{ x_('Chile', 'general') }}</option>
                        <option value="China">{{ x_('China', 'general') }}</option>
                        <option value="Colombia">{{ x_('Colombia', 'general') }}</option>
                        <option value="Comoros">{{ x_('Comoros', 'general') }}</option>
                        <option value="Congo, Democratic Republic of the">{{ x_('Congo, Democratic Republic of the', 'general') }}</option>
                        <option value="Congo, Republic of the">{{ x_('Congo, Republic of the', 'general') }}</option>
                        <option value="Costa Rica">{{ x_('Costa Rica', 'general') }}</option>
                        <option value="Croatia">{{ x_('Croatia', 'general') }}</option>
                        <option value="Cuba">{{ x_('Cuba', 'general') }}</option>
                        <option value="Cyprus">{{ x_('Cyprus', 'general') }}</option>
                        <option value="Czech Republic">{{ x_('Czech Republic', 'general') }}</option>
                        <option value="Denmark">{{ x_('Denmark', 'general') }}</option>
                        <option value="Djibouti">{{ x_('Djibouti', 'general') }}</option>
                        <option value="Dominica">{{ x_('Dominica', 'general') }}</option>
                        <option value="Dominican Republic">{{ x_('Dominican Republic', 'general') }}</option>
                        <option value="East Timor (Timor-Leste)">{{ x_('East Timor (Timor-Leste)', 'general') }}</option>
                        <option value="Ecuador">{{ x_('Ecuador', 'general') }}</option>
                        <option value="Egypt">{{ x_('Egypt', 'general') }}</option>
                        <option value="El Salvador">{{ x_('El Salvador', 'general') }}</option>
                        <option value="Equatorial Guinea">{{ x_('Equatorial Guinea', 'general') }}</option>
                        <option value="Eritrea">{{ x_('Eritrea', 'general') }}</option>
                        <option value="Estonia">{{ x_('Estonia', 'general') }}</option>
                        <option value="Eswatini">{{ x_('Eswatini', 'general') }}</option>
                        <option value="Ethiopia">{{ x_('Ethiopia', 'general') }}</option>
                        <option value="Fiji">{{ x_('Fiji', 'general') }}</option>
                        <option value="Finland">{{ x_('Finland', 'general') }}</option>
                        <option value="France">{{ x_('France', 'general') }}</option>
                        <option value="Gabon">{{ x_('Gabon', 'general') }}</option>
                        <option value="Gambia">{{ x_('Gambia', 'general') }}</option>
                        <option value="Georgia">{{ x_('Georgia', 'general') }}</option>
                        <option value="Germany">{{ x_('Germany', 'general') }}</option>
                        <option value="Ghana">{{ x_('Ghana', 'general') }}</option>
                        <option value="Greece">{{ x_('Greece', 'general') }}</option>
                        <option value="Grenada">{{ x_('Grenada', 'general') }}</option>
                        <option value="Guatemala">{{ x_('Guatemala', 'general') }}</option>
                        <option value="Guinea">{{ x_('Guinea', 'general') }}</option>
                        <option value="Guinea-Bissau">{{ x_('Guinea-Bissau', 'general') }}</option>
                        <option value="Guyana">{{ x_('Guyana', 'general') }}</option>
                        <option value="Haiti">{{ x_('Haiti', 'general') }}</option>
                        <option value="Honduras">{{ x_('Honduras', 'general') }}</option>
                        <option value="Hungary">{{ x_('Hungary', 'general') }}</option>
                        <option value="Iceland">{{ x_('Iceland', 'general') }}</option>
                        <option value="India">{{ x_('India', 'general') }}</option>
                        <option value="Indonesia">{{ x_('Indonesia', 'general') }}</option>
                        <option value="Iran">{{ x_('Iran', 'general') }}</option>
                        <option value="Iraq">{{ x_('Iraq', 'general') }}</option>
                        <option value="Ireland">{{ x_('Ireland', 'general') }}</option>
                        <option value="Israel">{{ x_('Israel', 'general') }}</option>
                        <option value="Italy">{{ x_('Italy', 'general') }}</option>
                        <option value="Ivory Coast">{{ x_('Ivory Coast', 'general') }}</option>
                        <option value="Jamaica">{{ x_('Jamaica', 'general') }}</option>
                        <option value="Japan">{{ x_('Japan', 'general') }}</option>
                        <option value="Jordan">{{ x_('Jordan', 'general') }}</option>
                        <option value="Kazakhstan">{{ x_('Kazakhstan', 'general') }}</option>
                        <option value="Kenya">{{ x_('Kenya', 'general') }}</option>
                        <option value="Kiribati">{{ x_('Kiribati', 'general') }}</option>
                        <option value="Korea, North">{{ x_('Korea, North', 'general') }}</option>
                        <option value="Korea, South">{{ x_('Korea, South', 'general') }}</option>
                        <option value="Kosovo">{{ x_('Kosovo', 'general') }}</option>
                        <option value="Kuwait">{{ x_('Kuwait', 'general') }}</option>
                        <option value="Kyrgyzstan">{{ x_('Kyrgyzstan', 'general') }}</option>
                        <option value="Laos">{{ x_('Laos', 'general') }}</option>
                        <option value="Latvia">{{ x_('Latvia', 'general') }}</option>
                        <option value="Lebanon">{{ x_('Lebanon', 'general') }}</option>
                        <option value="Lesotho">{{ x_('Lesotho', 'general') }}</option>
                        <option value="Liberia">{{ x_('Liberia', 'general') }}</option>
                        <option value="Libya">{{ x_('Libya', 'general') }}</option>
                        <option value="Liechtenstein">{{ x_('Liechtenstein', 'general') }}</option>
                        <option value="Lithuania">{{ x_('Lithuania', 'general') }}</option>
                        <option value="Luxembourg">{{ x_('Luxembourg', 'general') }}</option>
                        <option value="Madagascar">{{ x_('Madagascar', 'general') }}</option>
                        <option value="Malawi">{{ x_('Malawi', 'general') }}</option>
                        <option value="Malaysia">{{ x_('Malaysia', 'general') }}</option>
                        <option value="Maldives">{{ x_('Maldives', 'general') }}</option>
                        <option value="Mali">{{ x_('Mali', 'general') }}</option>
                        <option value="Malta">{{ x_('Malta', 'general') }}</option>
                        <option value="Marshall Islands">{{ x_('Marshall Islands', 'general') }}</option>
                        <option value="Mauritania">{{ x_('Mauritania', 'general') }}</option>
                        <option value="Mauritius">{{ x_('Mauritius', 'general') }}</option>
                        <option value="Mexico">{{ x_('Mexico', 'general') }}</option>
                        <option value="Micronesia">{{ x_('Micronesia', 'general') }}</option>
                        <option value="Moldova">{{ x_('Moldova', 'general') }}</option>
                        <option value="Monaco">{{ x_('Monaco', 'general') }}</option>
                        <option value="Mongolia">{{ x_('Mongolia', 'general') }}</option>
                        <option value="Montenegro">{{ x_('Montenegro', 'general') }}</option>
                        <option value="Morocco">{{ x_('Morocco', 'general') }}</option>
                        <option value="Mozambique">{{ x_('Mozambique', 'general') }}</option>
                        <option value="Myanmar (Burma)">{{ x_('Myanmar (Burma)', 'general') }}</option>
                        <option value="Namibia">{{ x_('Namibia', 'general') }}</option>
                        <option value="Nauru">{{ x_('Nauru', 'general') }}</option>
                        <option value="Nepal">{{ x_('Nepal', 'general') }}</option>
                        <option value="Netherlands">{{ x_('Netherlands', 'general') }}</option>
                        <option value="New Zealand">{{ x_('New Zealand', 'general') }}</option>
                        <option value="Nicaragua">{{ x_('Nicaragua', 'general') }}</option>
                        <option value="Niger">{{ x_('Niger', 'general') }}</option>
                        <option value="Nigeria">{{ x_('Nigeria', 'general') }}</option>
                        <option value="North Macedonia">{{ x_('North Macedonia', 'general') }}</option>
                        <option value="Norway">{{ x_('Norway', 'general') }}</option>
                        <option value="Oman">{{ x_('Oman', 'general') }}</option>
                        <option value="Pakistan">{{ x_('Pakistan', 'general') }}</option>
                        <option value="Palau">{{ x_('Palau', 'general') }}</option>
                        <option value="Palestine">{{ x_('Palestine', 'general') }}</option>
                        <option value="Panama">{{ x_('Panama', 'general') }}</option>
                        <option value="Papua New Guinea">{{ x_('Papua New Guinea', 'general') }}</option>
                        <option value="Paraguay">{{ x_('Paraguay', 'general') }}</option>
                        <option value="Peru">{{ x_('Peru', 'general') }}</option>
                        <option value="Philippines">{{ x_('Philippines', 'general') }}</option>
                        <option value="Poland">{{ x_('Poland', 'general') }}</option>
                        <option value="Portugal">{{ x_('Portugal', 'general') }}</option>
                        <option value="Qatar">{{ x_('Qatar', 'general') }}</option>
                        <option value="Romania">{{ x_('Romania', 'general') }}</option>
                        <option value="Russia">{{ x_('Russia', 'general') }}</option>
                        <option value="Rwanda">{{ x_('Rwanda', 'general') }}</option>
                        <option value="Saint Kitts and Nevis">{{ x_('Saint Kitts and Nevis', 'general') }}</option>
                        <option value="Saint Lucia">{{ x_('Saint Lucia', 'general') }}</option>
                        <option value="Saint Vincent and the Grenadines">{{ x_('Saint Vincent and the Grenadines', 'general') }}</option>
                        <option value="Samoa">{{ x_('Samoa', 'general') }}</option>
                        <option value="San Marino">{{ x_('San Marino', 'general') }}</option>
                        <option value="Sao Tome and Principe">{{ x_('Sao Tome and Principe', 'general') }}</option>
                        <option value="Saudi Arabia">{{ x_('Saudi Arabia', 'general') }}</option>
                        <option value="Senegal">{{ x_('Senegal', 'general') }}</option>
                        <option value="Serbia">{{ x_('Serbia', 'general') }}</option>
                        <option value="Seychelles">{{ x_('Seychelles', 'general') }}</option>
                        <option value="Sierra Leone">{{ x_('Sierra Leone', 'general') }}</option>
                        <option value="Singapore">{{ x_('Singapore', 'general') }}</option>
                        <option value="Slovakia">{{ x_('Slovakia', 'general') }}</option>
                        <option value="Slovenia">{{ x_('Slovenia', 'general') }}</option>
                        <option value="Solomon Islands">{{ x_('Solomon Islands', 'general') }}</option>
                        <option value="Somalia">{{ x_('Somalia', 'general') }}</option>
                        <option value="South Africa">{{ x_('South Africa', 'general') }}</option>
                        <option value="South Sudan">{{ x_('South Sudan', 'general') }}</option>
                        <option value="Spain">{{ x_('Spain', 'general') }}</option>
                        <option value="Sri Lanka">{{ x_('Sri Lanka', 'general') }}</option>
                        <option value="Sudan">{{ x_('Sudan', 'general') }}</option>
                        <option value="Suriname">{{ x_('Suriname', 'general') }}</option>
                        <option value="Sweden">{{ x_('Sweden', 'general') }}</option>
                        <option value="Switzerland">{{ x_('Switzerland', 'general') }}</option>
                        <option value="Syria">{{ x_('Syria', 'general') }}</option>
                        <option value="Taiwan">{{ x_('Taiwan', 'general') }}</option>
                        <option value="Tajikistan">{{ x_('Tajikistan', 'general') }}</option>
                        <option value="Tanzania">{{ x_('Tanzania', 'general') }}</option>
                        <option value="Thailand">{{ x_('Thailand', 'general') }}</option>
                        <option value="Togo">{{ x_('Togo', 'general') }}</option>
                        <option value="Tonga">{{ x_('Tonga', 'general') }}</option>
                        <option value="Trinidad and Tobago">{{ x_('Trinidad and Tobago', 'general') }}</option>
                        <option value="Tunisia">{{ x_('Tunisia', 'general') }}</option>
                        <option value="Turkey">{{ x_('Turkey', 'general') }}</option>
                        <option value="Turkmenistan">{{ x_('Turkmenistan', 'general') }}</option>
                        <option value="Tuvalu">{{ x_('Tuvalu', 'general') }}</option>
                        <option value="Uganda">{{ x_('Uganda', 'general') }}</option>
                        <option value="Ukraine">{{ x_('Ukraine', 'general') }}</option>
                        <option value="United Arab Emirates">{{ x_('United Arab Emirates', 'general') }}</option>
                        <option value="United Kingdom">{{ x_('United Kingdom', 'general') }}</option>
                        <option value="United States">{{ x_('United States', 'general') }}</option>
                        <option value="Uruguay">{{ x_('Uruguay', 'general') }}</option>
                        <option value="Uzbekistan">{{ x_('Uzbekistan', 'general') }}</option>
                        <option value="Vanuatu">{{ x_('Vanuatu', 'general') }}</option>
                        <option value="Vatican City">{{ x_('Vatican City', 'general') }}</option>
                        <option value="Venezuela">{{ x_('Venezuela', 'general') }}</option>
                        <option value="Vietnam">{{ x_('Vietnam', 'general') }}</option>
                        <option value="Yemen">{{ x_('Yemen', 'general') }}</option>
                        <option value="Zambia">{{ x_('Zambia', 'general') }}</option>
                        <option value="Zimbabwe">{{ x_('Zimbabwe', 'general') }}</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="city" class="form-label">{{ x_('City', 'general') }} </label>
                    <input type="text" class="form-control"  name="city">
                </div>
                <div class="col-6">
                    <label for="headcount" class="form-label">{{ x_('Headcount', 'general') }}</label>
                    <select class="form-select" name="headcount">
                        <option value="">{{ x_('Select headcount', 'general') }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <div class="col-6">
                    <label for="level" class="form-label">{{ x_('Experience Level', 'general') }}</label>
                    <select class="form-select" name="level">
                        <option value="">{{ x_('Select experience level', 'general') }}</option>
                        <option value="Entry Level">{{ x_('Entry Level', 'general') }}</option>
                        <option value="Mid Level">{{ x_('Mid Level', 'general') }}</option>
                        <option value="Senior Level">{{ x_('Senior Level', 'general') }}</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="currency" class="form-label">{{ x_('Currency', 'general') }}</label>
                    <select class="form-select" name="currency">
                        <option value="">{{ x_('Select currency', 'general') }}</option>
                        <option value="EGP">EGP</option>
                        <option value="USD">USD</option>
                        <option value="AED">AED</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="min_salary" class="form-label">{{ x_('Min Salary', 'general') }}</label>
                    <input type="number" class="form-control" name="min_salary">
                </div>
                <div class="col-6">
                    <label for="max_salary" class="form-label">{{ x_('Max Salary', 'general') }}</label>
                    <input type="number" class="form-control" name="max_salary">
                </div>
                <div class="col-6">
                    <label for="frequency" class="form-label">{{ x_('Frequency', 'general') }}</label>
                    <select class="form-select" name="frequency">
                        <option value="">{{ x_('Select frequency', 'general') }}</option>
                        <option value="Per Hour">{{ x_('Per Hour', 'general') }}</option>
                        <option value="Per Day">{{ x_('Per Day', 'general') }}</option>
                        <option value="Per Week">{{ x_('Per Week', 'general') }}</option>
                        <option value="Per Month">{{ x_('Per Month', 'general') }}</option>
                        <option value="Per Year">{{ x_('Per Year', 'general') }}</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="contract_type" class="form-label">{{ x_('Contract Type', 'general') }}</label>
                    <select class="form-select" name="contract_type">
                        <option value="">{{ x_('Select contract type', 'general') }}</option>
                        <option value="Full Time">{{ x_('Full Time', 'general') }}</option>
                        <option value="Part Time">{{ x_('Part Time', 'general') }}</option>
                        <option value="Internship">{{ x_('Internship', 'general') }}</option>
                        <option value="Temporary">{{ x_('Temporary', 'general') }}</option>
                        <option value="Freelance">{{ x_('Freelance', 'general') }}</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="details" class="form-label">{{ x_('Details', 'general') }}</label>
                    <textarea name="details" id="classic"></textarea>
                </div>
                <h5> {{ x_('Attachment', 'general') }} </h5>
                <div class="col-xxl-12">
                    <label for="attachment" class="form-label">{{ x_('Attachment', 'general') }} </label>
                    <input type="file" name="attachment" class="form-control" >
                </div>
                <div class="col-xxl-12">
                    <button type="submit" class="btn btn-dark">{{ x_('Add Job', 'general') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
