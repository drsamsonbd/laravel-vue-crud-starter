  

<template v-for="table">
<section class="content">  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">

  <!--userUpdate Modal-->
  <div>
          <form class="user" @submit.prevent="patientUpdate"> 
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
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="forms.kp_passport">
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                   <b-col>
                      <label>Jantina</label>
                       <select class="form-control" id="gender" v-model="forms.gender">                  
                        <option >Lelaki</option>
                        <option >Perempuan</option>
                        </select>
                         <small class="text-danger" v-if="errors.gender">{{errors.gender[0]}}</small>
                    </b-col>

                     <b-col>
                      <label>Umur</label>
                      <input type="text" class="form-control" id="age" v-model="forms.age">
                         <small class="text-danger" v-if="errors.age">{{errors.age[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Bangsa</label>
                 <select class="form-control" id="race" v-model="forms.race">
                        <option v-for="race in races" v-bind:key="race.race" >{{race.race }} </option>
                        
                        </select>
                  </b-col>
                  <b-col>
                      <label>Warganegara</label>
                      <select class="form-control" id="nationality" v-model="forms.nationality">
                        <option v-for="nationality in nationalities" v-bind:key="nationality.nationality" >{{nationality.nationality }} </option>
                        
                        </select>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Mukim</label>
                      <select class="form-control" id="area" v-model="forms.area">
                        <option v-for="area in areas" v-bind:key="area.area" >{{area.area }} </option>
                        
                        </select>
                   </b-col>
                    <b-col>
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" id="job" v-model="forms.job">
                         <small class="text-danger" v-if="errors.job">{{errors.job[0]}}</small>
                    </b-col>
                    </b-row>
                     <b-row>
                      <b-col>
                      <label>Alamat Tempat Kerja</label>
                      <input type="text" class="form-control" id="workplace" v-model="forms.workplace">
                         <small class="text-danger" v-if="errors.workplace">{{errors.workplace[0]}}</small>
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
                      <button type="submit" id="myBtn" class="btn btn-primary btn-block" @click="patientUpdate(patient.id)">Kemaskini</button>
               
                    </div>
               
                  </form> 

   </div>
<!--userUpdate Modal-->



 </div>
 </div>

           </div>
          <!--Row-->

</section>
</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/login'})    
      }
  

    },
      
     mounted(){
        this.allPatient();
        this.race();
        this.area(),
        this.nationality();
      },

      
     data(){
      return{
          views:[], 
          races: [],
          nationalities:[],
          areas:[], 
      
          forms:{
          name: null,
          kp_passport: null,
          age: null,
          gender: null,          
          race: null,
          phone: null,
          nationality: null,
          job: null,
          workplace: null,
          area: null,
          case_district: null,
          notes: null,
      
        },
      
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
          {
            text: 'Pesakit',
            active: true
          },
                 {
            text: 'Kemaskini',
             href: '/aktivepkrc'
          },
        ],          
      }
 

    },   
   
 
  methods:{
      allPatient(){
    let self = this;
    axios.get('/api/admissions/'+this.$route.params.id+ '/?token='+ localStorage.getItem('token'))
       .then(({data}) => (this.forms = data[0])) 
      .catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
     race(){
    let self = this;
     axios.get('/api/race/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.races = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       area(){
    let self = this;
     axios.get('/api/area/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.areas = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       nationality(){
    let self = this;
     axios.get('/api/nationality/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.nationalities = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

      deleteUser(id){
                Swal.fire({
                  title: 'Anda pasti?',
                  text: "Tindakan ini memadamkan data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Teruskan'
                }).then((result) => {
                  if (result.value) {
                    axios.delete('/api/patient/'+id+ '?token='+ localStorage.getItem('token'))
                  .then(() => {
                    window.location.reload()
                
                  })
                  .catch(() => {
                  
                  })
                    Swal.fire(
                      'Deleted!',
                      'Telah dipadamkan.',
                      'success'
                    )
                  }
                })

      },
           
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/patient/'+id+ '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/patient/')
       .then(function (response) {
        self.items = response.data;
        })
         this.$refs['edit-modal'].hide(); 
           this.allPatient();
             Toast.fire(
                      'Berjaya!',
                      'Telah didaftarkan.',
                      'success'
                    )
    
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },


 },
  }   
</script>


<style type="text/css">

</style>