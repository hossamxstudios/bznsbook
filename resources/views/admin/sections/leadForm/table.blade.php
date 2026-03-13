<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>{{ x_('Submit Form', 'admin') }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.leadForm.apply') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label"> {{ x_('Name *', 'admin') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ x_('Enter first name', 'admin') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">{{ x_('Phone *', 'admin') }}</label>
                                        <div class="input-group">
                                            <select class="form-select" id="country_code" name="country_code" required style="max-width: 140px;">
                                                <option value="93">{{ x_('Afghanistan (+93)', 'admin') }}</option>
                                                <option value="355">{{ x_('Albania (+355)', 'admin') }}</option>
                                                <option value="213">{{ x_('Algeria (+213)', 'admin') }}</option>
                                                <option value="1684">{{ x_('American Samoa (+1684)', 'admin') }}</option>
                                                <option value="376">{{ x_('Andorra (+376)', 'admin') }}</option>
                                                <option value="244">{{ x_('Angola (+244)', 'admin') }}</option>
                                                <option value="1264">{{ x_('Anguilla (+1264)', 'admin') }}</option>
                                                <option value="672">{{ x_('Antarctica (+672)', 'admin') }}</option>
                                                <option value="1268">{{ x_('Antigua and Barbuda (+1268)', 'admin') }}</option>
                                                <option value="54">{{ x_('Argentina (+54)', 'admin') }}</option>
                                                <option value="374">{{ x_('Armenia (+374)', 'admin') }}</option>
                                                <option value="297">{{ x_('Aruba (+297)', 'admin') }}</option>
                                                <option value="61">{{ x_('Australia (+61)', 'admin') }}</option>
                                                <option value="43">{{ x_('Austria (+43)', 'admin') }}</option>
                                                <option value="994">{{ x_('Azerbaijan (+994)', 'admin') }}</option>
                                                <option value="1242">{{ x_('Bahamas (+1242)', 'admin') }}</option>
                                                <option value="973">{{ x_('Bahrain (+973)', 'admin') }}</option>
                                                <option value="880">{{ x_('Bangladesh (+880)', 'admin') }}</option>
                                                <option value="1246">{{ x_('Barbados (+1246)', 'admin') }}</option>
                                                <option value="375">{{ x_('Belarus (+375)', 'admin') }}</option>
                                                <option value="32">{{ x_('Belgium (+32)', 'admin') }}</option>
                                                <option value="501">{{ x_('Belize (+501)', 'admin') }}</option>
                                                <option value="229">{{ x_('Benin (+229)', 'admin') }}</option>
                                                <option value="1441">{{ x_('Bermuda (+1441)', 'admin') }}</option>
                                                <option value="975">{{ x_('Bhutan (+975)', 'admin') }}</option>
                                                <option value="591">{{ x_('Bolivia (+591)', 'admin') }}</option>
                                                <option value="387">{{ x_('Bosnia and Herzegovina (+387)', 'admin') }}</option>
                                                <option value="267">{{ x_('Botswana (+267)', 'admin') }}</option>
                                                <option value="55">{{ x_('Brazil (+55)', 'admin') }}</option>
                                                <option value="246">{{ x_('British Indian Ocean Territory (+246)', 'admin') }}</option>
                                                <option value="1284">{{ x_('British Virgin Islands (+1284)', 'admin') }}</option>
                                                <option value="673">{{ x_('Brunei (+673)', 'admin') }}</option>
                                                <option value="359">{{ x_('Bulgaria (+359)', 'admin') }}</option>
                                                <option value="226">{{ x_('Burkina Faso (+226)', 'admin') }}</option>
                                                <option value="257">{{ x_('Burundi (+257)', 'admin') }}</option>
                                                <option value="855">{{ x_('Cambodia (+855)', 'admin') }}</option>
                                                <option value="237">{{ x_('Cameroon (+237)', 'admin') }}</option>
                                                <option value="1">{{ x_('Canada (+1)', 'admin') }}</option>
                                                <option value="238">{{ x_('Cape Verde (+238)', 'admin') }}</option>
                                                <option value="1345">{{ x_('Cayman Islands (+1345)', 'admin') }}</option>
                                                <option value="236">{{ x_('Central African Republic (+236)', 'admin') }}</option>
                                                <option value="235">{{ x_('Chad (+235)', 'admin') }}</option>
                                                <option value="56">{{ x_('Chile (+56)', 'admin') }}</option>
                                                <option value="86">{{ x_('China (+86)', 'admin') }}</option>
                                                <option value="61">{{ x_('Christmas Island (+61)', 'admin') }}</option>
                                                <option value="61">{{ x_('Cocos Islands (+61)', 'admin') }}</option>
                                                <option value="57">{{ x_('Colombia (+57)', 'admin') }}</option>
                                                <option value="269">{{ x_('Comoros (+269)', 'admin') }}</option>
                                                <option value="682">{{ x_('Cook Islands (+682)', 'admin') }}</option>
                                                <option value="506">{{ x_('Costa Rica (+506)', 'admin') }}</option>
                                                <option value="385">{{ x_('Croatia (+385)', 'admin') }}</option>
                                                <option value="53">{{ x_('Cuba (+53)', 'admin') }}</option>
                                                <option value="599">{{ x_('Curacao (+599)', 'admin') }}</option>
                                                <option value="357">{{ x_('Cyprus (+357)', 'admin') }}</option>
                                                <option value="420">{{ x_('Czech Republic (+420)', 'admin') }}</option>
                                                <option value="243">{{ x_('Democratic Republic of the Congo (+243)', 'admin') }}</option>
                                                <option value="45">{{ x_('Denmark (+45)', 'admin') }}</option>
                                                <option value="253">{{ x_('Djibouti (+253)', 'admin') }}</option>
                                                <option value="1767">{{ x_('Dominica (+1767)', 'admin') }}</option>
                                                <option value="1809">{{ x_('Dominican Republic (+1809)', 'admin') }}</option>
                                                <option value="670">{{ x_('East Timor (+670)', 'admin') }}</option>
                                                <option value="593">{{ x_('Ecuador (+593)', 'admin') }}</option>
                                                <option value="20" selected>{{ x_('Egypt (+20)', 'admin') }}</option>
                                                <option value="503">{{ x_('El Salvador (+503)', 'admin') }}</option>
                                                <option value="240">{{ x_('Equatorial Guinea (+240)', 'admin') }}</option>
                                                <option value="291">{{ x_('Eritrea (+291)', 'admin') }}</option>
                                                <option value="372">{{ x_('Estonia (+372)', 'admin') }}</option>
                                                <option value="251">{{ x_('Ethiopia (+251)', 'admin') }}</option>
                                                <option value="500">{{ x_('Falkland Islands (+500)', 'admin') }}</option>
                                                <option value="298">{{ x_('Faroe Islands (+298)', 'admin') }}</option>
                                                <option value="679">{{ x_('Fiji (+679)', 'admin') }}</option>
                                                <option value="358">{{ x_('Finland (+358)', 'admin') }}</option>
                                                <option value="33">{{ x_('France (+33)', 'admin') }}</option>
                                                <option value="689">{{ x_('French Polynesia (+689)', 'admin') }}</option>
                                                <option value="241">{{ x_('Gabon (+241)', 'admin') }}</option>
                                                <option value="220">{{ x_('Gambia (+220)', 'admin') }}</option>
                                                <option value="995">{{ x_('Georgia (+995)', 'admin') }}</option>
                                                <option value="49">{{ x_('Germany (+49)', 'admin') }}</option>
                                                <option value="233">{{ x_('Ghana (+233)', 'admin') }}</option>
                                                <option value="350">{{ x_('Gibraltar (+350)', 'admin') }}</option>
                                                <option value="30">{{ x_('Greece (+30)', 'admin') }}</option>
                                                <option value="299">{{ x_('Greenland (+299)', 'admin') }}</option>
                                                <option value="1473">{{ x_('Grenada (+1473)', 'admin') }}</option>
                                                <option value="1671">{{ x_('Guam (+1671)', 'admin') }}</option>
                                                <option value="502">{{ x_('Guatemala (+502)', 'admin') }}</option>
                                                <option value="44-1481">{{ x_('Guernsey (+44-1481)', 'admin') }}</option>
                                                <option value="224">{{ x_('Guinea (+224)', 'admin') }}</option>
                                                <option value="245">{{ x_('Guinea-Bissau (+245)', 'admin') }}</option>
                                                <option value="592">{{ x_('Guyana (+592)', 'admin') }}</option>
                                                <option value="509">{{ x_('Haiti (+509)', 'admin') }}</option>
                                                <option value="504">{{ x_('Honduras (+504)', 'admin') }}</option>
                                                <option value="852">{{ x_('Hong Kong (+852)', 'admin') }}</option>
                                                <option value="36">{{ x_('Hungary (+36)', 'admin') }}</option>
                                                <option value="354">{{ x_('Iceland (+354)', 'admin') }}</option>
                                                <option value="91">{{ x_('India (+91)', 'admin') }}</option>
                                                <option value="62">{{ x_('Indonesia (+62)', 'admin') }}</option>
                                                <option value="98">{{ x_('Iran (+98)', 'admin') }}</option>
                                                <option value="964">{{ x_('Iraq (+964)', 'admin') }}</option>
                                                <option value="353">{{ x_('Ireland (+353)', 'admin') }}</option>
                                                <option value="44-1624">{{ x_('Isle of Man (+44-1624)', 'admin') }}</option>
                                                <option value="972">{{ x_('Israel (+972)', 'admin') }}</option>
                                                <option value="39">{{ x_('Italy (+39)', 'admin') }}</option>
                                                <option value="225">{{ x_('Ivory Coast (+225)', 'admin') }}</option>
                                                <option value="1876">{{ x_('Jamaica (+1876)', 'admin') }}</option>
                                                <option value="81">{{ x_('Japan (+81)', 'admin') }}</option>
                                                <option value="44-1534">{{ x_('Jersey (+44-1534)', 'admin') }}</option>
                                                <option value="962">{{ x_('Jordan (+962)', 'admin') }}</option>
                                                <option value="7">{{ x_('Kazakhstan (+7)', 'admin') }}</option>
                                                <option value="254">{{ x_('Kenya (+254)', 'admin') }}</option>
                                                <option value="686">{{ x_('Kiribati (+686)', 'admin') }}</option>
                                                <option value="383">{{ x_('Kosovo (+383)', 'admin') }}</option>
                                                <option value="965">{{ x_('Kuwait (+965)', 'admin') }}</option>
                                                <option value="996">{{ x_('Kyrgyzstan (+996)', 'admin') }}</option>
                                                <option value="856">{{ x_('Laos (+856)', 'admin') }}</option>
                                                <option value="371">{{ x_('Latvia (+371)', 'admin') }}</option>
                                                <option value="961">{{ x_('Lebanon (+961)', 'admin') }}</option>
                                                <option value="266">{{ x_('Lesotho (+266)', 'admin') }}</option>
                                                <option value="231">{{ x_('Liberia (+231)', 'admin') }}</option>
                                                <option value="218">{{ x_('Libya (+218)', 'admin') }}</option>
                                                <option value="423">{{ x_('Liechtenstein (+423)', 'admin') }}</option>
                                                <option value="370">{{ x_('Lithuania (+370)', 'admin') }}</option>
                                                <option value="352">{{ x_('Luxembourg (+352)', 'admin') }}</option>
                                                <option value="853">{{ x_('Macau (+853)', 'admin') }}</option>
                                                <option value="389">{{ x_('Macedonia (+389)', 'admin') }}</option>
                                                <option value="261">{{ x_('Madagascar (+261)', 'admin') }}</option>
                                                <option value="265">{{ x_('Malawi (+265)', 'admin') }}</option>
                                                <option value="60">{{ x_('Malaysia (+60)', 'admin') }}</option>
                                                <option value="960">{{ x_('Maldives (+960)', 'admin') }}</option>
                                                <option value="223">{{ x_('Mali (+223)', 'admin') }}</option>
                                                <option value="356">{{ x_('Malta (+356)', 'admin') }}</option>
                                                <option value="692">{{ x_('Marshall Islands (+692)', 'admin') }}</option>
                                                <option value="222">{{ x_('Mauritania (+222)', 'admin') }}</option>
                                                <option value="230">{{ x_('Mauritius (+230)', 'admin') }}</option>
                                                <option value="262">{{ x_('Mayotte (+262)', 'admin') }}</option>
                                                <option value="52">{{ x_('Mexico (+52)', 'admin') }}</option>
                                                <option value="691">{{ x_('Micronesia (+691)', 'admin') }}</option>
                                                <option value="373">{{ x_('Moldova (+373)', 'admin') }}</option>
                                                <option value="377">{{ x_('Monaco (+377)', 'admin') }}</option>
                                                <option value="976">{{ x_('Mongolia (+976)', 'admin') }}</option>
                                                <option value="382">{{ x_('Montenegro (+382)', 'admin') }}</option>
                                                <option value="1664">{{ x_('Montserrat (+1664)', 'admin') }}</option>
                                                <option value="212">{{ x_('Morocco (+212)', 'admin') }}</option>
                                                <option value="258">{{ x_('Mozambique (+258)', 'admin') }}</option>
                                                <option value="95">{{ x_('Myanmar (+95)', 'admin') }}</option>
                                                <option value="264">{{ x_('Namibia (+264)', 'admin') }}</option>
                                                <option value="674">{{ x_('Nauru (+674)', 'admin') }}</option>
                                                <option value="977">{{ x_('Nepal (+977)', 'admin') }}</option>
                                                <option value="31">{{ x_('Netherlands (+31)', 'admin') }}</option>
                                                <option value="599">{{ x_('Netherlands Antilles (+599)', 'admin') }}</option>
                                                <option value="687">{{ x_('New Caledonia (+687)', 'admin') }}</option>
                                                <option value="64">{{ x_('New Zealand (+64)', 'admin') }}</option>
                                                <option value="505">{{ x_('Nicaragua (+505)', 'admin') }}</option>
                                                <option value="227">{{ x_('Niger (+227)', 'admin') }}</option>
                                                <option value="234">{{ x_('Nigeria (+234)', 'admin') }}</option>
                                                <option value="683">{{ x_('Niue (+683)', 'admin') }}</option>
                                                <option value="850">{{ x_('North Korea (+850)', 'admin') }}</option>
                                                <option value="1670">{{ x_('Northern Mariana Islands (+1670)', 'admin') }}</option>
                                                <option value="47">{{ x_('Norway (+47)', 'admin') }}</option>
                                                <option value="968">{{ x_('Oman (+968)', 'admin') }}</option>
                                                <option value="92">{{ x_('Pakistan (+92)', 'admin') }}</option>
                                                <option value="680">{{ x_('Palau (+680)', 'admin') }}</option>
                                                <option value="970">{{ x_('Palestine (+970)', 'admin') }}</option>
                                                <option value="507">{{ x_('Panama (+507)', 'admin') }}</option>
                                                <option value="675">{{ x_('Papua New Guinea (+675)', 'admin') }}</option>
                                                <option value="595">{{ x_('Paraguay (+595)', 'admin') }}</option>
                                                <option value="51">{{ x_('Peru (+51)', 'admin') }}</option>
                                                <option value="63">{{ x_('Philippines (+63)', 'admin') }}</option>
                                                <option value="64">{{ x_('Pitcairn (+64)', 'admin') }}</option>
                                                <option value="48">{{ x_('Poland (+48)', 'admin') }}</option>
                                                <option value="351">{{ x_('Portugal (+351)', 'admin') }}</option>
                                                <option value="1787">{{ x_('Puerto Rico (+1787)', 'admin') }}</option>
                                                <option value="974">{{ x_('Qatar (+974)', 'admin') }}</option>
                                                <option value="242">{{ x_('Republic of the Congo (+242)', 'admin') }}</option>
                                                <option value="262">{{ x_('Reunion (+262)', 'admin') }}</option>
                                                <option value="40">{{ x_('Romania (+40)', 'admin') }}</option>
                                                <option value="7">{{ x_('Russia (+7)', 'admin') }}</option>
                                                <option value="250">{{ x_('Rwanda (+250)', 'admin') }}</option>
                                                <option value="590">{{ x_('Saint Barthelemy (+590)', 'admin') }}</option>
                                                <option value="290">{{ x_('Saint Helena (+290)', 'admin') }}</option>
                                                <option value="1869">{{ x_('Saint Kitts and Nevis (+1869)', 'admin') }}</option>
                                                <option value="1758">{{ x_('Saint Lucia (+1758)', 'admin') }}</option>
                                                <option value="590">{{ x_('Saint Martin (+590)', 'admin') }}</option>
                                                <option value="508">{{ x_('Saint Pierre and Miquelon (+508)', 'admin') }}</option>
                                                <option value="1784">{{ x_('Saint Vincent and the Grenadines (+1784)', 'admin') }}</option>
                                                <option value="685">{{ x_('Samoa (+685)', 'admin') }}</option>
                                                <option value="378">{{ x_('San Marino (+378)', 'admin') }}</option>
                                                <option value="239">{{ x_('Sao Tome and Principe (+239)', 'admin') }}</option>
                                                <option value="966">{{ x_('Saudi Arabia (+966)', 'admin') }}</option>
                                                <option value="221">{{ x_('Senegal (+221)', 'admin') }}</option>
                                                <option value="381">{{ x_('Serbia (+381)', 'admin') }}</option>
                                                <option value="248">{{ x_('Seychelles (+248)', 'admin') }}</option>
                                                <option value="232">{{ x_('Sierra Leone (+232)', 'admin') }}</option>
                                                <option value="65">{{ x_('Singapore (+65)', 'admin') }}</option>
                                                <option value="1721">{{ x_('Sint Maarten (+1721)', 'admin') }}</option>
                                                <option value="421">{{ x_('Slovakia (+421)', 'admin') }}</option>
                                                <option value="386">{{ x_('Slovenia (+386)', 'admin') }}</option>
                                                <option value="677">{{ x_('Solomon Islands (+677)', 'admin') }}</option>
                                                <option value="252">{{ x_('Somalia (+252)', 'admin') }}</option>
                                                <option value="27">{{ x_('South Africa (+27)', 'admin') }}</option>
                                                <option value="82">{{ x_('South Korea (+82)', 'admin') }}</option>
                                                <option value="211">{{ x_('South Sudan (+211)', 'admin') }}</option>
                                                <option value="34">{{ x_('Spain (+34)', 'admin') }}</option>
                                                <option value="94">{{ x_('Sri Lanka (+94)', 'admin') }}</option>
                                                <option value="249">{{ x_('Sudan (+249)', 'admin') }}</option>
                                                <option value="597">{{ x_('Suriname (+597)', 'admin') }}</option>
                                                <option value="47">{{ x_('Svalbard and Jan Mayen (+47)', 'admin') }}</option>
                                                <option value="268">{{ x_('Swaziland (+268)', 'admin') }}</option>
                                                <option value="46">{{ x_('Sweden (+46)', 'admin') }}</option>
                                                <option value="41">{{ x_('Switzerland (+41)', 'admin') }}</option>
                                                <option value="963">{{ x_('Syria (+963)', 'admin') }}</option>
                                                <option value="886">{{ x_('Taiwan (+886)', 'admin') }}</option>
                                                <option value="992">{{ x_('Tajikistan (+992)', 'admin') }}</option>
                                                <option value="255">{{ x_('Tanzania (+255)', 'admin') }}</option>
                                                <option value="66">{{ x_('Thailand (+66)', 'admin') }}</option>
                                                <option value="228">{{ x_('Togo (+228)', 'admin') }}</option>
                                                <option value="690">{{ x_('Tokelau (+690)', 'admin') }}</option>
                                                <option value="676">{{ x_('Tonga (+676)', 'admin') }}</option>
                                                <option value="1868">{{ x_('Trinidad and Tobago (+1868)', 'admin') }}</option>
                                                <option value="216">{{ x_('Tunisia (+216)', 'admin') }}</option>
                                                <option value="90">{{ x_('Turkey (+90)', 'admin') }}</option>
                                                <option value="993">{{ x_('Turkmenistan (+993)', 'admin') }}</option>
                                                <option value="1649">{{ x_('Turks and Caicos Islands (+1649)', 'admin') }}</option>
                                                <option value="688">{{ x_('Tuvalu (+688)', 'admin') }}</option>
                                                <option value="1340">{{ x_('U.S. Virgin Islands (+1340)', 'admin') }}</option>
                                                <option value="256">{{ x_('Uganda (+256)', 'admin') }}</option>
                                                <option value="380">{{ x_('Ukraine (+380)', 'admin') }}</option>
                                                <option value="971">{{ x_('United Arab Emirates (+971)', 'admin') }}</option>
                                                <option value="44">{{ x_('United Kingdom (+44)', 'admin') }}</option>
                                                <option value="1">{{ x_('United States (+1)', 'admin') }}</option>
                                                <option value="598">{{ x_('Uruguay (+598)', 'admin') }}</option>
                                                <option value="998">{{ x_('Uzbekistan (+998)', 'admin') }}</option>
                                                <option value="678">{{ x_('Vanuatu (+678)', 'admin') }}</option>
                                                <option value="379">{{ x_('Vatican (+379)', 'admin') }}</option>
                                                <option value="58">{{ x_('Venezuela (+58)', 'admin') }}</option>
                                                <option value="84">{{ x_('Vietnam (+84)', 'admin') }}</option>
                                                <option value="681">{{ x_('Wallis and Futuna (+681)', 'admin') }}</option>
                                                <option value="212">{{ x_('Western Sahara (+212)', 'admin') }}</option>
                                                <option value="967">{{ x_('Yemen (+967)', 'admin') }}</option>
                                                <option value="260">{{ x_('Zambia (+260)', 'admin') }}</option>
                                                <option value="263">{{ x_('Zimbabwe (+263)', 'admin') }}</option>
                                            </select>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ x_('Enter contact phone', 'admin') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">{{ x_('Phone *', 'admin') }}</label>
                                        <input type="text" class="form-control" id="email" name="phone" placeholder="{{ x_('Enter contact phone', 'admin') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label"> {{ x_('Email *', 'admin') }}</label>
                                        <input type="email" class="form-control" id="email" name="personal_email" placeholder="{{ x_('Enter email', 'admin') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="current_company" class="form-label">{{ x_('Job Title  *', 'admin') }}</label>
                                        <input type="text" class="form-control" name="job_title" placeholder="{{ x_('Enter Job title', 'admin') }}" required>
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <label for="current_position" class="form-label">{{ x_('Company Name', 'admin') }} </label>
                                        <input type="text" class="form-control" name="company_name" placeholder="{{ x_('Enter Company Name', 'admin') }}" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="company_website" class="form-label">{{ x_('Company Website', 'admin') }} </label>
                                        <input type="text" class="form-control" name="company_website" placeholder="{{ x_('Enter Company Website', 'admin') }}" >
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="services" class="form-label">{{ x_('Which services are you interested in? *', 'admin') }}</label>
                                        @foreach ($services as $service )
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="id{{ $service->id }}" name="services[]" value="{{ $service->id }}">
                                                <label class="form-check-label" for="id{{ $service->id }}">{{ $service->name }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">{{ x_('Apply', 'admin') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
