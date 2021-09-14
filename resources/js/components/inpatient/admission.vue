  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  

   <div class="container-fluid">

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Kemasukan</h6>
                </div>
<div class="container-fluid">

<b-row>

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
      @row-clicked="viewPatient"
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
          </div>
          <!--Row-->
</section>
  </div>
</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})

    
      }
 
    },
      
     mounted(){
  
        this.allPatient();
        this.allCases();
        this.pkrc();
        this.hospital();
      },

      
     data(){
      return{
          patients:[],
          races:[],
          pkrcs:[],
          districts:[],
          localities:[],
          hospitals:[],
          views:[],  

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
          note: null
          
        },
          forms:{
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
          note: null
      
        },
      
        errors:{},     
        
        itemize: [
          {
            text: 'Pesakit Dalam',
            href: '/'
          },
          {
            text: 'Admission',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 15, 25, 50, { value: 200, text: "Show a lot" }],
        sortBy: 'reg_number',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
          { key: 'ward', label: 'Wad', sortable: true, sortDirection: 'desc' },
          { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'marriage', label: 'Taraf Kahwin', sortable: true, sortDirection: 'desc' },
          { key: 'date', label: 'Tarikh', sortable: true, sortDirection: 'desc' },
          { key: 'time', label: 'Masa', sortable: true, sortDirection: 'desc' },
        { key: 'date_dc', label: 'Discaj', sortable: true, sortDirection: 'desc' },
      //    { key: 'phone', label: 'No. Tel', sortable: true, sortDirection: 'desc' },
      //    { key: 'note', label: 'Nota', sortable: true, sortDirection: 'desc' },
      //    { key: 'actions', label: 'Actions' },
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
     axios.get('/api/WardAdmissionRecord/'+ '?token='+ localStorage.getItem('token'))
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
                    axios.delete('/api/admission/'+id+ '?token='+ localStorage.getItem('token'))
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
         axios.get('/api/admission/'+id+ '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
    
       register(){
          axios.post('/api/admission'+ '?token='+ localStorage.getItem('token'), this.form)
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
       axios.patch('/api/admission/'+id+ '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/admission/')
       .then(function (response) {
        self.items = response.data;
        })
       this.$refs['edit-modal'].hide(); 
       this.allCases();
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    )
    
       })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
       
     },

   viewPatient(record) {
        this.$router.push({name: 'inpatientdetails', params: { id: record.kp_passport } })
   
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