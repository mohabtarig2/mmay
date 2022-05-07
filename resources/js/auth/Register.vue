<template>
<div v-if="!isLoggedIn">


<section class="login-area">
		<div class="login-area-bg" style="background-image:url('img/login-bg.jpg');"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-auto">
					<!-- Signup Inner -->
					<div class="login-inner" data-aos="fade-right" data-aos-delay="200">
						
						<div class="login-form">
                            <div class="alert alert-success" :class="alert">
                                لقد تم تسجيل حساب بنجاح
                            </div>
							<h1 class="login-form-title">Sign <span>Up</span></h1>
							<form method="post" action="#" class="login-form-inner">
								<div class="row">
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<input name="name" type="text" placeholder="FullName" required="required" v-model="user.name"
            :class="[{'is-invalid': errorFor('name')}]"
          />
          <v-errors :errors="errorFor('name')"></v-errors>
        </div>


									</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-4 ">
			
                         <span class="single-property-details">
     <span class="nice-select" :class="open" tabindex="0" @click="openCountry">
       <span class="current" v-if="country">
<allcountry :country="country"></allcountry>
                                        </span>
<ul class="list">
    <li  class="option" @click='countryChoose("GB")' value="44" Selected> (+47)</li>
    <li  class="option" @click='countryChoose("US")' value="1"> (+44)</li>
        <li  class="option" @click='countryChoose("DZ")' value="213"> (+213)</li>
        <li  class="option" @click='countryChoose("AD")' value="376"> (+376)</li>
        <li  class="option" @click='countryChoose("AO")' value="244"> (+244)</li>
        <li  class="option" @click='countryChoose("AI")' value="1264"> (+1264)</li>
        <li  class="option" @click='countryChoose("AG")' value="1268">  (+1268)</li>
        <li  class="option" @click='countryChoose("AR")' value="54"> (+54)</li>
        <li  class="option" @click='countryChoose("AM")' value="374"> (+374)</li>
        <li  class="option" @click='countryChoose("AW")' value="297"> (+297)</li>
        <li  class="option" @click='countryChoose("AU")' value="61"> (+61)</li>
        <li  class="option" @click='countryChoose("AT")' value="43"> (+43)</li>
        <li  class="option" @click='countryChoose("AZ")' value="994"> (+994)</li>
        <li  class="option" @click='countryChoose("BS")' value="1242"> (+1242)</li>
        <li  class="option" @click='countryChoose("BH")' value="973"> (+973)</li>
        <li  class="option" @click='countryChoose("BD")' value="880"> (+880)</li>
        <li  class="option" @click='countryChoose("BB")' value="1246"> (+1246)</li>
        <li  class="option" @click='countryChoose("BY")' value="375"> (+375)</li>
        <li  class="option" @click='countryChoose("BE")' value="32"> (+32)</li>
        <li  class="option" @click='countryChoose("BZ")' value="501"> (+501)</li>
        <li  class="option" @click='countryChoose("BJ")' value="229"> (+229)</li>
        <li  class="option" @click='countryChoose("BM")' value="1441"> (+1441)</li>
        <li  class="option" @click='countryChoose("BT")' value="975"> (+975)</li>
        <li  class="option" @click='countryChoose("BO")' value="591"> (+591)</li>
        <li  class="option" @click='countryChoose("BA")' value="387">  (+387)</li>
        <li  class="option" @click='countryChoose("BW")' value="267"> (+267)</li>
        <li  class="option" @click='countryChoose("BR")' value="55"> (+55)</li>
        <li  class="option" @click='countryChoose("BN")' value="673"> (+673)</li>
        <li  class="option" @click='countryChoose("BG")' value="359"> (+359)</li>
        <li  class="option" @click='countryChoose("BF")' value="226">  (+226)</li>
        <li  class="option" @click='countryChoose("BI")' value="257"> (+257)</li>
        <li  class="option" @click='countryChoose("KH" )' value="855"> (+855)</li>
        <li  class="option" @click='countryChoose("CM" )' value="237"> (+237)</li>
        <li  class="option" @click='countryChoose("CA" )' value="1"> (+1)</li>
        <li  class="option" @click='countryChoose("CV" )' value="238"> (+238)</li>
        <li  class="option" @click='countryChoose("KY" )' value="1345"> (+1345)</li>
        <li  class="option" @click='countryChoose("CF" )' value="236"> (+236)</li>
        <li  class="option" @click='countryChoose("CL" )' value="56"> (+56)</li>
        <li  class="option" @click='countryChoose("CN" )' value="86"> (+86)</li>
        <li  class="option" @click='countryChoose("CO" )' value="57"> (+57)</li>
        <li  class="option" @click='countryChoose("KM" )' value="269"> (+269)</li>
        <li  class="option" @click='countryChoose("CG" )' value="242"> (+242)</li>
        <li  class="option" @click='countryChoose("CK" )' value="682">  (+682)</li>
        <li  class="option" @click='countryChoose("CR" )' value="506">  (+506)</li>
        <li  class="option" @click='countryChoose("HR" )' value="385"> (+385)</li>
        <li  class="option" @click='countryChoose("CU" )' value="53"> (+53)</li>
        <li  class="option" @click='countryChoose("CY" )' value="90392">  (+90392)</li>
        <li  class="option" @click='countryChoose("CY" )' value="357">  (+357)</li>
        <li  class="option" @click='countryChoose("CZ" )' value="42">  (+42)</li>
        <li  class="option" @click='countryChoose("DK" )' value="45"> (+45)</li>
        <li  class="option" @click='countryChoose("DJ" )' value="253"> (+253)</li>
        <li  class="option" @click='countryChoose("DM" )' value="1809"> (+1809)</li>
        <li  class="option" @click='countryChoose("DO" )' value="1809">  (+1809)</li>
        <li  class="option" @click='countryChoose("EC" )' value="593"> (+593)</li>
        <li  class="option" @click='countryChoose("EG" )' value="20"> (+20)</li>
        <li  class="option" @click='countryChoose("SV" )' value="503">  (+503)</li>
        <li  class="option" @click='countryChoose("GQ" )' value="240">  (+240)</li>
        <li  class="option" @click='countryChoose("ER" )' value="291"> (+291)</li>
        <li  class="option" @click='countryChoose("EE" )' value="372"> (+372)</li>
        <li  class="option" @click='countryChoose("ET" )' value="251"> (+251)</li>
        <li  class="option" @click='countryChoose("FK" )' value="500">  (+500)</li>
        <li  class="option" @click='countryChoose("FO" )' value="298">  (+298)</li>
        <li  class="option" @click='countryChoose("FJ" )' value="679"> (+679)</li>
        <li  class="option" @click='countryChoose("FI" )' value="358"> (+358)</li>
        <li  class="option" @click='countryChoose("FR" )' value="33"> (+33)</li>
        <li  class="option" @click='countryChoose("GF" )' value="594">  (+594)</li>
        <li  class="option" @click='countryChoose("PF" )' value="689">  (+689)</li>
        <li  class="option" @click='countryChoose("GA" )' value="241"> (+241)</li>
        <li  class="option" @click='countryChoose("GM" )' value="220"> (+220)</li>
        <li  class="option" @click='countryChoose("GE" )' value="7880"> (+7880)</li>
        <li  class="option" @click='countryChoose("DE" )' value="49"> (+49)</li>
        <li  class="option" @click='countryChoose("GH" )' value="233"> (+233)</li>
        <li  class="option" @click='countryChoose("GI" )' value="350"> (+350)</li>
        <li  class="option" @click='countryChoose("GR" )' value="30"> (+30)</li>
        <li  class="option" @click='countryChoose("GL" )' value="299"> (+299)</li>
        <li  class="option" @click='countryChoose("GD" )' value="1473"> (+1473)</li>
        <li  class="option" @click='countryChoose("GP" )' value="590"> (+590)</li>
        <li  class="option" @click='countryChoose("GU" )' value="671"> (+671)</li>
        <li  class="option" @click='countryChoose("GT" )' value="502"> (+502)</li>
        <li  class="option" @click='countryChoose("GN" )' value="224"> (+224)</li>
        <li  class="option" @click='countryChoose("GW" )' value="245"> (+245)</li>
        <li  class="option" @click='countryChoose("GY" )' value="592"> (+592)</li>
        <li  class="option" @click='countryChoose("HT" )' value="509"> (+509)</li>
        <li  class="option" @click='countryChoose("HN" )' value="504"> (+504)</li>
        <li  class="option" @click='countryChoose("HK" )' value="852">  (+852)</li>
        <li  class="option" @click='countryChoose("HU" )' value="36"> (+36)</li>
        <li  class="option" @click='countryChoose("IS" )' value="354"> (+354)</li>
        <li  class="option" @click='countryChoose("IN" )' value="91"> (+91)</li>
        <li  class="option" @click='countryChoose("ID" )' value="62"> (+62)</li>
        <li  class="option" @click='countryChoose("IR" )' value="98"> (+98)</li>
        <li  class="option" @click='countryChoose("IQ" )' value="964"> (+964)</li>
        <li  class="option" @click='countryChoose("IE" )' value="353"> (+353)</li>
        <li  class="option" @click='countryChoose("IT" )' value="39"> (+39)</li>
        <li  class="option" @click='countryChoose("JM" )' value="1876"> (+1876)</li>
        <li  class="option" @click='countryChoose("JP" )' value="81"> (+81)</li>
        <li  class="option" @click='countryChoose("JO" )' value="962"> (+962)</li>
        <li  class="option" @click='countryChoose("KZ" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("KE" )' value="254"> (+254)</li>
        <li  class="option" @click='countryChoose("KI" )' value="686"> (+686)</li>
        <li  class="option" @click='countryChoose("KP" )' value="850">  (+850)</li>
        <li  class="option" @click='countryChoose("KR" )' value="82">  (+82)</li>
        <li  class="option" @click='countryChoose("KW" )' value="965"> (+965)</li>
        <li  class="option" @click='countryChoose("KG" )' value="996"> (+996)</li>
        <li  class="option" @click='countryChoose("LA" )' value="856"> (+856)</li>
        <li  class="option" @click='countryChoose("LV" )' value="371"> (+371)</li>
        <li  class="option" @click='countryChoose("LB" )' value="961"> (+961)</li>
        <li  class="option" @click='countryChoose("LS" )' value="266"> (+266)</li>
        <li  class="option" @click='countryChoose("LR" )' value="231"> (+231)</li>
        <li  class="option" @click='countryChoose("LY" )' value="218"> (+218)</li>
        <li  class="option" @click='countryChoose("LI" )' value="417"> (+417)</li>
        <li  class="option" @click='countryChoose("LT" )' value="370"> (+370)</li>
        <li  class="option" @click='countryChoose("LU" )' value="352"> (+352)</li>
        <li  class="option" @click='countryChoose("MO" )' value="853"> (+853)</li>
        <li  class="option" @click='countryChoose("MK" )' value="389"> (+389)</li>
        <li  class="option" @click='countryChoose("MG" )' value="261"> (+261)</li>
        <li  class="option" @click='countryChoose("MW" )' value="265"> (+265)</li>
        <li  class="option" @click='countryChoose("MY" )' value="60"> (+60)</li>
        <li  class="option" @click='countryChoose("MV" )' value="960"> (+960)</li>
        <li  class="option" @click='countryChoose("ML" )' value="223"> (+223)</li>
        <li  class="option" @click='countryChoose("MT" )' value="356"> (+356)</li>
        <li  class="option" @click='countryChoose("MH" )' value="692">  (+692)</li>
        <li  class="option" @click='countryChoose("MQ" )' value="596"> (+596)</li>
        <li  class="option" @click='countryChoose("MR" )' value="222"> (+222)</li>
        <li  class="option" @click='countryChoose("YT" )' value="269"> (+269)</li>
        <li  class="option" @click='countryChoose("MX" )' value="52"> (+52)</li>
        <li  class="option" @click='countryChoose("FM" )' value="691"> (+691)</li>
        <li  class="option" @click='countryChoose("MD" )' value="373"> (+373)</li>
        <li  class="option" @click='countryChoose("MC" )' value="377"> (+377)</li>
        <li  class="option" @click='countryChoose("MN" )' value="976"> (+976)</li>
        <li  class="option" @click='countryChoose("MS" )' value="1664"> (+1664)</li>
        <li  class="option" @click='countryChoose("MA" )' value="212"> (+212)</li>
        <li  class="option" @click='countryChoose("MZ" )' value="258"> (+258)</li>
        <li  class="option" @click='countryChoose("MN" )' value="95"> (+95)</li>
        <li  class="option" @click='countryChoose("NA" )' value="264"> (+264)</li>
        <li  class="option" @click='countryChoose("NR" )' value="674"> (+674)</li>
        <li  class="option" @click='countryChoose("NP" )' value="977"> (+977)</li>
        <li  class="option" @click='countryChoose("NL" )' value="31"> (+31)</li>
        <li  class="option" @click='countryChoose("NC" )' value="687">  (+687)</li>
        <li  class="option" @click='countryChoose("NZ" )' value="64">  (+64)</li>
        <li  class="option" @click='countryChoose("NI" )' value="505"> (+505)</li>
        <li  class="option" @click='countryChoose("NE" )' value="227"> (+227)</li>
        <li  class="option" @click='countryChoose("NG" )' value="234"> (+234)</li>
        <li  class="option" @click='countryChoose("NU" )' value="683"> (+683)</li>
        <li  class="option" @click='countryChoose("NF" )' value="672">  (+672)</li>
        <li  class="option" @click='countryChoose("NP" )' value="670">  (+670)</li>
        <li  class="option" @click='countryChoose("NO" )' value="47"> (+47)</li>
        <li  class="option" @click='countryChoose("OM" )' value="968"> (+968)</li>
        <li  class="option" @click='countryChoose("PW" )' value="680"> (+680)</li>
        <li  class="option" @click='countryChoose("PA" )' value="507"> (+507)</li>
        <li  class="option" @click='countryChoose("PG" )' value="675">   (+675)</li>
        <li  class="option" @click='countryChoose("PY" )' value="595"> (+595)</li>
        <li  class="option" @click='countryChoose("PE" )' value="51"> (+51)</li>
        <li  class="option" @click='countryChoose("PH" )' value="63"> (+63)</li>
        <li  class="option" @click='countryChoose("PL" )' value="48"> (+48)</li>
        <li  class="option" @click='countryChoose("PT" )' value="351"> (+351)</li>
        <li  class="option" @click='countryChoose("PR" )' value="1787">  (+1787)</li>
        <li  class="option" @click='countryChoose("QA" )' value="974"> (+974)</li>
        <li  class="option" @click='countryChoose("RE" )' value="262"> (+262)</li>
        <li  class="option" @click='countryChoose("RO" )' value="40"> (+40)</li>
        <li  class="option" @click='countryChoose("RU" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("RW" )' value="250"> (+250)</li>
        <li  class="option" @click='countryChoose("SM" )' value="378">  (+378)</li>
        <li  class="option" @click='countryChoose("ST" )' value="239"> (+239)</li>
        <li  class="option" @click='countryChoose("SA" )' value="966"> (+966)</li>
        <li  class="option" @click='countryChoose("SN" )' value="221"> (+221)</li>
        <li  class="option" @click='countryChoose("CS" )' value="381">(+381)</li>
        <li  class="option" @click='countryChoose("SC" )' value="248"> (+248)</li>
        <li  class="option" @click='countryChoose("SL" )' value="232">(+232)</li>
        <li  class="option" @click='countryChoose("SG" )' value="65"> (+65)</li>
        <li  class="option" @click='countryChoose("SK" )' value="421">  (+421)</li>
        <li  class="option" @click='countryChoose("SI" )' value="386"> (+386)</li>
        <li  class="option" @click='countryChoose("SB" )' value="677">  (+677)</li>
        <li  class="option" @click='countryChoose("SO" )' value="252"> (+252)</li>
        <li  class="option" @click='countryChoose("ZA" )' value="27">  (+27)</li>
        <li  class="option" @click='countryChoose("ES" )' value="34"> (+34)</li>
        <li  class="option" @click='countryChoose("LK" )' value="94">  (+94)</li>
        <li  class="option" @click='countryChoose("SH" )' value="290">  (+290)</li>
        <li  class="option" @click='countryChoose("KN" )' value="1869"> (+1869)</li>
        <li  class="option" @click='countryChoose("SC" )' value="1758"> (+1758)</li>
        <li  class="option" @click='countryChoose("SD" )' value="249"> (+249)</li>
        <li  class="option" @click='countryChoose("SR" )' value="597"> (+597)</li>
        <li  class="option" @click='countryChoose("SZ" )' value="268"> (+268)</li>
        <li  class="option" @click='countryChoose("SE" )' value="46"> (+46)</li>
        <li  class="option" @click='countryChoose("CH" )' value="41"> (+41)</li>
        <li  class="option" @click='countryChoose("SI" )' value="963"> (+963)</li>
        <li  class="option" @click='countryChoose("TW" )' value="886"> (+886)</li>
        <li  class="option" @click='countryChoose("TJ" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("TH" )' value="66"> (+66)</li>
        <li  class="option" @click='countryChoose("TG" )' value="228"> (+228)</li>
        <li  class="option" @click='countryChoose("TO" )' value="676"> (+676)</li>
        <li  class="option" @click='countryChoose("TT" )' value="1868">  (+1868)</li>
        <li  class="option" @click='countryChoose("TN" )' value="216"> (+216)</li>
        <li  class="option" @click='countryChoose("TR" )' value="90"> (+90)</li>
        <li  class="option" @click='countryChoose("TM" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("TM" )' value="993"> (+993)</li>
        <li  class="option" @click='countryChoose("TC" )' value="1649">  (+1649)</li>
        <li  class="option" @click='countryChoose("TV" )' value="688"> (+688)</li>
        <li  class="option" @click='countryChoose("UG" )' value="256"> (+256)</li>
     
        <li  class="option" @click='countryChoose("UA" )' value="380"> (+380)</li>
        <li  class="option" @click='countryChoose("AE" )' value="971"> (+971)</li>
        <li  class="option" @click='countryChoose("UY" )' value="598"> (+598)</li>
        <li  class="option" @click='countryChoose("US" )' value="1"> (+1)</li>
        <li  class="option" @click='countryChoose("UZ" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("VU" )' value="678"> (+678)</li>
        <li  class="option" @click='countryChoose("VA" )' value="379"> City (+379)</li>
        <li  class="option" @click='countryChoose("VE" )' value="58"> (+58)</li>
        <li  class="option" @click='countryChoose("VN" )' value="84"> (+84)</li>
        <li  class="option" @click='countryChoose("VG" )' value="84">   (+1284)</li>
        <li  class="option" @click='countryChoose("VI" )' value="84"> (+1340)</li>
        <li  class="option" @click='countryChoose("WF" )' value="681">(+681)</li>
        <li  class="option" @click='countryChoose("YE" )' value="969">(+969)</li>
        <li  class="option" @click='countryChoose("YE" )' value="967">(+967)</li>
        <li  class="option" @click='countryChoose("ZM" )' value="260"> (+260)</li>
        <li  class="option" @click='countryChoose("ZW" )' value="263"> (+263)</li>

</ul>
     </span>

   </span>
										
								
                  </div>
									<div class="col-lg-9 col-8">
                    	<div class="form-group">
               	<input name="name" type="text" placeholder="mobile" required="required"  v-model="mobile"
            :class="[{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('mobile')"></v-errors>


                      </div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input name="email" type="email" placeholder="Email Address" required="required"
                                             v-model="user.email"
            :class="[{'is-invalid': errorFor('email')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<input name="password" type="password" placeholder="Password"  v-model="user.password"
            :class="[{'is-invalid': errorFor('password')}]"
          />
          <v-errors :errors="errorFor('password')"></v-errors>
										</div>
									</div>
										<div class="col-lg-6 col-12">
										<div class="form-group">
											<input name="password" type="password" placeholder="Re-Type Password"
                                              v-model="user.password_confirmation"
            :class="[{'is-invalid': errorFor('confirmed')}]"
          />
          <v-errors :errors="errorFor('confirmed')"></v-errors>
										</div>
									</div>
									<div class="col-12">
										<div class="login-bottom-content">
											<div class="login-c-left">
												<span><input class="form-check-input" type="checkbox" v-model="agree" id="flexCheckDefault">I agree with <a href="#">* terms & conditions</a></span>
											</div>
											<div class="login-c-right">
												<p class="m-0">You have an account? <router-link :to="{name:'login'}">Login</router-link></p>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<button class="btnSign btn btn-download" :disabled="loading || !agree"
          @click.prevent="register"
        >Sign Up</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- End Signup Inner -->
				</div>
			</div>
		</div>
	</section>

</div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import validationErrors from "../shared/mixins/validationErrors";
import { logIn } from "./../shared/utils/auth";
import Allcountry from './allcountry.vue';
import navbar from './navbar.vue';
export default {
  components: { navbar, Allcountry },
  mixins: [validationErrors],
  data() {
    return {
         country:'AE',
         open:null,
      user: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        mobile:null,
        country:null,
     
        
      },
      mobile: null,
       business: {
        name: null,
        email: null,
        Categories: null,
        password: null,
        password_confirmation: null,
        mobile: null
      },
      loading: false,
       activeTab : '1',
       alertT:'d-none',
       alert:'d-none',
       errors:[],
       agree:false,

    };
  },
  computed: {
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),

  },
  watch:{
    
   mobile() {
        var x = this.mobile.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,3})/);
  this.mobile = !x[2] ? x[1] : '' + x[1] + '' + x[2] + (x[3] ? '' + x[3] : '');
    },
},
  methods: {
      openCountry(){
     
              this.open=="open" ? this.open='' : this.open="open"
		  
    },

countryChoose(event){

  this.country=event


},

    async register() {
      this.loading = true;
      this.errors = null;
    this.user.mobile= this.mobile 
    this.user.country= this.country 

    
      try {
        const response = await axios.post("register", this.user);
        if (201 == response.status) {

                 this.$router.push({name:'login'} );

        this.alert=' ';
        }
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;
    },
    //  async BusRegister() {
    //       this.loading = true;
    //  try {
    //     const response = await axios.post("bregister", this.business);
    //     if (201 == response.status) {

    //       this.alertT=' ';
    //     }
    //   } catch (error) {
    //     this.errors = error.response && error.response.data.errors;
    //   }
    //   this.loading = false;

    // }


  }
};
</script>


<style scoped>

.btn-bus {background-image: linear-gradient(to right, #EB3349 0%, #F45C43  51%, #EB3349  100%)}
.btn-bus {
   margin: 10px;
   padding: 12px 20px!important;
   text-align: center;
    font-size: 14px;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;
   box-shadow: 0 0 20px #eee;
       margin-top: 1.5rem!important;
   border-radius: 10px;
   display: block;
 }

 .btn-bus:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
 }


.btn-user {background-image: linear-gradient(to right, #FF8008 0%, #FFC837  51%, #FF8008  100%)}
.btn-user {
   margin: 10px;
   padding: 12px 20px!important;
   font-size: 14px;
   text-align: center;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;
   box-shadow: 0 0 20px #eee;
   border-radius: 10px;
   display: block;
 }

 .btn-user:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
 }
 .form-group .form-control{
     border-top:0;
     padding: 0;
     border-left:0;
     border-right:0;
     border-bottom:1px solid #c7c6c6;
         border-bottom-right-radius: 0;
     border-bottom-left-radius: 0;
     font-size: 14px;
 }
textarea:focus,
textarea.form-control:focus,
input.form-control:focus,
input[type=text]:focus,
input[type=password]:focus,
input[type=email]:focus,
input[type=number]:focus,
[type=text].form-control:focus,
[type=password].form-control:focus,
[type=email].form-control:focus,
[type=tel].form-control:focus,
[contenteditable].form-control:focus {
  box-shadow: inset 0 -1px 0 #FFC837;

}
.btnSign{
   
    padding: 15px 40px;
    color: #fff !important;
    font-weight: 500;
    border-radius: 10px !important;
    font-size: 15px;

    line-height: 24px;
  
    margin-right: 15px;
   
    z-index: 1;
   
    font-size: 16px;
}

.single-property-details .nice-select .list{
      overflow-y: scroll !important;
    height: 200 !important;
}
</style>

<style scoped>
@import url('https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css');
</style>