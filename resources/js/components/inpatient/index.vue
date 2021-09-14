  

<template v-for="table">
  
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
                        <option >Tiada data</option>
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
  
  <!--userUpdate Modal-->
  <div>
  <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Kemasukan">     
          <form class="user" @submit.prevent="patientUpdate"> 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                      
                    </div>  

                    <b-row>
                          <b-col >
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="forms.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                    </b-row>
                      <b-row>
                       <b-col>
                      <label>Agama</label>
                        <select class="form-control" id="name" v-model="forms.religion">                  
                        <option>Islam</option>
                        <option>Kristian</option>
                        <option>Buddha</option>
                        <option>Hindu</option>
                        </select>
                    </b-col>
                   <b-col>
                      <label>Taraf Perkahwinan</label>
                        <select class="form-control" id="name" v-model="forms.marriage">                  
                        <option >Bujang</option>
                        <option >Kahwin</option>
                        <option>Duda</option>
                        <option >Janda/Balu</option>
                        <option >Tiada data</option>
                        </select>
                    </b-col>                  
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Nama Waris</label>
                      <input type="text" class="form-control" id="kin" v-model="forms.kin">
                  </b-col>
                   <b-col>
                      <label>Hubungan</label>
                      <input type="text" class="form-control" id="kinrelation" v-model="forms.kin_relation">
                  </b-col>
                  </b-row>
                   <b-row>
                  <b-col>
                      <label>Alamat Waris</label>
                      <input type="text" class="form-control" id="kinaddress" v-model="forms.kin_address">
                  </b-col>
                   <b-col>
                      <label>No. Telefon Waris</label>
                      <input type="text" class="form-control" id="kinPhone" v-model="forms.kin_phone">
                  </b-col>
                  </b-row>
                  <b-row>
                  <b-col>
                      <label>Tarikh Masuk</label>
                      <input type="date" class="form-control" id="date_report" v-model="forms.date">
                         <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                  </b-col>
                    <b-col>
                      <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="forms.time">
                         <small class="text-danger" v-if="errors.time">{{errors.time[0]}}</small>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Berat Pesakit</label>
                      <input type="text" class="form-control" id="daily_number" v-model="forms.weight">
                         <small class="text-danger" v-if="errors.weight">{{errors.weight[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>PKRC</label>
                        <select class="form-control" id="district" v-model="forms.pkrc">
                        <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Register Number</label>
                       <input type="text" class="form-control" id="rn" v-model="forms.reg_number">
                     
                   </b-col>                 
                    </b-row>
                           <b-row>
                     <b-col>
                      <label>Nota</label>
                       <input type="text" class="form-control" id="note" v-model="forms.note">
                     
                   </b-col>                 
                    </b-row>
                    <br>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Kemaskini</button>
                    </div>
                    <hr>
               
                  </form> 
   </b-modal>
   </div>
<!--userUpdate Modal-->
  

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
    <!--View Modal-->
    <b-modal ref="view-modal" size="lg" hide-footer title="Data Pesakit">     
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
      <!-- Admission Records-->
                    <hr>
                   <b-table  responsive 
      :items="admission_record"
      :fields="fields_admission"
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
     
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(edit)="row">
       <router-link :to="{name: 'admissionform', params:{id:row.item.id}}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></router-link> <br>
        
         
       
    
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li> 
          </ul>
        </b-card>
      </template>
    </b-table>
     <hr>
  <!-- Review Records-->
       <label for=""><b>Review Records</b></label>                
      <b-table  responsive 
      :items="review_record"
      :fields="fields_review"
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
     
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(edit_discharge)="row">
       <router-link :to="{name: 'admissionform', params:{id:row.item.id}}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></router-link> <br>
        
         
       
    
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li> 
          </ul>
        </b-card>
      </template>
    </b-table>

   <!-- Discharge Records-->
       <label for=""><b>Discharge </b></label>                
      <b-table  responsive 
      :items="discharge_record"
      :fields="fields_discharge"
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
     
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(edit_discharge)="row">
       <router-link :to="{name: 'dischargeupdate', params:{id:row.item.id}}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></router-link> <br>
        
         
       
    
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li> 
          </ul>
        </b-card>
      </template>
    </b-table>
   </b-modal>


 
<!--end View Modal-->

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
      @row-clicked="viewModal"
      flex 
      striped 
      hover
     
    >
     
       <template #cell(review)="row">
           <div v-if="row.item.date_dc==null"> <router-link :to="{name: 'review', params:{id:row.item.id}}" class="btn btn-sm btn-primary">Review</router-link> <br>
           <span>Last review: {{row.item.date_review}} </span>
</div>
        <div v-else> Discharged
</div>   
      </template>
       <template #cell(discharge)="row">
         <div v-if="row.item.date_dc==null"> <router-link :to="{name: 'dischargeform', params:{id:row.item.id}}" class="btn btn-sm btn-primary">Discaj</router-link>
</div>
        <div v-else> {{row.item.date_dc}}
</div>
      
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
                    <p class="mt-3"  align="center">Cumulative Case: {{ items.length }}</p>
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
            text: 'PKRC',
            href: '/'
          },
          {
            text: 'Senarai',
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
          { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
          { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },      
          { key: 'date', label: 'Tarikh Kemasukan', sortable: true, sortDirection: 'desc' },
          { key: 'review', label: 'Review', sortable: true, sortDirection: 'desc' },
          { key: 'discharge', label: 'Discaj', sortable: true, sortDirection: 'desc' },
          //{ key: 'actions', label: 'Actions' },
           ],
        table:'',
             admission_record: [],
        fields_admission: [
          { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
          { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'desc' },
          { key: 'date', label: 'Tarikh Kemasukan', sortable: true, sortDirection: 'desc' },
            { key: 'time', label: 'Masa Kemasukan', sortable: true, sortDirection: 'desc' },
           { key: 'edit', label: 'Actions' },
           ],
        discharge_record: [],
        fields_discharge: [
          { key: 'id', label: 'Date', sortable: true, sortDirection: 'desc' },
          { key: 'date_dc', label: 'Date', sortable: true, sortDirection: 'desc' },
          { key: 'type_dc', label: 'Jenis Discharge', sortable: true, sortDirection: 'desc' },
           { key: 'edit_discharge', label: 'Actions' },
           ],
          review_record: [],
          fields_review: [
          { key: 'date_review', label: 'Date Review', sortable: true, sortDirection: 'desc' },
          { key: 'reviewing_mo', label: 'MO', sortable: true, sortDirection: 'desc' },
           { key: 'view', label: 'Actions' },
           ],
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
     axios.get('/api/admissions/')
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
   pkrc(){
    let self = this;
     axios.get('/api/pkrc/')
      .then(function (response) {
        self.pkrcs = response.data;
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
                    axios.delete('/api/admission/'+id)
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
      this.$router.push({name:'dischargeform', params: {id:id}}); 
       
      },
    
       register(){
          axios.post('/api/admission', this.form)
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
       axios.patch('/api/admission/'+id, this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/admission/')
       .then(function (response) {
        self.items = response.data;
        })
       this.$refs['edit-modal'].hide(); 
       this.allCases();
        Notification.success();
    
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },

         viewModal(record) {
         let self = this;
        axios.get('/api/admissions/'+record.id)
  	    .then(function (response) {
        self.views = response.data[0];
        self.admission_record = response.data;
        self.review_record = response.data;
        self.discharge_record = response.data;
        });
         
  
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