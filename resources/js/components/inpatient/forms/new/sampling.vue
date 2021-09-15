-  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  


 <hr>
   <div class="container-fluid">
  <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 ">
           <form class="user">              
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                       <input class="form-control" id="name" v-model="form.name" disabled>
                    
                     </b-col>
                     <b-col >
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                     </b-row>
                             
                    <b-row>
                      
                   <b-col>
                      <label>Simptomatik</label>
                        <select class="form-control" id="name" v-model="form.symptomatic">                  
                        <option >Ya</option>
                        <option >Tidak</option>
                        </select>
                    </b-col>

                     <b-col>
                      <label>Onset</label>
                      <input type="date" class="form-control" id="epid" v-model="form.onset">
                         <small class="text-danger" v-if="errors.onset">{{errors.onset[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Jenis Saringan</label>
                     <select class="form-control" id="screening" v-model="form.screening_type"> 
                       <option >Bergejala</option>  
                       <option >Bersasar</option>               
                        <option >Kontak</option>
                        <option >Komuniti</option>
                        <option >Kluster</option>
                        <option >Masuk Kerja</option>
                        <option >BID</option>
                        </select>
                         <small class="text-danger" v-if="errors.screening_type">{{errors.screening_type[0]}}</small>
                   </b-col>
                   <b-col>
                        <label>Jenis Exposure</label>
                     <select class="form-control" id="exposure" v-model="form.exposure_type"> 
                       <option >Tempatan</option>  
                       <option >Import A</option>               
                        <option >Import B</option>
                        <option >Import C</option>
                       
                        </select>
                         <small class="text-danger" v-if="errors.exposure_type">{{errors.exposure_type[0]}}</small>
                   </b-col>
                  <b-col>
                      <label>Reinfection?</label>
                       <select class="form-control" id="reinfection" v-model="form.reinfection"> 
                       <option >Ya</option>  
                       <option >Tidak</option>    
                       
                        </select>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Tarikh Sampel</label>
                      <input type="date" class="form-control" id="datesample" v-model="form.date_sample">
                         <small class="text-danger" v-if="errors.date_sample">{{errors.date_sample[0]}}</small>
                   </b-col>
                     <b-col>
                      <label>Jenis Sampel</label>
                       <select class="form-control" id="reinfection" v-model="form.type_sample"> 
                       <option >PCR</option>  
                       <option >RTK-Ag</option>    
                       <small class="text-danger" v-if="errors.type_sample">{{errors.type_sample[0]}}</small>
                        </select>
                  </b-col>
                      <b-col>
                      <label>Tarikh Sampel di MKA</label>
                      <input type="date" class="form-control" id="datemka" v-model="form.date_mka">
                   </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Grading</label>
                      <input type="text" class="form-control" id="grading" v-model="form.grading">
                         <small class="text-danger" v-if="errors.grading">{{errors.grading[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Tarikh Keputusan</label>
                     <input type="date" class="form-control" id="dateresult" v-model="form.date_result">
                         <small class="text-danger" v-if="errors.date_result">{{errors.date_result[0]}}</small>
                    </b-col>
                    </b-row>
                            <b-row>
                     <b-col>
                      <label>Vaksinasi</label>
                          <select class="form-control" id="vaccine" v-model="form.vaccine_type">
                        <option v-for="vaccine in vaccines" v-bind:key="vaccine.vaccine" > {{vaccine.vaccine }}</option>
                        
                        </select>
                   </b-col>
                    <b-col>
                      <label>Tarikh 1st Dose</label>
                     <input type="date" class="form-control" id="1stdose" v-model="form.first_dose_date">
                    </b-col>
                     <b-col>
                      <label>Tarikh 2nd Dose</label>
                     <input type="date" class="form-control" id="2nddose" v-model="form.second_dose_date">
                    </b-col>
                    </b-row>
                    <br>
                    <div class="form-group">
              <div class="card-footer  bg-white">      
          <button  class="btn btn-outline-primary " @click="goBack()">Back</button>     
          <button type="submit" id="myBtn" class="btn btn-primary " @click="register()">Simpan</button>
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
        this.vaccine();
      },

      
     data(){
      return{
          vaccines:[],

          form:{         
          kp_passport: null,
          sypmtomatic: null,
          onset: null,
          screening_type: null,
          exposure_type: null,
          reinfection: null,
          date_sample: null,
          type_sample: null,
          date_mka: null,
          grading: null,
          date_result: null,
          vaccine_type: null,
          first_dose_date:null,
          second_dose_date: null,
          notes: null,
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
            text: 'Ujian',
            active: true
          },
        ],
          
      }
 





    },
        

 
  methods:{
    allCases(){
 
     axios.get('/api/patientkp_passport/'+ this.$route.params.kp_passport+ '?token='+ localStorage.getItem('token'))
        .then(({data}) => (this.form.kp_passport = data[0].kp_passport, this.form.name = data[0].name))
    .catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
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
                  
      register(){
       axios.post('/api/sampling'+'?token='+ localStorage.getItem('token'), this.form)
          .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah direkodkan.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          })

           ;   
       this.$router.push({name: 'inpatientdetails', params: { id:  this.$route.params.kp_passport} });
     }, 
      goBack() {
          let $id = this.form.kp_passport
       this.$router.push({name: 'inpatientdetails', params: { id: $id } })
    },

 },
  }   
</script>

</style>