<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  



   <div class="container-fluid">
  <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 ">

 
    
            <form class="user" @submit.prevent="register">
                       <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="form.id">
                      
                    </div> 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                       <input class="form-control" id="name" v-model="patient.name" disabled>
                    
                     </b-col>
                     <b-col >
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                     </b-row>
                             
                    <b-row>
                       <b-col>
                      <label>Agama</label>
                        <select class="form-control" id="religion" v-model="form.religion">                  
                        <option >Islam</option>
                        <option >Kristian</option>
                        <option>Buddha</option>
                        <option >Hindu</option>
                        </select>
                    </b-col>
                   <b-col>
                      <label>Taraf Perkahwinan</label>
                        <select class="form-control" id="marriage" v-model="form.marriage">                  
                        <option >Bujang</option>
                        <option >Kahwin</option>
                        <option>Duda</option>
                        <option >Janda/Balu</option>
                        </select>
                    </b-col>                  
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Nama Waris</label>
                      <input type="text" class="form-control" id="kin" v-model="form.kin">
                  </b-col>
                   <b-col>
                      <label>Hubungan</label>
                      <input type="text" class="form-control" id="kinrelation" v-model="form.kin_relation">
                  </b-col>
                  </b-row>
                   <b-row>
                  <b-col>
                      <label>Alamat Waris</label>
                      <input type="text" class="form-control" id="kinaddress" v-model="form.kin_address">
                  </b-col>
                   <b-col>
                      <label>No. Telefon Waris</label>
                      <input type="text" class="form-control" id="kinPhone" v-model="form.kin_phone">
                  </b-col>
                  </b-row>
                  <b-row>
                  <b-col>
                      <label>Tarikh Masuk</label>
                      <input type="date" class="form-control" id="date_report" v-model="form.date" required>
                  </b-col>
                    <b-col>
                      <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="form.time" required>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Berat Pesakit</label>
                      <input type="text" class="form-control" id="daily_number" v-model="form.weight">
                   </b-col>
                    <b-col>
                      <label>Wad</label>
                        <input class="form-control" id="district" v-model="bed_discipline.ward" required disabled>
                      
                    </b-col>
                        <b-col>
                      <label>Katil</label>
                        <input class="form-control" id="district" v-model="bed_discipline.bed_code" required disabled>
                      
                    </b-col>
                                <b-col>
                      <label>Kelas</label>
                     <input class="form-control" id="district" v-model="bed_discipline.bed_class" required disabled>
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Register Number</label>
                       <input type="text" class="form-control" id="rn" v-model="form.reg_number" required>
                     
                   </b-col>                 
                    </b-row>

                                  <b-row>
                       <b-col>
                      <label>Diagnosis on admission</label>
                        <select class="form-control" id="marriage" v-model="form.adm_diagnosis" required>                  
                        <option >COVID-19</option>
                        <option >PUI</option>
                        <option>PUS</option>
                        <option>SARI</option>
                         <option>Non COVID</option>
                        </select>
                    </b-col>   
                       <b-col>
                      <label>Stage</label>
                        <select class="form-control" id="marriage" v-model="form.adm_stage" required>                  
                        <option >1</option>
                        <option >2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>NA</option>
                        </select>


                    </b-col>                
                    </b-row>
                    <b-row>

                         <b-col>
                      <label>Disiplin</label>
                        <select class="form-control" id="district" v-model="bed_discipline.discipline_id" required>
                        <option v-for="discipline in disciplines" v-bind:key="discipline.discipline" v-bind:value="discipline.id" >{{discipline.discipline }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>

                      <b-row>
                     <b-col>
                      <label>Vaksinasi</label>
                          <select class="form-control" id="vaccine" v-model="vaccination.vaccine" required>
                        <option v-for="vaccine in vaccines" v-bind:key="vaccine.vaccine" > {{vaccine.vaccine }}</option>
                        
                        </select>
                   </b-col>
                    <b-col hidden>
                      <label>Patient KP</label>
                     <input type="text" class="form-control" id="1stdose" v-model="vaccination.patient_kp_passport" >
                    </b-col>

                       <b-col>
                      <label>Tarikh 1st Dose</label>
                     <input type="date" class="form-control" id="1stdose" v-model="vaccination.date_first">
                    </b-col>
                     <b-col>
                      <label>Tarikh 2nd Dose</label>
                     <input type="date" class="form-control" id="2nddose" v-model="vaccination.date_second">
                    </b-col>
                    </b-row>
                           <b-row>
                     <b-col>
                      <label>Nota</label>
                       <textarea type="text" class="form-control" id="note" v-model="form.note"></textarea>
                        
                     
                   </b-col>                 
                    </b-row>
           
          
                         <div class="form-group">
              <div class="card-footer  bg-white">      
          <button  class="btn btn-outline-alternate " @click="goBack()">Back</button>     
          <button type="submit" id="myBtn" class="btn btn-primary " >Admit</button>
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
       methods:{
         cases(){
      
        axios.get('/api/patient/kp/'+this.$route.query.id + '/?token='+ localStorage.getItem('token'))
        .then(({data}) => (this.patient = data[0],this.vaccination.patient_kp_passport = data[0].kp_passport,
        this.form = data[0]))
      },
        
         ward(){
    let self = this;
     axios.get('/api/wardbed/'+this.$route.query.bed_id + '?token='+  localStorage.getItem('token'))
      .then(function (response) {
     self.bed_discipline.bed_code = response.data[0].bed_code;
     self.bed_discipline.ward = response.data[0].ward;
     self.bed_discipline.bed_class = response.data[0].bed_class;
      }).catch(function (error) {
        console.log(error);
     });
    },
             discipline(){
    let self = this;
     axios.get('/api/discipline'+'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.disciplines = response.data;
      })
    },
      
      
      register(){

       axios.post('/api/WardAdmission'+'?token='+ localStorage.getItem('token'), this.form),
       axios.post('/api/vaccinestatus'+'?token='+ localStorage.getItem('token'), this.vaccination),
       axios.post('/api/bed_discipline'+'?token='+ localStorage.getItem('token'), 
       {ward: this.bed_discipline.ward,
       rn: this.form.reg_number,
      date_bed: this.form.date,
      time_bed: this.form.time,
      bed_id: this.$route.query.bed_id,
      discipline_id:this.bed_discipline.discipline_id,
      remarks: 'New',
      status:'1'}),
         axios.post('/api/diagnosis'+'?token='+ localStorage.getItem('token'), 
       {
          patient_reg_number: this.form.reg_number,
          diagnosis: this.form.adm_diagnosis,
          stage: this.form.adm_stage,
          date_diagnosis: this.form.date,
          remarks: 'Admission',
          status: '1'})
       .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah didaftarkan.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          })

      
       this.$router.push({name: 'inpatientactive' });
     }, 
         goBack() {
     this.$router.push({name: 'newinpatientadmission'});
    },
            vaccine(){
    let self = this;
     axios.get('/api/vaccine'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.vaccines = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    },
  

   
   
      
     data(){
      return{disciplines:[],
             wards:[],
             patient:[],
          vaccines:[],
          form:{

          name:null,
          kp_passport: null,
          reg_number: null,
          kp_passport: null,
          adm_diagnosis: null,
          adm_stage: null,
          marriage: null,
          religion: null,
          kin: null,
          kin_address: null,
          kin_relation: null,
          kin_phone: null,
          date: null,
          time: null,
          weight: null,
          note: null
          },
          bed_discipline:{
       
          ward: null,
          bedcode: null,
          bed_class: null,   
          bed_id: null, 
          discipline_id: null,
          },
          
          vaccination:{
          vaccine: null,
          date_first:null,
          date_second: null,
          patient_kp_passport:null,
          },
        errors:{},     
        
        itemize: [
          {
            text: 'Pesakit Dalam',
            href: 'inpatientactive'
          },
        
          {
            text: 'Admission',
            active: true
          },
        ],
      
      }
 


    },
    mounted: function(){
        this.cases();
         this.ward();
         this.discipline();
         this.vaccine();
    }, 
   


  }
  
</script>


<style type="text/css">

</style>