  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  


 <hr>
   <div class="container-fluid">
  <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 ">
 
           <form class="user">
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="form.id">
                      
                    </div>
                  
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                       <input class="form-control" id="name" v-model="form.kp_passport" disabled>
                        
                     </b-col>
                     <b-col >
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                     </b-row>
                             
                    <b-row>
                      
                   <b-col>
                      <label>Tahun</label>
                        <select class="form-control" id="name" v-model="form.year">  

                        <option >2021</option>
                        <option >2020</option>
                        </select>
                    </b-col>

                     <b-col>
                      <label>Minggu Epid</label>
                      <input type="text" class="form-control" id="epid" v-model="form.epid_week">
                         <small class="text-danger" v-if="errors.epid_week">{{errors.epid_week[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Bilangan Kumulatif</label>
                      <input type="text" class="form-control" id="cumulative" v-model="form.cumulative">
                         <small class="text-danger" v-if="errors.cumulative">{{errors.cumulative[0]}}</small>
                   </b-col>
                  <b-col>
                      <label>Tarikh Daftar Kes</label>
                      <input type="date" class="form-control" id="date_report" v-model="form.date_report_KKM">
                         <small class="text-danger" v-if="errors.date_report_KKM">{{errors.date_report_KKM[0]}}</small>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Bilangan Kes</label>
                      <input type="text" class="form-control" id="daily_number" v-model="form.daily_number">
                         <small class="text-danger" v-if="errors.daily_number">{{errors.daily_number[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Daerah Daftar Kes</label>
                        <select class="form-control" id="district" v-model="form.district">
                        <option v-for="district in districts" v-bind:key="district.district" >{{district.district }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Lokaliti</label>
                       <select class="form-control" id="locality" v-model="form.locality">
                        <option v-for="locality in localities" v-bind:key="locality.locality" >{{locality.locality }} </option>
                        
                        </select>
                   </b-col>
                    <b-col>
                      <label>Hospital Merawat</label>
                     <select class="form-control" id="hospital" v-model="form.treating_hospital">
                        <option v-for="hospital in hospitals" v-bind:key="hospital.hospital" >{{hospital.hospital }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                    <br>
                    <div class="form-group">
              <div class="card-footer  bg-white">      
          <button  class="btn btn-outline-alternate " @click="goBack(id)">Back</button>     
          <button type="submit" id="myBtn" class="btn btn-primary " @click="patientUpdate()">Kemaskini</button>
             </div>
                         </div>
                    <hr>
                 
                  </form>    

          </div>

              </div>


   </div>
              </sectioN>
            </div>
      
          <!--Row-->


</template>
  
  


<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/login'})

    
      }  

    },      
     mounted(){ 

        this.allCases();
        this.district();
        this.hospital();
        this.locality();
      },

      
     data(){
      return{

          districts:[],
          localities:[],
          hospitals:[],
          
          form:{         
          kp_passport: null,
          year: null,
          epid_week: null,
          cumulative: null,
          date_report_KKM: null,
          daily_report: null,
          district: null,
          locality: null,
          treating_hospital: null,
          
        },
         
      
        errors:{},     
        
        itemize: [
          {
            text: 'Pesakit',
            href: '#'
          },
             {
            text: 'Kemaskini',
            href: '#'
          },
          {
            text: 'Daftar Kes',
            active: true
          },
        ],
         
      }
 





    },
        
     
  methods:{

      allCases(){
 
     axios.get('/api/patientCase/'+ this.$route.params.id+ '?token='+ localStorage.getItem('token'))
        .then(({data}) => (this.form = data[0]))
    .catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

    district(){
    let self = this;
     axios.get('/api/district/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.districts = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
   locality(){
    let self = this;
     axios.get('/api/locality/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.localities = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
     hospital(){
    let self = this;
     axios.get('/api/hospital/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.hospitals = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

  

      patientUpdate(){
       let id = this.form.id
       axios.patch('/api/case/'+id+ '?token='+ localStorage.getItem('token'), this.form)
      .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          })

           ;    let $admid = this.form.kp_passport;
       this.$router.push({name: 'details', params: { id: $admid} });
     }, 
         goBack() {
          let $id = this.form.kp_passport;
       this.$router.push({name: 'details', params: { id: $id } })
    },
 },
  }   
</script>


<style type="text/css">

  
</style>