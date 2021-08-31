  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <b-modal ref="my-modal" size="xl" hide-footer title="Rekod Ujian Kes">
    
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
                      <button type="submit"  class="btn btn-primary btn-block">Daftar Kes</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
  <!--userUpdate Modal-->
  <div>
  <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Rekod Ujian Kes">     
          <form class="user" @submit.prevent="patientUpdate"> 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="forms.name" disabled>
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                     </b-col>
                         <b-col>
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="forms.kp_passport" disabled>
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
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="views.kp_passport" disabled>
                       
                  </b-col>
                      </b-row>
                      <b-row>
                   <b-col>
                      <label>Simptomatik</label>
                       <input type="text" class="form-control" id="symptomatic" v-model="views.symptomatic" disabled>
                    </b-col>

                     <b-col>
                      <label>Onset</label>
                      <input type="date" class="form-control" id="epid" v-model="views.onset" disabled>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Jenis Saringan</label>
             <input type="text" class="form-control" id="screening" v-model="views.screening_type" disabled>
                   </b-col>
                   <b-col>
                        <label>Jenis Exposure</label>
                     <input type="text" class="form-control" id="exposure" v-model="views.exposure_type" disabled>
                   </b-col>
                  <b-col>
                      <label>Reinfection?</label>
                     <input type="text" class="form-control" id="reinfection" v-model="views.reinfection" disabled>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Tarikh Sampel</label>
                  <input type="text" class="form-control" id="datesample" v-model="views.date_sample" disabled>
                   </b-col>
                     <b-col>
                      <label>Jenis Sampel</label>
                   <input type="text" class="form-control" id="type" v-model="views.type_sample" disabled>
                  </b-col>
                      <b-col>
                      <label>Tarikh Sampel di MKA</label>
                      <input type="text" class="form-control" id="mka" v-model="views.date_mka" disabled>
                   </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Grading</label>
                       <input type="text" class="form-control" id="grading" v-model="views.grading" disabled>
                   </b-col>
                    <b-col>
                      <label>Tarikh Keputusan</label>
                       <input type="text" class="form-control" id="result" v-model="views.date_result" disabled>
                    </b-col>
                    </b-row>
                            <b-row>
                     <b-col>
                      <label>Vaksinasi</label>
                       <input type="text" class="form-control" id="vaksin" v-model="views.vaccine_type" disabled>
                        
                   </b-col>
                    <b-col>
                      <label>Tarikh 1st Dose</label>
                     <input type="date" class="form-control" id="1stdose" v-model="views.first_dose_date" disabled>
                    </b-col>
                     <b-col>
                      <label>Tarikh 2nd Dose</label>
                     <input type="date" class="form-control" id="2nddose" v-model="views.second_dose_date" disabled>
                    </b-col>
                    </b-row>
                    <br>
                    <div class="form-group">
                      <button type="submit" id="myBtn" class="btn btn-primary btn-block" @click="patientUpdate(patient.id)">Kemaskini</button>
               
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
        this.allCases();
        this.district();
        this.hospital();
        this.locality();
        this.vaccine();
      },

      
     data(){
      return{
          patients:[],
          races:[],
          areas:[],
          districts:[],
          localities:[],
          hospitals:[],
          vaccines:[],

          views:[],  
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
          forms:{
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
            href: '/'
          },
          {
            text: 'Ujian',
            active: true
          },
        ],
          modalShow: false,

        perPage: 5,
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
          { key: 'symptomatic', label: 'Simptomatik', sortable: true, sortDirection: 'desc' },
          { key: 'onset', label: 'Onset', sortable: true, sortDirection: 'desc' },
          { key: 'screening_type', label: 'Jenis Saringan', sortable: true, sortDirection: 'desc' },
          { key: 'exposure_type', label: 'Jenis Exposure', sortable: true, sortDirection: 'desc' },
          { key: 'reinfection', label: 'Reinfection?', sortable: true, sortDirection: 'desc' },
          { key: 'date_sample', label: 'Tarikh Sample', sortable: true, sortDirection: 'desc' },
          { key: 'type_sample', label: 'Jenis', sortable: true, sortDirection: 'desc' },
          { key: 'date_mka', label: 'Takih MKA', sortable: true, sortDirection: 'desc' },
          { key: 'grading', label: 'Grading', sortable: true, sortDirection: 'desc' },
          { key: 'date_result', label: 'Tarikh Keputusan', sortable: true, sortDirection: 'desc' },
          { key: 'vaccine_type', label: 'Jenis Vaksin', sortable: true, sortDirection: 'desc' },
          { key: 'first_dose_date', label: '1st Dose', sortable: true, sortDirection: 'desc' },
          { key: 'second_dose_date', label: '2nd Dose', sortable: true, sortDirection: 'desc' },
          { key: 'notes', label: 'Status Saringan/ Kontak', sortable: true, sortDirection: 'desc' },
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
     axios.get('/api/samples/')
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
        vaccine(){
    let self = this;
     axios.get('/api/vaccine/')
      .then(function (response) {
        self.vaccines = response.data;
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
                    axios.delete('/api/sampling/'+id)
                  .then(() => {
                    window.location.reload()
                    this.users = this.users.filter(user => {
                      return user.id != id
                    })
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
         axios.get('/api/sampling/'+id)
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
 
   
       register(){
          axios.post('/api/sampling', this.form)
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
       axios.patch('/api/sampling/'+id, this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/samples/')
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
            axios.get('/api/sampling/'+record.id)
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