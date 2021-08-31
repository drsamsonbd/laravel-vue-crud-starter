  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <b-modal ref="my-modal" size="xl" hide-footer title="Daftar Kes">
    
           <form class="user" @submit.prevent="register">
                  
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                       <select class="form-control" id="name" v-model="form.kp_passport">
                        <option v-for="patient in patients" v-bind:key="patient.kp_passport" :value="patient.kp_passport"> {{patient.name }} | {{patient.kp_passport}}</option>
                        
                        </select>
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
                      <button type="submit"  class="btn btn-primary btn-block">Daftar Kes</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
  <!--userUpdate Modal-->
  <div>
  <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Daftar Kes">     
          <form class="user" @submit.prevent="patientUpdate"> 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>No. Kad Pengenalan/ Passport</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="forms.kp_passport" disabled>
                    
                     </b-col>
                     </b-row>
                             
                  <b-row>
                      
                   <b-col>
                      <label>Tahun</label>
                        <select class="form-control" id="name" v-model="forms.year">                  
                        <option >2021</option>
                        <option >2020</option>
                        </select>
                    </b-col>

                     <b-col>
                      <label>Minggu Epid</label>
                      <input type="text" class="form-control" id="epid" v-model="forms.epid_week">
                         <small class="text-danger" v-if="errors.epid_week">{{errors.epid_week[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Bilangan Kumulatif</label>
                      <input type="text" class="form-control" id="cumulative" v-model="forms.cumulative">
                         <small class="text-danger" v-if="errors.cumulative">{{errors.cumulative[0]}}</small>
                   </b-col>
                  <b-col>
                      <label>Tarikh Daftar Kes</label>
                      <input type="date" class="form-control" id="date_report" v-model="forms.date_report_KKM">
                         <small class="text-danger" v-if="errors.date_report_KKM">{{errors.date_report_KKM[0]}}</small>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Bilangan Kes</label>
                      <input type="text" class="form-control" id="daily_number" v-model="forms.daily_number">
                         <small class="text-danger" v-if="errors.daily_number">{{errors.daily_number[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Daerah Daftar Kes</label>
                        <select class="form-control" id="district" v-model="forms.district">
                        <option v-for="district in districts" v-bind:key="district.district" >{{district.district }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Lokaliti</label>
                       <select class="form-control" id="locality" v-model="forms.locality">
                        <option v-for="locality in localities" v-bind:key="locality.locality" >{{locality.locality }} </option>
                        
                        </select>
                   </b-col>
                    <b-col>
                      <label>Hospital Merawat</label>
                     <select class="form-control" id="hospital" v-model="forms.treating_hospital">
                        <option v-for="hospital in hospitals" v-bind:key="hospital.hospital" >{{hospital.hospital }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                     
                    <br>
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
                         <p v-for="view in views" v-bind:key="view.id"> {{view.name}}</p>
                     
                     </b-col>
                     <b-col >
                      <label>Nombor K/P atau Passport</label>
                      <p v-for="view in views" v-bind:key="view.id"> {{view.kp_passport}}</p>
                  </b-col>
                     </b-row>
                             
                    <b-row>
                      
                   <b-col>
                      <label>Tahun</label>
                        <p v-for="view in views" v-bind:key="view.id"> {{view.year}}</p>               
                      
                    </b-col>

                     <b-col>
                      <label>Minggu Epid</label>
                     <p v-for="view in views" v-bind:key="view.id"> {{view.epid_week}}</p>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Bilangan Kumulatif</label>
                      <p v-for="view in views" v-bind:key="view.id"> {{view.cumulative}}</p>
                   </b-col>
                  <b-col>
                      <label>Tarikh Daftar Kes</label>
                     <p v-for="view in views" v-bind:key="view.id"> {{view.date_report_KKM}}</p>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Bilangan Kes</label>
                      <p v-for="view in views" v-bind:key="view.id"> {{view.daily_number}}</p>
                   </b-col>
                    <b-col>
                      <label>Daerah Daftar Kes</label>
                        <p v-for="view in views" v-bind:key="view.id"> {{view.district}}</p>
                       
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Lokaliti</label>
                      <p v-for="view in views" v-bind:key="view.id"> {{view.locality}}</p>
                      
                   </b-col>
                    <b-col>
                      <label>Hospital Merawat</label>
                    <p v-for="view in views" v-bind:key="view.id"> {{view.treating_hospital}}</p>
                       
                    </b-col>
                    </b-row>
               
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
                  <h6 class="m-0 font-weight-bold text-primary">Senarai Kes Daftar</h6>
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
        this.allCases();
        this.district();
        this.hospital();
        this.locality();
      },

      
     data(){
      return{
          patients:[],
          races:[],
          areas:[],
          districts:[],
          localities:[],
          hospitals:[],
          views:[],  
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
          forms:{
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
            href: '/'
          },
          {
            text: 'Daftar Kes',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 15, 25, 50, { value: 200, text: "Show a lot" }],
        sortBy: 'cumulative',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
       
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'year', label: 'Tahun', sortable: true, sortDirection: 'desc' },
          { key: 'epid_week', label: 'Minggu Epid', sortable: true, sortDirection: 'desc' },
          { key: 'cumulative', label: 'Bil', sortable: true, sortDirection: 'desc' },
          { key: 'date_report_KKM', label: 'Taikh Daftar KKM', sortable: true, sortDirection: 'desc' },
          { key: 'district', label: 'Daerah Daftar', sortable: true, sortDirection: 'desc' },
          { key: 'locality', label: 'Lokaliti', sortable: true, sortDirection: 'desc' },
          { key: 'treating_hospital', label: 'Hospital Merawat', sortable: true, sortDirection: 'desc' },
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
        self.patients = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
      allCases(){
    let self = this;
     axios.get('/api/cases/')
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

    district(){
    let self = this;
     axios.get('/api/district/')
      .then(function (response) {
        self.districts = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
   locality(){
    let self = this;
     axios.get('/api/locality/')
      .then(function (response) {
        self.localities = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
     hospital(){
    let self = this;
     axios.get('/api/hospital/')
      .then(function (response) {
        self.hospitals = response.data;
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
                    axios.delete('/api/case/'+id)
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
         axios.get('/api/case/'+id)
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
      toggleModal2(id) {
         axios.get('/api/case/'+id)
  	    .then(({data}) => (this.formr = data))
        this.$refs['reset-modal'].toggle('#toggle-btnreset')
       
      },
   
       register(){
          axios.post('/api/case', this.form)
          .then(() => {
        window.location.reload()
        Notification.success()
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data Entry'
            })
          )
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/case/'+id, this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/cases/')
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
        axios.get('/api/cases/'+record.id)
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