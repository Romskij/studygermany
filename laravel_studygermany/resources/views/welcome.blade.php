@extends('layout')

@section('title')
		studygermany
@endsection

@section('content')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
		
		<!-- error field -->
				@if (count($errors) > 0)
						<div class="alert alert-danger" role="alert">
								<h5><strong>PLEASE FILL IN THE FOLLOWING FIELDS:</strong></h5>
								<ul>
										@foreach ($errors->all() as $e)
												<li>{{ $e }}</li>
										@endforeach
								</ul>
						</div>
				@endif

		<!-- AJAX error field -->
				<div class="alert alert-danger print-error-msg" style="display:none">
        		<ul></ul>
    			</div>
				
		<!-- Jumbotron -->
				<div class="jumbotron text-center mb-5">

					<!-- Title -->
					<h2 class="card-title h2">Welcome to studygermany!</h2>
					<img src="assets/logo_studygermany.png" style="max-width: 250px">

					<!-- Grid row -->
					<div class="row d-flex justify-content-center">

						<!-- Grid column -->
						<div class="col-xl-7 pb-2 pt-3">

							<p class="card-text">Apply for your Public German Health Insurance here! We support you with all necessary steps for the entry and stay in Germany including incoming insurance, public health insurance as well as own bank account in Germany, step-by-step! Furthermore, you have the opportunity to get additional exclusive bonuses.</p>

						</div>
					
						<!-- Grid column -->
					
					<div class="w-75 embed-responsive embed-responsive-16by9 mt-5 mb-5">
						<video controls="true" class="embed-responsive-item">
								<source src="https://s3.eu-central-1.amazonaws.com/moov-tt-tk/15AF8985-BCB5-4C3A-A4DB-5707685C8689.mp4#t=0.5" type="video/mp4">
						</video>
					</div>
					
					</div>
					<!-- Grid row -->

					<hr class="my-2">

					<div>
						<a href="#form" class="btn btn-info" role="button">Application</a>
					</div>

				</div>
		<!-- JUMBOTRON END -->
		<!-- LISTS BEGIN -->
				<div class="row">
						<div class="col-sm-12 col-md-6 mb-5">
								<ul class="list-group">
									<li class="bg-primary list-group-item active">YOUR BENEFITS</li>
									<li class="list-group-item">Safety - You're covered from the semester beginning</li>
									<li class="list-group-item">Visa - Adds visa weightage</li>
									<li class="list-group-item">Valid all over Europe</li>
									<li class="list-group-item">Stressfree arrival in Germany</li>
								</ul>
						</div>
						<div class="col-sm-12 col-md-6 mb-5">
								<ol class="list-group">
									<li class="bg-primary list-group-item active">HOW TO REGISTER?</li>
									<li class="list-group-item">1. Fill the form below</li>
									<li class="list-group-item">2. Get an Email confirmation</li>
									<li class="list-group-item">3. Receive your Health Insurance Certificate in 24 Hours *</li>
									<li class="list-group-item">4. Done!</li>
								</ol>
						</div>
				</div>
				<div class="container">
		<!-- Partnership Information -->
					<div class="row">
						<div class="col-xs-12 col-sm-3 mt-4 mb-4">
							<img src="assets/tk_logo_eps.png" class="mx-auto d-block card-img-top pt-1" alt="tk_logo">
						</div>
						<div class="col-xs-12 col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Partnership</h5>
								<p class="card-text">We are official partner of TK, the largest health insurance fund in Germany. TK offers excellent benefits, reasonable contributions and great service. TK, named Germany’s best health insurance fund by Focus Money business magazine</p>
								<a href="assets/Flyer-TK-Highlights%20englisch.pdf" target="_blank" class="card-link">More information</a>
							</div>
						</div>
						</div>
						<div class="col-xs-12 col-sm-3 mt-4 mb-4">
							<img src="assets/focus-money-logo.bmp" class="mx-auto d-block card-img-top pt-1" alt="focus_money_logo">
						</div>
					</div>
				</div>
		<!-- FORM BEGIN PERSONAL INFORMATION-->
				<form id="form" class="mt-5" method="POST" action="/submit" enctype="multipart/form-data">

					{{ csrf_field() }}

					<h3>Personal Information</h3>
					<div class="form-row mb-4">
						<div class="col-sm-12 col-md-2 mb-2">
								<label for="formGroupExampleInput">Gender*</label>
								<select class="form-control" required name="gender" id="gender" value="{{ old('gender') }}">
									<option value="">- Select-</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
						</div>
						<div class="col-sm-12 col-md-4 mb-2">
							<label for="formGroupExampleInput">First name*</label>
							<input type="text" class="form-control" placeholder="First name" required name="firstname" id="firstname" value="{{ old('firstname') }}">
						</div>
						<div class="col-sm-12 col-md-6 mb-2">
							<label for="formGroupExampleInput">Last name*</label>
							<input type="text" class="form-control" placeholder="Last name" required name="lastname" id="lastname" value="{{ old('lastname') }}">
						</div>
					</div>
		<!-- SECOND FORM ROW -->
					<div class="form-row mb-4">
						<div class="col-sm-12 col-md-6 mb-2">
										<label for="formGroupExampleInput">Birthday*</label>
										<input type="text" class="form-control" id="datepicker3" placeholder="e.g. 13.12.98" data-date-format='dd.mm.yy' required name="birthday" value="{{ old('birthday') }}">
						</div>
						<div class="col-sm-12 col-md-6 mb-2">
							<label for="formGroupExampleInput">Place/City of Birth*</label>
							<input type="text" class="form-control" placeholder="Place/City of Birth" required name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth') }}">
						</div>
					</div>
		<!-- THIRD FORM ROW -->
					 <div class="form-row mb-4">
						<div class="col-sm-12 col-md-6 mb-2">
								<label for="formGroupExampleInput">Country of Birth*</label>
								<select class="form-control" required name="country_of_birth" id="country_of_birth" value="{{ old('country_of_birth') }}">
									<option value="">- Select-</option>
									<option value=" Afghanistan "> Afghanistan </option>
									<option value=" Albania "> Albania </option>
									<option value=" Algeria "> Algeria </option>
									<option value=" American Samoa "> American Samoa </option>
									<option value=" Andorra "> Andorra </option>
									<option value=" Angola "> Angola </option>
									<option value=" Anguilla "> Anguilla </option>
									<option value=" Antarctica "> Antarctica </option>
									<option value=" Antigua and Barbuda "> Antigua and Barbuda </option>
									<option value=" Argentina "> Argentina </option>
									<option value=" Armenia "> Armenia </option>
									<option value=" Aruba "> Aruba </option>
									<option value=" Australia "> Australia </option>
									<option value=" Austria "> Austria </option>
									<option value=" Azerbaijan "> Azerbaijan </option>
									<option value=" Bahamas "> Bahamas </option>
									<option value=" Bahrain "> Bahrain </option>
									<option value=" Bangladesh "> Bangladesh </option>
									<option value=" Barbados "> Barbados </option>
									<option value=" Belarus "> Belarus </option>
									<option value=" Belgium "> Belgium </option>
									<option value=" Belize "> Belize </option>
									<option value=" Benin "> Benin </option>
									<option value=" Bermuda "> Bermuda </option>
									<option value=" Bhutan "> Bhutan </option>
									<option value=" Bolivia "> Bolivia </option>
									<option value=" Bosnia and Herzegovina "> Bosnia and Herzegovina </option>
									<option value=" Botswana "> Botswana </option>
									<option value=" Bouvet Island "> Bouvet Island </option>
									<option value=" Brazil "> Brazil </option>
									<option value=" British Antarctic Territory "> British Antarctic Territory </option>
									<option value=" British Indian Ocean Territory "> British Indian Ocean Territory </option>
									<option value=" British Virgin Islands "> British Virgin Islands </option>
									<option value=" Brunei "> Brunei </option>
									<option value=" Bulgaria "> Bulgaria </option>
									<option value=" Burkina Faso "> Burkina Faso </option>
									<option value=" Burundi "> Burundi </option>
									<option value=" Cambodia "> Cambodia </option>
									<option value=" Cameroon "> Cameroon </option>
									<option value=" Canada "> Canada </option>
									<option value=" Canton and Enderbury Islands "> Canton and Enderbury Islands </option>
									<option value=" Cape Verde "> Cape Verde </option>
									<option value=" Cayman Islands "> Cayman Islands </option>
									<option value=" Central African Republic "> Central African Republic </option>
									<option value=" Chad "> Chad </option>
									<option value=" Chile "> Chile </option>
									<option value=" China "> China </option>
									<option value=" Christmas Island "> Christmas Island </option>
									<option value=" Cocos [Keeling] Islands "> Cocos [Keeling] Islands </option>
									<option value=" Colombia "> Colombia </option>
									<option value=" Comoros "> Comoros </option>
									<option value=" Congo - Brazzaville "> Congo - Brazzaville </option>
									<option value=" Congo - Kinshasa "> Congo - Kinshasa </option>
									<option value=" Cook Islands "> Cook Islands </option>
									<option value=" Costa Rica "> Costa Rica </option>
									<option value=" Croatia "> Croatia </option>
									<option value=" Cuba "> Cuba </option>
									<option value=" Cyprus "> Cyprus </option>
									<option value=" Czech Republic "> Czech Republic </option>
									<option value=" Côte d'Ivoire "> Côte d'Ivoire </option>
									<option value=" Denmark "> Denmark </option>
									<option value=" Djibouti "> Djibouti </option>
									<option value=" Dominica "> Dominica </option>
									<option value=" Dominican Republic "> Dominican Republic </option>
									<option value=" Dronning Maud Land "> Dronning Maud Land </option>
									<option value=" East Germany "> East Germany </option>
									<option value=" Ecuador "> Ecuador </option>
									<option value=" Egypt "> Egypt </option>
									<option value=" El Salvador "> El Salvador </option>
									<option value=" Equatorial Guinea "> Equatorial Guinea </option>
									<option value=" Eritrea "> Eritrea </option>
									<option value=" Estonia "> Estonia </option>
									<option value=" Ethiopia "> Ethiopia </option>
									<option value=" Falkland Islands "> Falkland Islands </option>
									<option value=" Faroe Islands "> Faroe Islands </option>
									<option value=" Fiji "> Fiji </option>
									<option value=" Finland "> Finland </option>
									<option value=" France "> France </option>
									<option value=" French Guiana "> French Guiana </option>
									<option value=" French Polynesia "> French Polynesia </option>
									<option value=" French Southern Territories "> French Southern Territories </option>
									<option value=" French Southern and Antarctic Territories "> French Southern and Antarctic Territories </option>
									<option value=" Gabon "> Gabon </option>
									<option value=" Gambia "> Gambia </option>
									<option value=" Georgia "> Georgia </option>
									<option value=" Germany "> Germany </option>
									<option value=" Ghana "> Ghana </option>
									<option value=" Gibraltar "> Gibraltar </option>
									<option value=" Greece "> Greece </option>
									<option value=" Greenland "> Greenland </option>
									<option value=" Grenada "> Grenada </option>
									<option value=" Guadeloupe "> Guadeloupe </option>
									<option value=" Guam "> Guam </option>
									<option value=" Guatemala "> Guatemala </option>
									<option value=" Guernsey "> Guernsey </option>
									<option value=" Guinea "> Guinea </option>
									<option value=" Guinea-Bissau "> Guinea-Bissau </option>
									<option value=" Guyana "> Guyana </option>
									<option value=" Haiti "> Haiti </option>
									<option value=" Heard Island and McDonald Islands "> Heard Island and McDonald Islands </option>
									<option value=" Honduras "> Honduras </option>
									<option value=" Hong Kong SAR China "> Hong Kong SAR China </option>
									<option value=" Hungary "> Hungary </option>
									<option value=" Iceland "> Iceland </option>
									<option value=" India "> India </option>
									<option value=" Indonesia "> Indonesia </option>
									<option value=" Iran "> Iran </option>
									<option value=" Iraq "> Iraq </option>
									<option value=" Ireland "> Ireland </option>
									<option value=" Isle of Man "> Isle of Man </option>
									<option value=" Israel "> Israel </option>
									<option value=" Italy "> Italy </option>
									<option value=" Jamaica "> Jamaica </option>
									<option value=" Japan "> Japan </option>
									<option value=" Jersey "> Jersey </option>
									<option value=" Johnston Island "> Johnston Island </option>
									<option value=" Jordan "> Jordan </option>
									<option value=" Kazakhstan "> Kazakhstan </option>
									<option value=" Kenya "> Kenya </option>
									<option value=" Kiribati "> Kiribati </option>
									<option value=" Kuwait "> Kuwait </option>
									<option value=" Kyrgyzstan "> Kyrgyzstan </option>
									<option value=" Laos "> Laos </option>
									<option value=" Latvia "> Latvia </option>
									<option value=" Lebanon "> Lebanon </option>
									<option value=" Lesotho "> Lesotho </option>
									<option value=" Liberia "> Liberia </option>
									<option value=" Libya "> Libya </option>
									<option value=" Liechtenstein "> Liechtenstein </option>
									<option value=" Lithuania "> Lithuania </option>
									<option value=" Luxembourg "> Luxembourg </option>
									<option value=" Macau SAR China "> Macau SAR China </option>
									<option value=" Macedonia "> Macedonia </option>
									<option value=" Madagascar "> Madagascar </option>
									<option value=" Malawi "> Malawi </option>
									<option value=" Malaysia "> Malaysia </option>
									<option value=" Maldives "> Maldives </option>
									<option value=" Mali "> Mali </option>
									<option value=" Malta "> Malta </option>
									<option value=" Marshall Islands "> Marshall Islands </option>
									<option value=" Martinique "> Martinique </option>
									<option value=" Mauritania "> Mauritania </option>
									<option value=" Mauritius "> Mauritius </option>
									<option value=" Mayotte "> Mayotte </option>
									<option value=" Metropolitan France "> Metropolitan France </option>
									<option value=" Mexico "> Mexico </option>
									<option value=" Micronesia "> Micronesia </option>
									<option value=" Midway Islands "> Midway Islands </option>
									<option value=" Moldova "> Moldova </option>
									<option value=" Monaco "> Monaco </option>
									<option value=" Mongolia "> Mongolia </option>
									<option value=" Montenegro "> Montenegro </option>
									<option value=" Montserrat "> Montserrat </option>
									<option value=" Morocco "> Morocco </option>
									<option value=" Mozambique "> Mozambique </option>
									<option value=" Myanmar [Burma] "> Myanmar [Burma] </option>
									<option value=" Namibia "> Namibia </option>
									<option value=" Nauru "> Nauru </option>
									<option value=" Nepal "> Nepal </option>
									<option value=" Netherlands "> Netherlands </option>
									<option value=" Netherlands Antilles "> Netherlands Antilles </option>
									<option value=" Neutral Zone "> Neutral Zone </option>
									<option value=" New Caledonia "> New Caledonia </option>
									<option value=" New Zealand "> New Zealand </option>
									<option value=" Nicaragua "> Nicaragua </option>
									<option value=" Niger "> Niger </option>
									<option value=" Nigeria "> Nigeria </option>
									<option value=" Niue "> Niue </option>
									<option value=" Norfolk Island "> Norfolk Island </option>
									<option value=" North Korea "> North Korea </option>
									<option value=" North Vietnam "> North Vietnam </option>
									<option value=" Northern Mariana Islands "> Northern Mariana Islands </option>
									<option value=" Norway "> Norway </option>
									<option value=" Oman "> Oman </option>
									<option value=" Pacific Islands Trust Territory "> Pacific Islands Trust Territory </option>
									<option value=" Pakistan "> Pakistan </option>
									<option value=" Palau "> Palau </option>
									<option value=" Palestinian Territories "> Palestinian Territories </option>
									<option value=" Panama "> Panama </option>
									<option value=" Panama Canal Zone "> Panama Canal Zone </option>
									<option value=" Papua New Guinea "> Papua New Guinea </option>
									<option value=" Paraguay "> Paraguay </option>
									<option value=" People's Democratic Republic of Yemen "> People's Democratic Republic of Yemen </option>
									<option value=" Peru "> Peru </option>
									<option value=" Philippines "> Philippines </option>
									<option value=" Pitcairn Islands "> Pitcairn Islands </option>
									<option value=" Poland "> Poland </option>
									<option value=" Portugal "> Portugal </option>
									<option value=" Puerto Rico "> Puerto Rico </option>
									<option value=" Qatar "> Qatar </option>
									<option value=" Romania "> Romania </option>
									<option value=" Russia "> Russia </option>
									<option value=" Rwanda "> Rwanda </option>
									<option value=" Réunion "> Réunion </option>
									<option value=" Saint Barthélemy "> Saint Barthélemy </option>
									<option value=" Saint Helena "> Saint Helena </option>
									<option value=" Saint Kitts and Nevis "> Saint Kitts and Nevis </option>
									<option value=" Saint Lucia "> Saint Lucia </option>
									<option value=" Saint Martin "> Saint Martin </option>
									<option value=" Saint Pierre and Miquelon "> Saint Pierre and Miquelon </option>
									<option value=" Saint Vincent and the Grenadines "> Saint Vincent and the Grenadines </option>
									<option value=" Samoa "> Samoa </option>
									<option value=" San Marino "> San Marino </option>
									<option value=" Saudi Arabia "> Saudi Arabia </option>
									<option value=" Senegal "> Senegal </option>
									<option value=" Serbia "> Serbia </option>
									<option value=" Serbia and Montenegro "> Serbia and Montenegro </option>
									<option value=" Seychelles "> Seychelles </option>
									<option value=" Sierra Leone "> Sierra Leone </option>
									<option value=" Singapore "> Singapore </option>
									<option value=" Slovakia "> Slovakia </option>
									<option value=" Slovenia "> Slovenia </option>
									<option value=" Solomon Islands "> Solomon Islands </option>
									<option value=" Somalia "> Somalia </option>
									<option value=" South Africa "> South Africa </option>
									<option value=" South Georgia and the South Sandwich Islands "> South Georgia and the South Sandwich Islands </option>
									<option value=" South Korea "> South Korea </option>
									<option value=" Spain "> Spain </option>
									<option value=" Sri Lanka "> Sri Lanka </option>
									<option value=" Sudan "> Sudan </option>
									<option value=" Suriname "> Suriname </option>
									<option value=" Svalbard and Jan Mayen "> Svalbard and Jan Mayen </option>
									<option value=" Swaziland "> Swaziland </option>
									<option value=" Sweden "> Sweden </option>
									<option value=" Switzerland "> Switzerland </option>
									<option value=" Syria "> Syria </option>
									<option value=" São Tomé and Príncipe "> São Tomé and Príncipe </option>
									<option value=" Taiwan "> Taiwan </option>
									<option value=" Tajikistan "> Tajikistan </option>
									<option value=" Tanzania "> Tanzania </option>
									<option value=" Thailand "> Thailand </option>
									<option value=" Timor-Leste "> Timor-Leste </option>
									<option value=" Togo "> Togo </option>
									<option value=" Tokelau "> Tokelau </option>
									<option value=" Tonga "> Tonga </option>
									<option value=" Trinidad and Tobago "> Trinidad and Tobago </option>
									<option value=" Tunisia "> Tunisia </option>
									<option value=" Turkey "> Turkey </option>
									<option value=" Turkmenistan "> Turkmenistan </option>
									<option value=" Turks and Caicos Islands "> Turks and Caicos Islands </option>
									<option value=" Tuvalu "> Tuvalu </option>
									<option value=" U.S. Minor Outlying Islands "> U.S. Minor Outlying Islands </option>
									<option value=" U.S. Miscellaneous Pacific Islands "> U.S. Miscellaneous Pacific Islands </option>
									<option value=" U.S. Virgin Islands "> U.S. Virgin Islands </option>
									<option value=" Uganda "> Uganda </option>
									<option value=" Ukraine "> Ukraine </option>
									<option value=" Union of Soviet Socialist Republics "> Union of Soviet Socialist Republics </option>
									<option value=" United Arab Emirates "> United Arab Emirates </option>
									<option value=" United Kingdom "> United Kingdom </option>
									<option value=" United States "> United States </option>
									<option value=" Unknown or Invalid Region "> Unknown or Invalid Region </option>
									<option value=" Uruguay "> Uruguay </option>
									<option value=" Uzbekistan "> Uzbekistan </option>
									<option value=" Vanuatu "> Vanuatu </option>
									<option value=" Vatican City "> Vatican City </option>
									<option value=" Venezuela "> Venezuela </option>
									<option value=" Vietnam "> Vietnam </option>
									<option value=" Wake Island "> Wake Island </option>
									<option value=" Wallis and Futuna "> Wallis and Futuna </option>
									<option value=" Western Sahara "> Western Sahara </option>
									<option value=" Yemen "> Yemen </option>
									<option value=" Zambia "> Zambia </option>
									<option value=" Zimbabwe "> Zimbabwe </option>
									<option value=" Åland Islands "> Åland Islands </option>
								</select>
						</div>
						<div class="col-sm-12 col-md-6 mb-2">
								<label for="formGroupExampleInput">Nationality*</label>
								<select class="form-control" required name="nationality" id="nationality" value="{{ old('nationality') }}">
									<option value="">- Select-</option>
									<option value=" Afghanistan "> Afghanistan </option>
									<option value=" Albania "> Albania </option>
									<option value=" Algeria "> Algeria </option>
									<option value=" American Samoa "> American Samoa </option>
									<option value=" Andorra "> Andorra </option>
									<option value=" Angola "> Angola </option>
									<option value=" Anguilla "> Anguilla </option>
									<option value=" Antarctica "> Antarctica </option>
									<option value=" Antigua and Barbuda "> Antigua and Barbuda </option>
									<option value=" Argentina "> Argentina </option>
									<option value=" Armenia "> Armenia </option>
									<option value=" Aruba "> Aruba </option>
									<option value=" Australia "> Australia </option>
									<option value=" Austria "> Austria </option>
									<option value=" Azerbaijan "> Azerbaijan </option>
									<option value=" Bahamas "> Bahamas </option>
									<option value=" Bahrain "> Bahrain </option>
									<option value=" Bangladesh "> Bangladesh </option>
									<option value=" Barbados "> Barbados </option>
									<option value=" Belarus "> Belarus </option>
									<option value=" Belgium "> Belgium </option>
									<option value=" Belize "> Belize </option>
									<option value=" Benin "> Benin </option>
									<option value=" Bermuda "> Bermuda </option>
									<option value=" Bhutan "> Bhutan </option>
									<option value=" Bolivia "> Bolivia </option>
									<option value=" Bosnia and Herzegovina "> Bosnia and Herzegovina </option>
									<option value=" Botswana "> Botswana </option>
									<option value=" Bouvet Island "> Bouvet Island </option>
									<option value=" Brazil "> Brazil </option>
									<option value=" British Antarctic Territory "> British Antarctic Territory </option>
									<option value=" British Indian Ocean Territory "> British Indian Ocean Territory </option>
									<option value=" British Virgin Islands "> British Virgin Islands </option>
									<option value=" Brunei "> Brunei </option>
									<option value=" Bulgaria "> Bulgaria </option>
									<option value=" Burkina Faso "> Burkina Faso </option>
									<option value=" Burundi "> Burundi </option>
									<option value=" Cambodia "> Cambodia </option>
									<option value=" Cameroon "> Cameroon </option>
									<option value=" Canada "> Canada </option>
									<option value=" Canton and Enderbury Islands "> Canton and Enderbury Islands </option>
									<option value=" Cape Verde "> Cape Verde </option>
									<option value=" Cayman Islands "> Cayman Islands </option>
									<option value=" Central African Republic "> Central African Republic </option>
									<option value=" Chad "> Chad </option>
									<option value=" Chile "> Chile </option>
									<option value=" China "> China </option>
									<option value=" Christmas Island "> Christmas Island </option>
									<option value=" Cocos [Keeling] Islands "> Cocos [Keeling] Islands </option>
									<option value=" Colombia "> Colombia </option>
									<option value=" Comoros "> Comoros </option>
									<option value=" Congo - Brazzaville "> Congo - Brazzaville </option>
									<option value=" Congo - Kinshasa "> Congo - Kinshasa </option>
									<option value=" Cook Islands "> Cook Islands </option>
									<option value=" Costa Rica "> Costa Rica </option>
									<option value=" Croatia "> Croatia </option>
									<option value=" Cuba "> Cuba </option>
									<option value=" Cyprus "> Cyprus </option>
									<option value=" Czech Republic "> Czech Republic </option>
									<option value=" Côte d'Ivoire "> Côte d'Ivoire </option>
									<option value=" Denmark "> Denmark </option>
									<option value=" Djibouti "> Djibouti </option>
									<option value=" Dominica "> Dominica </option>
									<option value=" Dominican Republic "> Dominican Republic </option>
									<option value=" Dronning Maud Land "> Dronning Maud Land </option>
									<option value=" East Germany "> East Germany </option>
									<option value=" Ecuador "> Ecuador </option>
									<option value=" Egypt "> Egypt </option>
									<option value=" El Salvador "> El Salvador </option>
									<option value=" Equatorial Guinea "> Equatorial Guinea </option>
									<option value=" Eritrea "> Eritrea </option>
									<option value=" Estonia "> Estonia </option>
									<option value=" Ethiopia "> Ethiopia </option>
									<option value=" Falkland Islands "> Falkland Islands </option>
									<option value=" Faroe Islands "> Faroe Islands </option>
									<option value=" Fiji "> Fiji </option>
									<option value=" Finland "> Finland </option>
									<option value=" France "> France </option>
									<option value=" French Guiana "> French Guiana </option>
									<option value=" French Polynesia "> French Polynesia </option>
									<option value=" French Southern Territories "> French Southern Territories </option>
									<option value=" French Southern and Antarctic Territories "> French Southern and Antarctic Territories </option>
									<option value=" Gabon "> Gabon </option>
									<option value=" Gambia "> Gambia </option>
									<option value=" Georgia "> Georgia </option>
									<option value=" Germany "> Germany </option>
									<option value=" Ghana "> Ghana </option>
									<option value=" Gibraltar "> Gibraltar </option>
									<option value=" Greece "> Greece </option>
									<option value=" Greenland "> Greenland </option>
									<option value=" Grenada "> Grenada </option>
									<option value=" Guadeloupe "> Guadeloupe </option>
									<option value=" Guam "> Guam </option>
									<option value=" Guatemala "> Guatemala </option>
									<option value=" Guernsey "> Guernsey </option>
									<option value=" Guinea "> Guinea </option>
									<option value=" Guinea-Bissau "> Guinea-Bissau </option>
									<option value=" Guyana "> Guyana </option>
									<option value=" Haiti "> Haiti </option>
									<option value=" Heard Island and McDonald Islands "> Heard Island and McDonald Islands </option>
									<option value=" Honduras "> Honduras </option>
									<option value=" Hong Kong SAR China "> Hong Kong SAR China </option>
									<option value=" Hungary "> Hungary </option>
									<option value=" Iceland "> Iceland </option>
									<option value=" India "> India </option>
									<option value=" Indonesia "> Indonesia </option>
									<option value=" Iran "> Iran </option>
									<option value=" Iraq "> Iraq </option>
									<option value=" Ireland "> Ireland </option>
									<option value=" Isle of Man "> Isle of Man </option>
									<option value=" Israel "> Israel </option>
									<option value=" Italy "> Italy </option>
									<option value=" Jamaica "> Jamaica </option>
									<option value=" Japan "> Japan </option>
									<option value=" Jersey "> Jersey </option>
									<option value=" Johnston Island "> Johnston Island </option>
									<option value=" Jordan "> Jordan </option>
									<option value=" Kazakhstan "> Kazakhstan </option>
									<option value=" Kenya "> Kenya </option>
									<option value=" Kiribati "> Kiribati </option>
									<option value=" Kuwait "> Kuwait </option>
									<option value=" Kyrgyzstan "> Kyrgyzstan </option>
									<option value=" Laos "> Laos </option>
									<option value=" Latvia "> Latvia </option>
									<option value=" Lebanon "> Lebanon </option>
									<option value=" Lesotho "> Lesotho </option>
									<option value=" Liberia "> Liberia </option>
									<option value=" Libya "> Libya </option>
									<option value=" Liechtenstein "> Liechtenstein </option>
									<option value=" Lithuania "> Lithuania </option>
									<option value=" Luxembourg "> Luxembourg </option>
									<option value=" Macau SAR China "> Macau SAR China </option>
									<option value=" Macedonia "> Macedonia </option>
									<option value=" Madagascar "> Madagascar </option>
									<option value=" Malawi "> Malawi </option>
									<option value=" Malaysia "> Malaysia </option>
									<option value=" Maldives "> Maldives </option>
									<option value=" Mali "> Mali </option>
									<option value=" Malta "> Malta </option>
									<option value=" Marshall Islands "> Marshall Islands </option>
									<option value=" Martinique "> Martinique </option>
									<option value=" Mauritania "> Mauritania </option>
									<option value=" Mauritius "> Mauritius </option>
									<option value=" Mayotte "> Mayotte </option>
									<option value=" Metropolitan France "> Metropolitan France </option>
									<option value=" Mexico "> Mexico </option>
									<option value=" Micronesia "> Micronesia </option>
									<option value=" Midway Islands "> Midway Islands </option>
									<option value=" Moldova "> Moldova </option>
									<option value=" Monaco "> Monaco </option>
									<option value=" Mongolia "> Mongolia </option>
									<option value=" Montenegro "> Montenegro </option>
									<option value=" Montserrat "> Montserrat </option>
									<option value=" Morocco "> Morocco </option>
									<option value=" Mozambique "> Mozambique </option>
									<option value=" Myanmar [Burma] "> Myanmar [Burma] </option>
									<option value=" Namibia "> Namibia </option>
									<option value=" Nauru "> Nauru </option>
									<option value=" Nepal "> Nepal </option>
									<option value=" Netherlands "> Netherlands </option>
									<option value=" Netherlands Antilles "> Netherlands Antilles </option>
									<option value=" Neutral Zone "> Neutral Zone </option>
									<option value=" New Caledonia "> New Caledonia </option>
									<option value=" New Zealand "> New Zealand </option>
									<option value=" Nicaragua "> Nicaragua </option>
									<option value=" Niger "> Niger </option>
									<option value=" Nigeria "> Nigeria </option>
									<option value=" Niue "> Niue </option>
									<option value=" Norfolk Island "> Norfolk Island </option>
									<option value=" North Korea "> North Korea </option>
									<option value=" North Vietnam "> North Vietnam </option>
									<option value=" Northern Mariana Islands "> Northern Mariana Islands </option>
									<option value=" Norway "> Norway </option>
									<option value=" Oman "> Oman </option>
									<option value=" Pacific Islands Trust Territory "> Pacific Islands Trust Territory </option>
									<option value=" Pakistan "> Pakistan </option>
									<option value=" Palau "> Palau </option>
									<option value=" Palestinian Territories "> Palestinian Territories </option>
									<option value=" Panama "> Panama </option>
									<option value=" Panama Canal Zone "> Panama Canal Zone </option>
									<option value=" Papua New Guinea "> Papua New Guinea </option>
									<option value=" Paraguay "> Paraguay </option>
									<option value=" People's Democratic Republic of Yemen "> People's Democratic Republic of Yemen </option>
									<option value=" Peru "> Peru </option>
									<option value=" Philippines "> Philippines </option>
									<option value=" Pitcairn Islands "> Pitcairn Islands </option>
									<option value=" Poland "> Poland </option>
									<option value=" Portugal "> Portugal </option>
									<option value=" Puerto Rico "> Puerto Rico </option>
									<option value=" Qatar "> Qatar </option>
									<option value=" Romania "> Romania </option>
									<option value=" Russia "> Russia </option>
									<option value=" Rwanda "> Rwanda </option>
									<option value=" Réunion "> Réunion </option>
									<option value=" Saint Barthélemy "> Saint Barthélemy </option>
									<option value=" Saint Helena "> Saint Helena </option>
									<option value=" Saint Kitts and Nevis "> Saint Kitts and Nevis </option>
									<option value=" Saint Lucia "> Saint Lucia </option>
									<option value=" Saint Martin "> Saint Martin </option>
									<option value=" Saint Pierre and Miquelon "> Saint Pierre and Miquelon </option>
									<option value=" Saint Vincent and the Grenadines "> Saint Vincent and the Grenadines </option>
									<option value=" Samoa "> Samoa </option>
									<option value=" San Marino "> San Marino </option>
									<option value=" Saudi Arabia "> Saudi Arabia </option>
									<option value=" Senegal "> Senegal </option>
									<option value=" Serbia "> Serbia </option>
									<option value=" Serbia and Montenegro "> Serbia and Montenegro </option>
									<option value=" Seychelles "> Seychelles </option>
									<option value=" Sierra Leone "> Sierra Leone </option>
									<option value=" Singapore "> Singapore </option>
									<option value=" Slovakia "> Slovakia </option>
									<option value=" Slovenia "> Slovenia </option>
									<option value=" Solomon Islands "> Solomon Islands </option>
									<option value=" Somalia "> Somalia </option>
									<option value=" South Africa "> South Africa </option>
									<option value=" South Georgia and the South Sandwich Islands "> South Georgia and the South Sandwich Islands </option>
									<option value=" South Korea "> South Korea </option>
									<option value=" Spain "> Spain </option>
									<option value=" Sri Lanka "> Sri Lanka </option>
									<option value=" Sudan "> Sudan </option>
									<option value=" Suriname "> Suriname </option>
									<option value=" Svalbard and Jan Mayen "> Svalbard and Jan Mayen </option>
									<option value=" Swaziland "> Swaziland </option>
									<option value=" Sweden "> Sweden </option>
									<option value=" Switzerland "> Switzerland </option>
									<option value=" Syria "> Syria </option>
									<option value=" São Tomé and Príncipe "> São Tomé and Príncipe </option>
									<option value=" Taiwan "> Taiwan </option>
									<option value=" Tajikistan "> Tajikistan </option>
									<option value=" Tanzania "> Tanzania </option>
									<option value=" Thailand "> Thailand </option>
									<option value=" Timor-Leste "> Timor-Leste </option>
									<option value=" Togo "> Togo </option>
									<option value=" Tokelau "> Tokelau </option>
									<option value=" Tonga "> Tonga </option>
									<option value=" Trinidad and Tobago "> Trinidad and Tobago </option>
									<option value=" Tunisia "> Tunisia </option>
									<option value=" Turkey "> Turkey </option>
									<option value=" Turkmenistan "> Turkmenistan </option>
									<option value=" Turks and Caicos Islands "> Turks and Caicos Islands </option>
									<option value=" Tuvalu "> Tuvalu </option>
									<option value=" U.S. Minor Outlying Islands "> U.S. Minor Outlying Islands </option>
									<option value=" U.S. Miscellaneous Pacific Islands "> U.S. Miscellaneous Pacific Islands </option>
									<option value=" U.S. Virgin Islands "> U.S. Virgin Islands </option>
									<option value=" Uganda "> Uganda </option>
									<option value=" Ukraine "> Ukraine </option>
									<option value=" Union of Soviet Socialist Republics "> Union of Soviet Socialist Republics </option>
									<option value=" United Arab Emirates "> United Arab Emirates </option>
									<option value=" United Kingdom "> United Kingdom </option>
									<option value=" United States "> United States </option>
									<option value=" Unknown or Invalid Region "> Unknown or Invalid Region </option>
									<option value=" Uruguay "> Uruguay </option>
									<option value=" Uzbekistan "> Uzbekistan </option>
									<option value=" Vanuatu "> Vanuatu </option>
									<option value=" Vatican City "> Vatican City </option>
									<option value=" Venezuela "> Venezuela </option>
									<option value=" Vietnam "> Vietnam </option>
									<option value=" Wake Island "> Wake Island </option>
									<option value=" Wallis and Futuna "> Wallis and Futuna </option>
									<option value=" Western Sahara "> Western Sahara </option>
									<option value=" Yemen "> Yemen </option>
									<option value=" Zambia "> Zambia </option>
									<option value=" Zimbabwe "> Zimbabwe </option>
									<option value=" Åland Islands "> Åland Islands </option>
								</select>
						</div>
					</div>
		<!-- FOURTH FORM ROW -->
					<div class="form-row mb-4">
						<div class="col-sm-12 col-md-6 mb-2">
							<label for="formGroupExampleInput">Phone Number*</label>
							<input type="tel" class="form-control" placeholder="e.g. 007 495 123 4567" required name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
							<small id="important" class="form-text text-muted" style="color: blue!important">IMPORTANT! Reachable number required for contacting<br> and sending your insurance within 24 hours! </small>
						</div>
						<div class="col-sm-12 col-md-6 mb-2">
							<label for="formGroupExampleInput">Email Address*</label>
							<input type="email" class="form-control" placeholder="Email Address" required name="email" id="email" value="{{ old('email') }}">
						</div>
					</div>
		<!-- ADMISSION DETAILS -->
					<h3>Admission Details</h3>
						<div class="form-row mb-4">
							<div class="col">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="degree" id="inlineRadio1" value="Bachelor" required>
									<label class="form-check-label" for="inlineRadio1">Bachelor</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="degree" id="inlineRadio2" value="Masters">
									<label class="form-check-label" for="inlineRadio2">Masters</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="degree" id="inlineRadio3" value="PhD candidate">
									<label class="form-check-label" for="inlineRadio3">PhD candidate</label>
								</div>
							</div>
						</div>
		<!-- UNIVERSITY AND SEMESTER BEGIN -->
						<div class="form-row mb-4">
								<div class="col-sm-12 col-md-6 mb-2">
										<label for="formGroupExampleInput">University*</label>
										<input type="text" class="form-control" placeholder="University" required name="university" id="university" value="{{ old('university') }}">
								</div>
								<div class="col-sm-12 col-md-6 mb-2">
										<label for="formGroupExampleInput">Semester beginning* (As on admit letter!)</label>
										<select class="form-control" required name="semester_begin" id="semester_begin" value="{{ old('semester_begin') }}">
												<option value="">Please select</option>
												<option value="01/02/2019">01/02/2019</option>
												<option value="01/03/2019">01/03/2019</option>
												<option value="01/04/2019">01/04/2019</option>
												<option value="01/05/2019">01/05/2019</option>
												<option value="01/06/2019">01/06/2019</option>
												<option value="01/07/2019">01/07/2019</option>
												<option value="01/08/2019">01/08/2019</option>
												<option value="01/09/2019">01/09/2019</option>
												<option value="01/10/2019">01/10/2019</option>
												<option value="01/11/2019">01/11/2019</option>
												<option value="01/12/2019">01/12/2019</option>
												<option value="01/01/2020">01/01/2020</option>
												<option value="01/02/2020">01/02/2020</option>
												<option value="01/03/2020">01/03/2020</option>
												<option value="01/04/2020">01/04/2020</option>
												<option value="01/05/2020">01/05/2020</option>
												<option value="01/06/2020">01/06/2020</option>
												<option value="01/07/2020">01/07/2020</option>
												<option value="01/08/2020">01/08/2020</option>
												<option value="01/09/2020">01/09/2020</option>
												<option value="01/10/2020">01/10/2020</option>
												<option value="01/11/2020">01/11/2020</option>
												<option value="01/12/2020">01/12/2020</option>
										</select>
								</div>
						</div>
		<!-- PROGRAM AND GRADUATION DATE -->
						<div class="form-row mb-4">
								<div class="col-sm-12 col-md-6 mb-2">
										<label for="formGroupExampleInput">Name of the Program/Course*</label>
										<input type="text" class="form-control" placeholder="Program name including Masters or Bachelors" required name="name_of_program" id="name_of_program" value="{{ old('name_of_program') }}">
								</div>
								<div class="col-sm-12 col-md-6 mb-2">
										<label for="formGroupExampleInput">Expected Graduation Date*</label>
										<input type="text" class="form-control" id="datepicker" placeholder="Expected Graduation Date" data-date-format='dd.mm.yy' required name="expected_graduation_date" value="{{ old('expected_graduation_date') }}">
								</div>
						</div>
		<!-- BANK DETAILS BEGIN -->
						<h3>Bank Details</h3>
						<h5>(Leave blank if you don't have the information yet)</h5>
						<div class="form-row mb-4">
								<div class="col-sm-12">
										<label for="formGroupExampleInput">Bank Name</label>
										<input type="text" class="form-control" placeholder="Bank Name" name="bank_name" id="bank_name" value="{{ old('bank_name') }}">
								</div>
						</div>
						<div class="form-row mb-4">
								<div class="col-sm-12 col-md-4 mb-2">
										<label for="formGroupExampleInput">IBAN</label>
										<input type="text" class="form-control" placeholder="DE __ ________ __________" name="bank_iban" id="bank_iban" value="{{ old('bank_iban') }}">
								</div>
								<div class="col-sm-12 col-md-2 mb-2">
										<h5 class="text-center">OR</h5>
								</div>
								<div class="col-sm-12 col-md-3 mb-2">
										<label for="formGroupExampleInput">Account Number</label>
										<input type="text" class="form-control" placeholder="Account Number" name="bank_acount_number" id="bank_acount_number" value="{{ old('bank_acount-number') }}">
								</div>
								<div class="col-sm-12 col-md-3 mb-2">
										<label for="formGroupExampleInput">Branch Code</label>
										<input type="text" class="form-control" placeholder="Branch Code" name="bank_branch_code" id="bank_branch_code" value="{{ old('bank_branch-code') }}">
								</div>
						</div>
		<!-- DOCUMENTS BEGIN -->
						<h3>Documents</h3>
						<div class="form-row mb-4">
								<div class="col-sm-12 col-md-4">
										<div class="form-group">
												<label for="exampleFormControlFile1">Admit letter</label>
												<input multiple="multiple" type="file" class="form-control-file" id="exampleFormControlFile1" name="admit_letter" accept=".png, .jpg, .jpeg, .pdf">
										</div>
								</div>  
								<div class="col-sm-12 col-md-4 mb-2">
										<div class="form-group">
												<label for="exampleFormControlFile1">Passport (First Page)</label>
												<input multiple="multiple" type="file" class="form-control-file" id="exampleFormControlFile2" name="passport_first_page" accept=".png, .jpg, .jpeg, .pdf">
										</div>
								</div>
								<div class="col-sm-12 col-md-4 mb-2">
										<div class="form-group">
												<label for="exampleFormControlFile1">Passport (Last Page)</label>
												<input multiple="multiple" type="file" class="form-control-file" id="exampleFormControlFile3" name="passport_last_page" accept=".png, .jpg, .jpeg, .pdf">
										</div>
								</div>
						</div>
		<!-- TRAVEL DETAILS BEGIN -->
						<h3>Travel Details</h3>
						<div class="form-row mb-4">
								<div class="col-sm-12 col-md-3 mb-2">
										<label for="formGroupExampleInput">Travel Date*</label>
										<input type="text" class="form-control" id="datepicker1" placeholder="Travel Date" data-date-format='dd.mm.yy' required name="travel_date" value="{{ old('travel_date') }}">
										<small id="important" class="form-text text-muted" style="color: blue!important">(Intended travel date if not sure)</small>
								</div>
								<div class="col-sm-12 col-md-6 mb-2">
										<label for="formGroupExampleInput">Nominee Name*</label>
										<input type="text" class="form-control" id="nominee_name" placeholder="Nominee Name" required name="nominee_name" value="{{ old('nominee_name') }}">
										<small id="important" class="form-text text-muted" style="color: blue!important">(EITHER Mother or Father's NAME)</small>
								</div>
								<div class="col-sm-12 col-md-3 mb-2">
										<label for="formGroupExampleInput">Nominee Date Of Birth*</label>
										<input type="text" class="form-control" id="datepicker2" placeholder="Nominee Date Of Birth" data-date-format='dd.mm.yy' required name="nominee_date_of_birth" value="{{ old('nominee_date_of_birth') }}">
										<small id="important" class="form-text text-muted" style="color: blue!important">(EITHER Mother or Father's Date of Birth)</small>
								</div>
						</div>
						<div class="form-row mb-4 mb-4">
								<div class="col-sm-12">
										<label for="formGroupExampleInput">Comments</label>
										<input type="text" class="form-control" placeholder="Comments" name="comments" id="comments" value="{{ old('comments') }}">
								</div>
						</div>
						<h5>Please sign below   <img src="assets/Pen-icon.png"></h5>
						<small id="important" class="form-text text-muted" style="color: blue!important">(Relax, it doesn't has to be perfect)</small>
						<h5>&#8675;&#8675;&#8675;&#8675;&#8675;&#8675;&#8675;&#8675;&#8675;</h5>
						<div class="form-row mb-3">
							<div class="wrapper mb-3">
								<canvas id="signature-pad" class="signature-pad" width="400" height="200"></canvas>
								<input type="hidden" name="signature">
							</div>
						</div>
						<div class="form-row mb-3">
							<button id="undo">Undo</button>
							<button id="clear">Clear</button>
						</div>
						<div class="form-row mb-4">
								<div class="col-sm-10 mb-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck1" required name="sepa_mandate_confirmed" value="1">
										<label class="form-check-label" for="gridCheck1">
											I agree with the issuance of a SEPA direct debit mandate for chosen Insurance Company.*
										</label>
									</div>
								</div>
								<div class="col-sm-10 mb-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck1" required name="terms_c_confirmed" value="1">
										<label class="form-check-label" for="gridCheck1">
											I have read and understood the <a href="#termsandconditionsmodal" data-toggle="modal" data-target="#termsandconditionsmodal">terms and conditions policy</a> and the <a href="#initialinformation" data-toggle="modal" data-target="#initialinformation">initial information</a>* (It is mandatory that you must sign first and then check this checkbox)
										</label>
									</div>
								</div>
								<div class="col-sm-10 mb-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck1" name="private_thi_confirmed" value="1">
										<label class="form-check-label" for="gridCheck1">
											I also would like to apply for Private Travel Health Insurance to cover the VISA requirements for German Student Visa. (If yes, write your travel date in the comment section above)
										</label>
									</div>
								</div>
						</div>
						<input type="hidden" name="is-already-saved" value="0">
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" data-action="save" id="save" class="btn btn-primary">Apply</button>
							</div>
						</div>
						
				</form>
			 
		<!-- <input type="button" id="button" value="Submit"/> -->

		<!-- Popus for the booleans -->

		<div class="modal fade" id="termsandconditionsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>By registering online for the health insurance, you agree to our terms and conditions and the free travel insurance offer is subjective to change upon studygermany discretion.</p>
					<!-- <p>Register for German health insurance and get 25 Euros worth of 6 months travel insurance for FREE from BestCare Solutions.</p> 
					<p>* Free travel insurance is offered only with German Health insurance registration and its subsequent activation.</p> 
					<p>Travel insurance confirmation will be sent within 24 hours, if registered 8 AM to 6 PM IST on weekdays.</p> -->
					<p>The German Health insurance confirmation will be sent within 24 hours on business days, CET time.</p>
					<!-- <p>Travel insurance can be sent within 1 hour only to help in urgent cases. In general, we revert to you within 2 - 4 hours if registered between 8 AM to 6 PM IST on weekdays to process travel insurance.</p> -->
					<p>Travel date change requests to be sent 1 day before the desired timeline.</p>
					<!-- <p>Referral bonus to be paid out only upon successful activation of TK health insurance by the referrals.</p> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="initialinformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Initial Information (German)</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<p class="card-text"><strong>fine & fair Unternehmergesellschaft für Wirtschaftsberatung (haftungsbeschränkt)</strong></p>
                        <p>
                            Hauptstr. 172<br>76297 Stutensee
                        </p>
                        <p>
                            mobil: 0176-82001957<br>fax: 07244-5560867<br>email: kontakt@fineandfair.de<br>internet: www.fineandfair.de
                        </p>
                        <p>
                            <strong>Vertretungsberechtigter Geschäftsführer:</strong><br>Alexander Tschernyschow
                        </p>
                        <p>
                            <strong>Registereintrag:
                            </strong><br>Amtsgericht Mannheim HRB 723664
                        </p>
                        <p>
                            <strong>Aufsichtsbehörde:
                            </strong><br>Industrie- und Handelskammer Karlsruhe, Lammstraße 13-17, 76133 Karlsruhe<br>Telefon: (0721) 174-0 Fax: (0721) 174-240 E-Mail: info@karlsruhe.ihk.de 
                        </p>
                        <p>
                            <strong>Registratur:</strong><br>Versicherungsmakler mit Erlaubnis nach § 34d Abs. 1 GewO <br>Registrierungsnummer: D-C4R0-ICQLG-51<br>Finanzanlagenvermittler mit Erlaubnis nach § 34 f Abs. 1 S. 1 GewO <br>Registrierungsnummer: D-F-138-3542-53<br>Darlehensvermittler mit Erlaubnis nach § 34 c Abs. 1 Nr. 1 a GewO
                        </p>
                        <p>
                            Es besteht eine Vermögenschadenversicherung nach den gesetzlichen Vorgaben bei der Liberty Mutual Insurance Europe Ltd..
                        </p>
                        <p>
                            <strong>Schlichtungsstelle/Beschwerdestelle:</strong><br>Versicherungsombudsmann e. V., Postfach 080632, D-10006 Berlin<br>Internet: www.versicherungsombudsmann.de<br>Ombudsmann für die private Kranken- und Pflegeversicherung, Kronenstraße 13, D-10117 Berlin<br>Internet: www.pkv-ombudsmann.de
                        </p>
                        <p>
                            Bundesanstalt für Finanzdienstleistungen (BAFin), Graurheindorfer Straße 108, D-53117 Bonn<br>Internet: www.bafin.de
                        </p>
                        <p>
                            <strong>Zuständiges Gewerbeamt:</strong><br>Stadt Stutensee<br>Rathausstr. 3<br>76297 Stutensee
                        </p>
                        <p>
                            <strong>Haftungshinweis:</strong><br>Keinerlei Gewähr für Vollständigkeit, Richtigkeit und Aktualität. Jegliche Haftung ist ausgeschlossen. Trotz sorgfältiger inhaltlicher Kontrolle übernehmen wir keine Haftung für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich.
                        </p>
                        <p>
                            <strong>Gemeinsame Registerstelle nach § 11 a Abs. 1 GewO:</strong><br>DIHK | Deutscher Industrie‐ und Handelskammertag e.V.   <br>Breite Straße 29  |  10178 Berlin   <br>Tel.: 0180 6005850  (20 Cent/Min aus dem deutschen Festnetz, höchstens 60 Cent/Minute aus Mobilfunknetzen)  <a href="https://www.vermittlerregister.info/" target="_blank">www.vermittlerregister.info</a>
                        </p>
                        <p>
                            <strong>Beteiligungen an Versicherungsunternehmen:</strong><br>fine & fair Unternehmergesellschaft für Wirtschaftsberatung (haftungsbeschränkt) hält keine Beteiligungen an Stimmrechten oder dem Kapital von  Versicherungsunternehmen. Es gibt keine Beteiligungen von Versicherungsunternehmen an den  Stimmrechten oder dem Kapital der fine & fair Unternehmergesellschaft für Wirtschaftsberatung (haftungsbeschränkt).
                        </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>


		
	<script>
		$('#button, #save').click(function() {
			var doc = new jsPDF();

			doc.addImage(imgData, 'JPEG', 0, 0, 210, 297);
			
			var canvas = document.querySelector("canvas");
			var data = canvas.toDataURL('image/png');
			$("[name=signature]").val(data);
			doc.addImage(data, 'png', 151, 197, 39, 12);

			var semester_begin = $('#semester_begin').val();
			var gender = $('#gender').val();
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var birthday = $('#datepicker3').val();
			var place_of_birth = $('#place_of_birth').val();
			var country_of_birth = $('#country_of_birth').val();
			var nationality = $('#nationality').val();
			var phone_number = $('#phone_number').val();
			var email = $('#email').val();
			var degree = $('#degree').val();
			var university = $('#university').val();
			var name_of_program = $('#name_of_program').val();
			var expected_graduation_date = $('#datepicker').val();
			var bank_name = $('#bank_name').val();
			var bank_iban = $('#bank_iban').val();
			var bank_acount_number = $('#bank_acount_number').val();
			var bank_branch_code = $('#bank_branch_code').val();
			var travel_date = $('#travel_date').val();
			var nominee_name = $('#nominee_name').val();
			var nominee_date_of_birth = $('#nominee_date_of_birth').val();
			var comments = $('#comments').val();
			var sepa_mandate_confirmed = $('#sepa_mandate_confirmed').val();
			var terms_c_confirmed = $('#terms_c_confirmed').val();
			var private_thi_confirmed = $('#private_thi_confirmed').val();

			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();
			today = dd + '.' + mm + '.' + yyyy;


			doc.setFontSize(8);

			doc.text(50, 32, semester_begin);

			//if (strValue === "") {
			doc.text((gender == "Male" ? 50 : 65), 39, "X");
			//}

			doc.text(40, 46, lastname);
			doc.text(40, 53, firstname);
			doc.text(40, 59, birthday);
			doc.text(40, 65, "Hauptstrasse 172");
			doc.text(50, 78, "76297 Stutensee");
			doc.text(45, 110, place_of_birth + ", " + country_of_birth);
			doc.text(45, 116, nationality);
			doc.text(45, 130, "Zuzug aus " + nationality)
			doc.text(130, 186, phone_number);
			doc.text(120, 192, email);
			doc.text(40, 182, university);
			doc.text(40, 188, name_of_program);
			doc.text(22, 201, semester_begin);
			doc.text(80, 201, expected_graduation_date);
			doc.text(115, 202, today);
			/*doc.text(50, 32, semester_begin);
			doc.text(50, 32, semester_begin);
			doc.text(50, 32, semester_begin);*/

			//doc.save('Student_Application.pdf');

			var $form = $("#form");

			var pdf_file = doc.output('blob');
			var formData = new FormData($form.get(0));
			formData.append('pdf', pdf_file);

			// var formData = new FormData();
   //          formData.append('ajax', 1);
   //          formData.append('pdf', pdf_file);

   			$.ajax('/submit',
            {
            	headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
					if (Object.keys(data.error).length === 0) {
                		$form.find("[name='is-already-saved']").val(1);
                		$form.submit();
					}else{
						printErrorMsg(data.error);
						$('html, body').animate({
							scrollTop: $(".print-error-msg").offset().top
						}, 500);
					}
                },
                error: function(data){console.log(data)}
			});

   			return false;
			});
			function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        	}
			/*
			$.ajax('/submit',
            {
            	headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                	$form.find("[name='is-already-saved']").val(1);
                	$form.submit();

                },
                error: function(data){console.log(data)}
			});

			//var required = $('input,textarea,select').filter('[required]:empty');
			//if(required.size() > 0) {
			//	alert("Please fill in all required fields!");
			//}

   			return false;
			});
			*/
		
</script>
@endsection