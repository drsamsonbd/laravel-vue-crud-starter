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

//settings component
let race= require('./components/settings/race.vue').default;
let area= require('./components/settings/area.vue').default;
let district= require('./components/settings/district.vue').default;
let nationality= require('./components/settings/nationality.vue').default;
let locality= require('./components/settings/locality.vue').default;
let hospital= require('./components/settings/hospital.vue').default;
let pkrc= require('./components/settings/pkrc.vue').default;
let vaccine= require('./components/settings/vaccine.vue').default;


//pkrc component
let admission= require('./components/pkrc/admission.vue').default;
let admissionform= require('./components/pkrc/admissionform.vue').default;
let pkrclist= require('./components/pkrc/index.vue').default;
let discharge= require('./components/pkrc/discharge.vue').default;
let dischargeform= require('./components/pkrc/dischargeform.vue').default;
let dischargeupdate= require('./components/pkrc/dischargeupdate.vue').default;
let review= require('./components/pkrc/review.vue').default;
let vital= require('./components/pkrc/vital.vue').default;
let active= require('./components/pkrc/active.vue').default;


//report component
let dailyreport = require('./components/report/index.vue').default;
let nursingreport = require('./components/report/nursing.vue').default;
let vaccinationreport = require('./components/report/vaccination.vue').default;

//profile component
let profile = require('./components/user/Profile.vue').default;

//statistics component
let statistics_pkrc = require('./components/statistics/pkrc.vue').default;



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



      // patient Routes
  { path: '/caselist', component: caselist, name:'caselist'},
  { path: '/patient', component: patient, name:'patient'},
  { path: '/case', component: case_reg, name:'case'},
  { path: '/sampling', component: sampling, name:'sampling'},

    //pkrc routes
    { path: '/admission', component: admission, name:'admission' },
    { path: '/pkrclist', component: pkrclist, name:'pkrclist' },
    { path: '/review', component: review, name:'review' },
    { path: '/discharge', component: discharge, name:'discharge' },
    { path: '/dischargeform', component: dischargeform, name:'dischargeform' },
    { path: '/dischargeupdate', component: dischargeupdate, name:'dischargeupdate' },
    { path: '/vital', component: vital, name:'vital' },
    { path: '/admissionform', component: admissionform, name:'admissionform' },
    { path: '/active', component: active, name:'active' },


     //report routes
     { path: '/dailyreport', component: dailyreport, name:'dailyreport' },  
     { path: '/nursingreport', component: nursingreport, name:'nursingreport' },
     { path: '/vaccinationreport', component: vaccinationreport, name:'vaccinationreport' },
     //profile routes
     { path: '/profile', component: profile, name:'profile' },

     //statistics routes
     { path: '/statistics_pkrc', component: statistics_pkrc, name:'statistics_pkrc' },
    
  ]