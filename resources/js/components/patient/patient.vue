  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <b-modal ref="my-modal" size="xl" hide-footer title="Daftar Pesakit">
    
           <form class="user" @submit.prevent="register">
                  
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="form.name">
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                     </b-col>
                     </b-row>
                             
                    <b-row>
                      <b-col>
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport">
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                   <b-col>
                      <label>Jantina</label>
                       <select class="form-control" id="gender" v-model="form.gender">                  
                        <option >Lelaki</option>
                        <option >Perempuan</option>
                        </select>
                         <small class="text-danger" v-if="errors.gender">{{errors.gender[0]}}</small>
                    </b-col>

                     <b-col>
                      <label>Umur</label>
                      <input type="text" class="form-control" id="age" v-model="form.age">
                         <small class="text-danger" v-if="errors.age">{{errors.age[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Bangsa</label>
                 <select class="form-control" id="race" v-model="form.race">
                        <option v-for="race in races" v-bind:key="race.race" >{{race.race }} </option>
                        
                        </select>
                  </b-col>
                  <b-col>
                      <label>Warganegara</label>
                      <select class="form-control" id="nationality" v-model="form.nationality">
                        <option v-for="nationality in nationalities" v-bind:key="nationality.nationality" >{{nationality.nationality }} </option>
                        
                        </select>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Mukim</label>
                      <select class="form-control" id="area" v-model="form.area">
                        <option v-for="area in areas" v-bind:key="area.area" >{{area.area }} </option>
                        
                        </select>
                   </b-col>
                    <b-col>
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" id="job" v-model="form.job">
                         <small class="text-danger" v-if="errors.job">{{errors.job[0]}}</small>
                    </b-col>
                    </b-row>
                     <b-row>
                      <b-col>
                      <label>Alamat Tempat Kerja</label>
                      <input type="text" class="form-control" id="workplace" v-model="form.workplace">
                         <small class="text-danger" v-if="errors.workplace">{{errors.workplace[0]}}</small>
                    </b-col>
                       <b-col>
                      <label>No. Tel</label>
                      <input type="text" class="form-control" id="phone" v-model="form.phone">
                         <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
                    </b-col>
                    </b-row>
                    <div class="form-group">
                      <label>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Daftar</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
  <!--userUpdate Modal-->
  <div>
  <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Pesakit">     
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
   </b-modal>
   </div>
<!--userUpdate Modal-->
  
  <!--viewModal-->
  <div>
  <b-modal ref="view-modal" size="xl" hide-footer title="Data Pesakit">     
          <form class="patient" > 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="views.id">
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="views.name" disabled>
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                     </b-col>
                 
                     </b-row>
                             
                    <b-row>
                      <b-col>
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="views.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                   <b-col>
                      <label>Jantina</label>
                      <input type="text" class="form-control" id="gender" v-model="views.gender" disabled>
                         <small class="text-danger" v-if="errors.gender">{{errors.gender[0]}}</small>
                    </b-col>

                     <b-col>
                      <label>Umur</label>
                      <input type="text" class="form-control" id="age" v-model="views.age" disabled>
                         <small class="text-danger" v-if="errors.age">{{errors.age[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                     <b-col>
                      <label>Mukim</label>
                      <input type="text" class="form-control" id="area" v-model="views.area" disabled>
                         <small class="text-danger" v-if="errors.area">{{errors.area[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" id="job" v-model="views.job" disabled>
                         <small class="text-danger" v-if="errors.job">{{errors.job[0]}}</small>
                    </b-col>
                    </b-row>
                     <b-row>
                      <b-col>
                      <label>Alamat Tempat Kerja</label>
                      <input type="text" class="form-control" id="workplace" v-model="views.workplace" disabled>
                         <small class="text-danger" v-if="errors.workplace">{{errors.workplace[0]}}</small>
                    </b-col>
                       <b-col>
                      <label>No. Tel</label>
                      <input type="text" class="form-control" id="phone" v-model="views.phone" disabled>
                         <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
                    </b-col>
                    </b-row>
                    <div class="form-group">
                      <label>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="views.notes" disabled></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                      
                     
                    
                
               
                  </form> 
   </b-modal>
   </div>
<!--viewModal-->


 </div>
 </div>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Senarai Pesakit</h6>
                </div>


<b-row>
   <b-col sm="1" class="my-1" align="right">
           <b-button pill size="sm" variant="outline-secondary" id="show-btn" @click="showModal"> <i class="fas fa-plus"></i>&nbsp;Tambah</b-button>
        </b-col>
        <b-col sm="6" class="my-1">
        <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Carian"
            ></b-form-input>

            <b-input-group-append>
              <b-button variant="outline-secondary" :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col sm="4"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="6"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-select
            id="per-page-select"
             v-model="perPage"
            :options="pageOptions"
            size="sm"
          ></b-form-select>
        </b-form-group>
      </b-col>

   
    </b-row>

      <b-table  responsive 
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
      @row-clicked="viewModal"
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(actions)="row">
        <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1">
         <i class="fas fa-user-edit"></i>
        </b-button>
        <b-button size="sm" class="btn btn-sm btn-danger" @click="deleteUser(row.item.id)">
         <i class="fas fa-user-times"></i>
        </b-button>
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
                </div>
               <div class="card-footer">
                   <p class="mt-3"  align="center">Current Page: {{ currentPage }}</p>
                      <b-pagination  align="center"
                      v-model="currentPage"
                      :total-rows="rows"
                      :per-page="perPage"
                      
                       last-number
                      aria-controls="my-table"
                    ></b-pagination>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->


</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})

    
      }
  
      let token = localStorage.getItem('token');
    if(!token){
      this.$router.push({name: '/'})
      }
    },
      
     mounted(){
     let roles = localStorage.getItem('roles');
      if(roles.includes("user")-1){
      this.$router.push({name: 'home'})
      Notification.unauthorized()
    }
 

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
          form:{
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
        formr:{
       
          icno: null,
         
        },
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/'
          },
          {
            text: 'Pesakit',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
     sortBy: 'cumulative',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'age', label: 'Umur', sortable: true, sortDirection: 'desc' },
          { key: 'gender', label: 'Jantina', sortable: true, sortDirection: 'desc' },
          { key: 'race', label: 'Bangsa', sortable: true, sortDirection: 'desc' },
          { key: 'nationality', label: 'WN', sortable: true, sortDirection: 'desc' },
          { key: 'area', label: 'Mukim', sortable: true, sortDirection: 'desc' },
          { key: 'phone', label: 'No. Tel', sortable: true, sortDirection: 'desc' },
          { key: 'notes', label: 'Nota', sortable: true, sortDirection: 'desc' },
          { key: 'actions', label: 'Actions' },
        ],
        table:'',
      }
 





    },   
     computed:{
      filtersearch(){
      return this.users.filter(user => {
         return user.name.match(this.searchTerm)
      }) 
      },
      rows() {
        return this.items.length
      }
    },
 
  methods:{
      allPatient(){
    let self = this;
     axios.get('/api/patient/')
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
     race(){
    let self = this;
     axios.get('/api/race/')
      .then(function (response) {
        self.races = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       area(){
    let self = this;
     axios.get('/api/area/')
      .then(function (response) {
        self.areas = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       nationality(){
    let self = this;
     axios.get('/api/nationality/')
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
                    axios.delete('/api/patient/'+id)
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
           
      showModal() {
        this.$refs['my-modal'].show()
      },
       hideModal() {
        this.$refs['edit-modal'].hide()



        
      },
       toggleModal(id) {
         axios.get('/api/patient/'+id)
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
      toggleModal2(id) {
         axios.get('/api/patient/'+id)
  	    .then(({data}) => (this.formr = data))
        this.$refs['reset-modal'].toggle('#toggle-btnreset')
       
      },
   
       register(){
          axios.post('/api/patient', this.form)
          .then(() => {
        window.location.reload()
        Notification.success()
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/patient/'+id, this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/patient/')
       .then(function (response) {
        self.items = response.data;
        })
         this.$refs['edit-modal'].hide(); 
        Notification.success();
    
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },

         viewModal(record) {
          let self = this;
            axios.get('/api/patient/'+record.id)
  	     .then(function (response) {
        self.views = response.data;
        })
        this.$refs['view-modal'].toggle('#toggle-btn')
   
  },

 },
  }   
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>