let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let home = require('./components/Dashboard.vue').default;

let logout = require('./components/auth/logout.vue').default;

//pentadbir
let user= require('./components/admin/user.vue').default;
let department= require('./components/admin/department.vue').default;

 // Patient Component 
 let caselist = require('./components/patient/index.vue').default;
 let patient = require('./components/patient/patient.vue').default;
 let case_reg = require('./components/patient/case.vue').default;
 let sampling = require('./components/patient/sampling.vue').default;
 let PatientDetails = require('./components/patient/details.vue').default;
//settings component
let race= require('./components/settings/race.vue').default;
let area= require('./components/settings/area.vue').default;
let district= require('./components/settings/district.vue').default;
let nationality= require('./components/settings/nationality.vue').default;
let locality= require('./components/settings/locality.vue').default;
let hospital= require('./components/settings/hospital.vue').default;
let pkrc= require('./components/settings/pkrc.vue').default;
let vaccine= require('./components/settings/vaccine.vue').default;
let ward= require('./components/settings/ward.vue').default;
let bed= require('./components/settings/bed.vue').default;
let discipline= require('./components/settings/discipline.vue').default;
//pkrc component
let admission= require('./components/pkrc/admission.vue').default;
let admissionform= require('./components/pkrc/admissionform.vue').default;
let pkrclist= require('./components/pkrc/index.vue').default;
let discharge= require('./components/pkrc/discharge.vue').default;
let dischargeform= require('./components/pkrc/dischargeform.vue').default;
let review= require('./components/pkrc/review.vue').default;
let vital= require('./components/pkrc/vital.vue').default;
let active= require('./components/pkrc/active.vue').default;
let details= require('./components/pkrc/Details.vue').default;


//inpatient component
let newinpatientadmission= require('./components/inpatient/newadmission.vue').default;
let inpatientadmission= require('./components/inpatient/admission.vue').default;
let inpatientadmissionform= require('./components/inpatient/forms/new/admission.vue').default;
let inpatientadmissiondirect= require('./components/inpatient/forms/new/admissionDirect.vue').default;
let inpatientlist= require('./components/inpatient/index.vue').default;
let inpatientsearch= require('./components/inpatient/search.vue').default;
let inpatientdischarge= require('./components/inpatient/discharge.vue').default;
let inpatientdischargelist= require('./components/inpatient/dischargelist.vue').default;
let inpatientdischargeform= require('./components/inpatient/forms/new/discharge.vue').default;
let inpatientreview= require('./components/inpatient/review.vue').default;
let inpatientvital= require('./components/inpatient/vital.vue').default;
let inpatientactive= require('./components/inpatient/active.vue').default;
let inpatientdetails= require('./components/inpatient/Details.vue').default;
let InpatientnewPatient= require('./components/inpatient/forms/new/patient.vue').default;
let InpatientnewSampling= require('./components/inpatient/forms/new/sampling.vue').default;
let InpatientCensus= require('./components/inpatient/eCensus.vue').default;

//inpatient update form 
let inpatientupdatePatient= require('./components/inpatient/forms/patient.vue').default;
let inpatientupdateAdmission= require('./components/inpatient/forms/admission.vue').default;
let inpatientupdateCase= require('./components/inpatient/forms/case.vue').default;
let inpatientupdateSampling= require('./components/inpatient/forms/sampling.vue').default;
let inpatientupdateDischarge= require('./components/inpatient/forms/discharge.vue').default;
let inpatientupdate= require('./components/inpatient/forms/update.vue').default;

//pkrc update form 
let updatePatient= require('./components/pkrc/forms/patient.vue').default;
let updateAdmission= require('./components/pkrc/forms/admission.vue').default;
let updateCase= require('./components/pkrc/forms/case.vue').default;
let updateSampling= require('./components/pkrc/forms/sampling.vue').default;
let updateDischarge= require('./components/pkrc/forms/discharge.vue').default;
//pkrc new form 
let newPatient= require('./components/pkrc/forms/new/patient.vue').default;
let newAdmission= require('./components/pkrc/forms/new/admission.vue').default;
let newCase= require('./components/pkrc/forms/new/case.vue').default;
let newSampling= require('./components/pkrc/forms/new/sampling.vue').default;
let newDischarge= require('./components/pkrc/forms/new/discharge.vue').default;
let newAdmissionSearch= require('./components/pkrc/forms/new/newadmission.vue').default;

//report component
let dailyreport = require('./components/report/index.vue').default;
let nursingreport = require('./components/report/nursing.vue').default;
let vaccinationreport = require('./components/report/vaccination.vue').default;
let pkrcReport = require('./components/report/pkrcReport.vue').default;
let pkrcManual = require('./components/report/pkrcManual.vue').default;
let laporanharian = require('./components/report/LaporanHarian.vue').default;
let InpatientReport = require('./components/report/InpatientCencus.vue').default;
let NursingCensus = require('./components/report/nursingCensus.vue').default;
let NursingCensusDetails = require('./components/report/NursingCensusDetails.vue').default;

//profile component
let profile = require('./components/user/Profile.vue').default;

//statistics component
let statistics_pkrc = require('./components/statistics/pkrc.vue').default;

//JKNS component
let jkninpatientactive= require('./components/jkns/inpatient/active.vue').default;
let jkninpatientdetails= require('./components/jkns/inpatient/details.vue').default;
let jkninpatientdischarge= require('./components/jkns/inpatient/discharge.vue').default;

let jknpkrcactive= require('./components/jkns/pkrc/active.vue').default;
let jknpkrcdetails= require('./components/jkns/pkrc/details.vue').default;
let jknpkrcdischarge= require('./components/jkns/pkrc/discharge.vue').default;

export const routes = [
    { path: '/login', component: login, name: '/' },
    { path: '/register', component: register, name:'register' },
    { path: '/forget', component: forget, name:'forget' },
    { path: '/logout', component: logout, name:'logout' },
    { path: '/home', component: home, name:'home' },

    // Admin Routes
    { path: '/user', component: user, name:'user' },
    { path: '/department', component: department, name:'department' },
    // settings
    { path: '/race', component:race , name:'race' },
    { path: '/area', component:area , name:'area' },
    { path: '/district', component:district , name:'district' },
    { path: '/nationality', component: nationality, name:'nationality' },
    { path: '/locality', component: locality, name:'locality' },
    { path: '/hospital', component: hospital, name:'hospital' },
    { path: '/pkrc', component: pkrc, name:'pkrc' },
    { path: '/vaccine', component: vaccine, name:'vaccine' },
    { path: '/ward', component: ward, name:'ward' },
    { path: '/bed', component: bed, name:'bed' },
    { path: '/discipline', component: discipline, name:'discipline' },


      // patient Routes
  { path: '/caselist', component: caselist, name:'caselist'},
  { path: '/patient', component: patient, name:'patient'},
  { path: '/case', component: case_reg, name:'case'},
  { path: '/sampling', component: sampling, name:'sampling'},
  { path: '/PatientDetails', component: PatientDetails, name:'PatientDetails'},
    //pkrc routes
    { path: '/admission', component: admission, name:'admission' },
    { path: '/pkrclist', component: pkrclist, name:'pkrclist' },
    { path: '/review', component: review, name:'review' },
    { path: '/discharge', component: discharge, name:'discharge' },
    { path: '/dischargeform', component: dischargeform, name:'dischargeform' },
    { path: '/vital', component: vital, name:'vital' },
    { path: '/admissionform', component: admissionform, name:'admissionform' },
    { path: '/active', component: active, name:'active' },
    { path: '/details', component: details, name:'details' },

        //inpatient routes
        { path: '/newInpatientAdmission', component: newinpatientadmission, name:'newinpatientadmission' },
        { path: '/inpatientadmission', component: inpatientadmission, name:'inpatientadmission' },
        { path: '/inpatientlist', component: inpatientlist, name:'inpatientlist' },
        { path: '/inpatientsearch', component: inpatientsearch, name:'inpatientsearch' },
        { path: '/inpatientreview', component: inpatientreview, name:'inpatientreview' },
        { path: '/inpatientdischarge', component: inpatientdischarge, name:'inpatientdischarge' },
        { path: '/inpatientdischargeform', component: inpatientdischargeform, name:'inpatientdischargeform' },
        { path: '/inpatientvital', component: inpatientvital, name:'inpatientvital' },
        { path: '/inpatientadmissionform', component: inpatientadmissionform, name:'inpatientadmissionform' },
        { path: '/inpatientadmissionDirect', component: inpatientadmissiondirect, name:'inpatientadmissionDirect' },
        { path: '/inpatientactive', component: inpatientactive, name:'inpatientactive' },
        { path: '/inpatientdetails', component: inpatientdetails, name:'inpatientdetails' },
        { path: '/InpatientnewPatient', component: InpatientnewPatient, name:'InpatientnewPatient' },
        { path: '/InpatientnewSampling', component: InpatientnewSampling, name:'inpatientnewSampling' },
        { path: '/InpatientCensus', component: InpatientCensus, name:'inpatientCensus' },
        { path: '/inpatientdischargelist', component: inpatientdischargelist, name:'inpatientdischargelist' },

        //inpatient  update routes
{ path: '/inpatientupdatePatient', component: inpatientupdatePatient, name:'inpatientupdatePatient' },
{ path: '/inpatientupdateAdmission', component:inpatientupdateAdmission, name:'inpatientupdateAdmission' },
{ path: '/inpatientupdateCase', component:inpatientupdateCase, name:'inpatientupdateCase' },
{ path: '/inpatientupdateSampling', component:inpatientupdateSampling, name:'inpatientupdateSampling' },
{ path: '/inpatientupdateDischarge', component:inpatientupdateDischarge, name:'inpatientupdateDischarge' },
{ path: '/inpatientupdate', component:inpatientupdate, name:'inpatientupdate' },
//pkrc  update routes
{ path: '/updatePatient', component: updatePatient, name:'updatePatient' },
{ path: '/updateAdmission', component:updateAdmission, name:'updateAdmission' },
{ path: '/updateCase', component:updateCase, name:'updateCase' },
{ path: '/updateSampling', component:updateSampling, name:'updateSampling' },
{ path: '/updateDischarge', component:updateDischarge, name:'updateDischarge' },

//pkrc  new routes
{ path: '/newPatient', component: newPatient, name:'newPatient' },
{ path: '/newAdmission', component:newAdmission, name:'newAdmission' },
{ path: '/newCase', component:newCase, name:'newCase' },
{ path: '/newSampling', component:newSampling, name:'newSampling' },
{ path: '/newDischarge', component:newDischarge, name:'newDischarge' },
{ path: '/newAdmissionSearch', component:newAdmissionSearch, name:'newAdmissionSearch' },
     //report routes
     { path: '/dailyreport', component: dailyreport, name:'dailyreport' },  
     { path: '/nursingreport', component: nursingreport, name:'nursingreport' },
     { path: '/vaccinationreport', component: vaccinationreport, name:'vaccinationreport' },
     { path: '/pkrcReport', component: pkrcReport, name:'pkrcReport' },  
     { path: '/pkrcManual', component: pkrcManual, name:'pkrcManual' }, 
     { path: '/laporanharian', component: laporanharian, name:'laporanharian' }, 
     { path: '/InpatientReport', component:InpatientReport, name:'InpatientReport' }, 
     { path: '/NursingCensus', component:NursingCensus, name:'NursingCensus' }, 
     { path: '/NursingCensusDetails', component:NursingCensusDetails, name:'NursingCensusDetails' }, 

     //profile routes
     { path: '/profile', component: profile, name:'profile' },

     //statistics routes
     { path: '/statistics_pkrc', component: statistics_pkrc, name:'statistics_pkrc' },
     
      //jkns routes
      { path: '/jkns/inpatient/active', component: jkninpatientactive, name:'jkninpatientactive' },
      { path: '/jkns/inpatient/details', component: jkninpatientdetails, name:'jkninpatientdetails' },      
      { path: '/jkns/inpatient/discharge', component: jkninpatientdischarge, name:'jkninpatientdischarge' },

          { path: '/jkns/pkrc/active', component: jknpkrcactive, name:'jknpkrcactive' },
          { path: '/jkns/pkrc/details', component: jknpkrcdetails, name:'jknpkrcdetails' },      
          { path: '/jkns/pkrc/discharge', component: jknpkrcdischarge, name:'jknpkrcdischarge' },
    
    
  ]