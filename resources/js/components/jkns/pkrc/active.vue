  

<template v-for="table">
 <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

     

    <b-modal ref="my-modal" size="xl" hide-footer title="Daftar Kemasukan">
    
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
                      <input type="date" class="form-control" id="date_report" v-model="form.date">
                         <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                  </b-col>
                    <b-col>
                      <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="form.time">
                         <small class="text-danger" v-if="errors.time">{{errors.time[0]}}</small>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Berat Pesakit</label>
                      <input type="text" class="form-control" id="daily_number" v-model="form.weight">
                   </b-col>
                    <b-col>
                      <label>PKRC</label>
                        <select class="form-control" id="district" v-model="form.pkrc">
                        <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Register Number</label>
                       <input type="text" class="form-control" id="rn" v-model="form.reg_number">
                     
                   </b-col>                 
                    </b-row>
                <b-row>
                       <b-col>
                      <label>Diagnosis on admission</label>
                        <select class="form-control" id="marriage" v-model="form.adm_diagnosis">                  
                        <option >COVID-19</option>
                        <option >PUI</option>
                        <option>PUS</option>
                        </select>
                    </b-col>   
                       <b-col>
                      <label>Stage</label>
                        <select class="form-control" id="marriage" v-model="form.adm_stage">                  
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
                      <label>Nota</label>
                       <input type="text" class="form-control" id="note" v-model="form.note">
                          <small class="text-danger" v-if="errors.note">{{errors.note[0]}}</small>
                     
                   </b-col>                 
                    </b-row>
                    <br>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Daftar Kemasukan</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
 

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Bilangan Pesakit PKRC</h6>
                </div>


<b-row>
    <b-col>
    <div class="input-group mb-3">    
        
    <b-form-select v-model="selectedpkrc"
         placeholder="Sila pilih fasiliti"        
         >
                     <option v-for="pkrc in options" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option> 
                </b-form-select>     <button size="sm" variant="outline-primary" @click="allPatient()">Pilih fasiliti</button> <br>
    
         
    </div>
</b-col>
</b-row>
<b-row > 
<b-col>
  
  <h5 class="mt-3" v-if="!isHidden" style="color:blue" id="jumlah" > <b>Jumlah Pesakit:  {{ items.length }}</b></h5>
  </b-col>
  </b-row>

<b-row   v-if="!isHidden">
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

      <b-col sm="3"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="3"
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

   
    </b-row> <br>
<div class="container-fluid">
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
      @row-clicked="viewPatient"

       v-if="!isHidden"
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

       <template #cell(discharge)="row">
       <router-link :to="{name: 'dischargeform', params:{id:row.item.id}}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></router-link> <br>
        
         
       
    
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
              
               <div class="card-footer" v-if="!isHidden" >
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
            </div>

         <!-- Table not hidden -->

            <div class="row" v-if="isHidden">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
              



<b-row > 
<b-col>
  
  <h5 class="mt-3" v-if="isHidden" style="color:blue" id="jumlah" > <b>Jumlah Pesakit:  {{ items.length }}</b></h5>
  </b-col>
  </b-row>

<b-row   v-if="isHidden">

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

      <b-col sm="3"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="3"
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

   
    </b-row> <br>
<div class="container-fluid">
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
      @row-clicked="viewPatient"

       v-if="isHidden"
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

       <template #cell(discharge)="row">
       <router-link :to="{name: 'dischargeform', params:{id:row.item.id}}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></router-link> <br>
        
         
       
    
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
              
               <div class="card-footer" v-if="isHidden" >
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
            </div>   
          </div>
          <!--Row-->
          </div>
 </div>
</section>
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

        this.race();
        this.area(),
        this.getpkrc();
        this.allPatients();
        this.allCases();
        this.pkrc();
        this.hospital();
      },

      
     data(){
      return{
          isHidden: true,

          patients:[],
          races:[],
          pkrcs:[],
          districts:[],
          localities:[],
          hospitals:[],
          views:[], 
          races: [],
          options:[],
          areas:[], 
          selectedpkrc: null,

          form:{
          kp_passport: null,
          reg_number: null,
          kp_passport: null,
          pkrc: null,
          marriage: null,
          religion: null,
          kin: null,
          kin_address: null,
          kin_relation: null,
          kin_phone: null,
          date: null,
          time: null,
          weight: null,
          adm_diagnosis: null,
          adm_stage: null,
          note: null

        },
         
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
            {
            text: 'PKRC',
            href: '#'
          },
          {
            text: 'Aktif',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'date',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [     
           { key: 'id', label: 'ID', sortable: true, sortDirection: 'asc' },       
          { key: 'date', label: 'Tarikh Kemasukan', sortable: true, sortDirection: 'asc' },          
          { key: 'time', label: 'Masa', sortable: true, sortDirection: 'asc' },
          { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'asc' },
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'age', label: 'Umur', sortable: true, sortDirection: 'desc' },
          { key: 'gender', label: 'Jantina', sortable: true, sortDirection: 'desc' },
           { key: 'adm_diagnosis', label: 'Diagnosis', sortable: true, sortDirection: 'desc' },
            { key: 'adm_stage', label: 'Stage', sortable: true, sortDirection: 'desc' },
          { key: 'vaccine_type', label: 'Vaccination', sortable: true, sortDirection: 'desc' },
         //   { key: 'view', label: 'View' },
       //  { key: 'discharge', label: 'Discaj' },
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
 allPatients(){
    let self = this;
     axios.get('/api/patient/' + '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.patients = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
      allCases(){
    let self = this;
     axios.get('/api/active/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
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
   pkrc(){
    let self = this;
     axios.get('/api/pkrc/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.pkrcs = response.data;
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

      allPatient(){
     this.isHidden = false;
    let self = this;
     axios.get('/api/activepkrc/'+ '?token='+ localStorage.getItem('token'), { params: { pkrc: this.selectedpkrc } })
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
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
       getpkrc(){
    let self = this;
     axios.get('/api/pkrc/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.options = response.data;
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
                    axios.delete('/api/reports/'+id)
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
         axios.get('/api/reports/'+id+ '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
    
   
       register(){
         axios.post('/api/admission'+ '?token='+ localStorage.getItem('token'), this.form)
          .then(() => {
            this.$refs['my-modal'].hide()
            this.allPatient();
              Toast.fire({
              icon: 'success',
              title: 'Laporan telah dihantar!'
                  })
         })
        .catch(()=>{
            Toast.fire({
              icon: 'warning',
              title: 'Pastikan maklumat lengkap telah diisi!'
            });
              })
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/reports/'+id+ '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/reports/'+ '?token='+ localStorage.getItem('token'))
       .then(function (response) {
        self.items = response.data;
        })
            this.$refs['edit-modal'].hide(); 
            this.allPatient();
          Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    )
    
       })
    
     },

         viewPatient(record) {
        this.$router.push({name: 'jknpkrcdetails', params: { id: record.kp_passport } })
   
  },    newAdmission(){
     this.$router.push({name: 'newAdmissionSearch' }) 
    },
   

 },
  }   
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
  #jumlah{
    margin-left: 20px;

  }

</style>