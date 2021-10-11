  

<template v-for="table">
<div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  


 <hr>
   <div class="container-fluid">
  <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 ">

  <!--userUpdate Modal-->
  <div>
          <form class="user" @submit.prevent="newPatient"> 
                     <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                      
                    </div>  
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="forms.name">
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                     </b-col>
                     </b-row>
                             
                    <b-row>
                   <b-col>
                      <label>Jenis Pengenalan</label>
                        <select class="form-control" id="gender" v-model="forms.id_type" required>                  
                        <option value="1">Kad Pengenalan</option>
                        <option value="2">Passport</option>
                        <option value ="0">NIL</option>
                        </select>
                  </b-col>
                      <b-col>
                      <label>Nombor</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="forms.kp_passport" required>
                  </b-col>
                   <b-col>
                      <label>Jantina</label>
                       <select class="form-control" id="gender" v-model="forms.gender" required>                  
                        <option >Lelaki</option>
                        <option >Perempuan</option>
                        </select>
                    </b-col>

                     <b-col>
                      <label>Umur</label>
                      <input type="number" step="any" min="0.1" class="form-control" id="age" v-model="forms.age" required>
                      <span style="font-size: 0.6em;">Nota:*Jika kurang satu (1) tahun sila isikan 0.1 sehingga 0.9</span>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                       <b-col>
                      <label>Tarikh Lahir</label>
                      <input type="date" class="form-control" id="date_report" v-model="forms.dob" >
                  </b-col>
                  <b-col>
                      <label>Bangsa</label>
                 <select class="form-control" id="race" v-model="forms.race">
                        <option v-for="race in races" v-bind:key="race.race" >{{race.race }} </option>
                        
                        </select>
                  </b-col>
                  <b-col>
                      <label>Warganegara</label>
                      <select class="form-control" id="nationality" v-model="forms.nationality" required>
                        <option v-for="nationality in nationalities" v-bind:key="nationality.nationality" >{{nationality.nationality }} </option>
                        
                        </select>
                  </b-col>
                  </b-row>

                  <b-row>
                <!--     <b-col>
                      <label>Mukim</label>
                      <select class="form-control" id="area" v-model="forms.area">
                        <option v-for="area in areas" v-bind:key="area.area" >{{area.area }} </option>
                        
                        </select>
                   </b-col>-->
                    <b-col>
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="workplace" v-model="forms.address">
                         <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
                    </b-col>
                    </b-row>
                     <b-row>
                 
                         <b-col>
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" id="job" v-model="forms.job">
                         <small class="text-danger" v-if="errors.job">{{errors.job[0]}}</small>
                    </b-col>
                       <b-col>
                      <label>No. Tel</label>
                      <input type="text" class="form-control" id="phone" v-model="forms.phone">
                         <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
                    </b-col>
                    </b-row>
                    <div class="form-group">
                      <label>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="forms.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                      
                     
                    
                    <div class="form-group">
                 
               
                    </div>

                         <div class="form-group">
              <div class="card-footer  bg-white">      
          <button type="submit" id="myBtn" class="btn btn-primary ">Daftar</button>
             </div>
                         </div>
               
                  </form> 

   </div>
<!--userUpdate Modal-->



 </div>
 </div>

           </div>
          <!--Row-->

</section>
</div>
</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/login'})    
      }
  

    },
      
     mounted(){
        this.race();
        this.area(),
        this.nationality();
      },

      
     data(){
      return{
        
          races: [],
          nationalities:[],
          areas:[], 
      
          forms:{
            
          name: null,
          id_type: null,
          kp_passport: null,
          age: null,
          gender: null,          
          race: null,
          dob: null,
          phone: null,
          nationality: null,
          job: null,
          address: null,
          area: null,
          case_district: null,
          notes: null,
      
        },
      
        errors:{},     
        
        itemize: [
          {
            text: 'Pesakit',
            href: '#'
          },
                 {
            text: 'Daftar Baru',
            active: true
             
          },
        ],          
      }
 

    },   
   
 
  methods:{

     race(){
    let self = this;
     axios.get('/api/race/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.races = response.data;
      }).catch(function (error) {
        console.log(error);
      });
    },
       area(){
    let self = this;
     axios.get('/api/area/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.areas = response.data;
      }).catch(function (error) {
        console.log(error);
      });
    },
       nationality(){
    let self = this;
     axios.get('/api/nationality/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.nationalities = response.data;
      }).catch(function (error) {
        console.log(error);
      });
    },

  newPatient(){
       axios.post('/api/patient'+ '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {      
           
             Toast.fire(
                      'Berjaya!',
                      'Telah didaftarkan.',
                      'success'
                    )

                    
      
    
       })
          let $idtype = this.forms.id_type;
          let $admid = this.forms.kp_passport;
          let $adm_id = str_replace("-", "", $admid);
          let    $id='NIL-'+this.forms.name;
        if($idtype === 0){
 
          this.$router.push({name: 'inpatientadmissionDirect', query: { id: $id } });
        } 
       else{
         this.$router.push({name: 'inpatientadmissionDirect', query: { id: $adm_id} });
       }
       
     },
 


 },
  }   
</script>


<style type="text/css">

</style>