  
<template>
<section class="content"> 

 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="container-fluid">
 <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 "> 
       <header> <b> BIODATA </b></header>    
                    <b-row sm="8"   ref="edit-modal" title="Kemaskini Pengguna">
                        <b-col>
                      <label>Nama</label>
                      <p>{{admissions.name}} </p>
                     </b-col>
                      <b-col>
                      <label>Nombor K/P atau Passport</label>
                       <p>{{admissions.kp_passport}} </p> 
                  </b-col>
                   <b-col>
                      <label>Jantina</label>
                <p> {{ admissions.gender}}    </p>  

                </b-col>      
                 </b-row>  
                <b-row>
                     <b-col>
                      <label>Umur</label>
                     <p> {{admissions.age}} </p>
                    </b-col>
                      <b-col>
                      <label>Bangsa</label>
               <p> {{admissions.race}} </p>                      
                  </b-col>
                  <b-col>
                      <label>Warganegara</label>
                   <p> {{admissions.nationality}} </p>
                    
                  </b-col>
                    </b-row>
                <b-row>
                     <b-col cols="4">
                      <label>Mukim</label>
                     <p> {{admissions.area}} </p>
                    </b-col>
                    
                  <b-col cols="8" >
                      <label>Alamat</label>
                   <p> {{admissions.address}} </p>
                    
                  </b-col>
                    </b-row>
                   <b-row>
                       <b-col>
                      <label>Pekerjaan</label>
               <p> {{admissions.job}} </p>                      
                  </b-col>
                     <b-col>
                      <label>Alamat Kerja</label>
                     <p> {{admissions.workplace}} </p>
                    </b-col>
                   </b-row>
          
                    <b-row>
                  <b-col>
                      <label>Catatan</label>
                   <p> {{admissions.notes}} </p>
                    
                  </b-col>
                    </b-row>
              </div>
            </div>
</div>

      <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 "> 
       <header> <b> REKOD KLINIKAL </b></header>    <br>
  
              <!-- Admission Tables --> 
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Kemasukan</h6>
                </div>

      <b-table  
      responsive 
      
      :items="items"
      :fields="fields"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
     
    >


      <template #cell(actions)="row">
<div v-if="admissions.reg_number ===null">


  <router-link :to="{name: 'newdmission', params:{kp_passport:admissions.kp_passport}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus"></i> </router-link>

</div>
<div v-else> 
  <router-link :to="{name: 'updateAdmission', params:{id:admissions.id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </router-link>
    

</div>
      
              
 
      </template>


    </b-table>
 <!-- Case Reporting Table -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Kes</h6>
                </div>       
                       <b-table  responsive 
                     
      :items="caseitems"
      :fields="casefields"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
    >

      <template #cell(actions)="row">

        <div v-if="admissions.year ===null">


  <router-link :to="{name: 'newCase', params:{kp_passport:admissions.kp_passport}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus"></i></router-link>

</div>
<div v-else> 
   <router-link :to="{name: 'updateCase', params:{id:admissions.id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </router-link>
     

</div>
   

      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

    <!-- Case Samplings Table -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sampling</h6>
                </div>       
                       <b-table  responsive 
                     
      :items="samplingitems"
      :fields="samplingfields"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
    >
      <template #cell(actions)="row">

             <div v-if="admissions.date_sample ===null">


  <router-link :to="{name: 'newSampling', params:{kp_passport:admissions.kp_passport}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus"></i> </router-link>

</div>
<div v-else> 
  <router-link :to="{name: 'updateSampling', params:{id:admissions.id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </router-link>
     

</div>
   
      
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

        <!-- Vaccine Table -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Vaksin</h6>
                </div>       
                       <b-table  responsive 
                     
      :items="vaccineitems"
      :fields="vaccinefields"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
    >
      <template #cell(actions)="row">
                 <div v-if="admissions.vaccine_type ===null">
  <router-link :to="{name: 'newSampling', params:{kp_passport:admissions.kp_passport}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus"></i> </router-link>

</div>
<div v-else> 
  <router-link :to="{name: 'updateSampling', params:{id:admissions.id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </router-link>
</div>
      </template>
    </b-table>
    
            <!-- Vaccine Table -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daily Review</h6>
                </div>       
                       <b-table  responsive 
                     
      :items="reviewitems"
      :fields="reviewfields"
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

      <template #cell(actions)="row">
        <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1">
         <i class="fas fa-edit"></i>
        </b-button>

      </template>
    </b-table>
              <!-- DischargeTable -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Disaj</h6>
                </div>       
                       <b-table  responsive 
                     
      :items="dischargeitems"
      :fields="dischargefields"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
    >
      <template #cell(actions)="row">
<div > 
  <router-link :to="{name: 'updateDischarge', params:{id:admissions.id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </router-link>
</div>
      </template>
    </b-table>          
                

            
               
              


              </div>
            </div> 
</div>
          <!--Row-->

</section>
</template>



<script type="text/javascript">

         

  export default {
   
       methods:{
         cases(){      
        axios.get('/api/admissionskp/'+this.$route.params.id+ '/?token='+ localStorage.getItem('token'))
       .then(({data}) => (this.admissions = data[0])) 
      },

     admissionrecord(){
    let self = this;
     axios.get('/api/admissionskp/'+ this.$route.params.id+'?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;        
        self.caseitems = response.data;
        self.samplingitems = response.data;
        self.vaccineitems = response.data;
        self.dischargeitems = response.data;
        self.reviewitems = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
         
 
       },
  

     data(){
      return{
        admissions:[],         
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
          {
            text: 'Details',
            active: true
          },
        ],

        items: [],
        fields: [
          { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
          { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'desc' },
          { key: 'adm_diagnosis', label: 'Diagnosis', sortable: true, sortDirection: 'asc' },
         { key: 'adm_stage', label: 'Stage', sortable: true, sortDirection: 'desc' },
         // { key: 'marriage', label: 'Taraf Kahwin', sortable: true, sortDirection: 'desc' },
          { key: 'date', label: 'Tarikh', sortable: true, sortDirection: 'desc' },
          { key: 'time', label: 'Masa', sortable: true, sortDirection: 'desc' },
      //   { key: 'religion', label: 'Agama', sortable: true, sortDirection: 'desc' },
      //    { key: 'phone', label: 'No. Tel', sortable: true, sortDirection: 'desc' },
      //    { key: 'note', label: 'Nota', sortable: true, sortDirection: 'desc' },
       //   { key: 'actions', label: '' },
           ],
      
        caseitems: [],
        casefields: [
          { key: 'year', label: 'Tahun', sortable: true, sortDirection: 'desc' },
          { key: 'epid_week', label: 'Minggu Epid', sortable: true, sortDirection: 'desc' },
          { key: 'cumulative', label: 'Bil', sortable: true, sortDirection: 'desc' },
          { key: 'date_report_KKM', label: 'Tarikh Daftar KKM', sortable: true, sortDirection: 'desc' },
          { key: 'district', label: 'Daerah Daftar', sortable: true, sortDirection: 'desc' },
          { key: 'locality', label: 'Lokaliti', sortable: true, sortDirection: 'desc' },
          { key: 'treating_hospital', label: 'Hospital Merawat', sortable: true, sortDirection: 'desc' },
        //  { key: 'actions', label: '' },
        ],
       samplingitems: [],
        samplingfields: [
        { key: 'symptomatic', label: 'Simptomatik', sortable: true, sortDirection: 'desc' },
          { key: 'onset', label: 'Onset', sortable: true, sortDirection: 'desc' },
          { key: 'screening_type', label: 'Jenis Saringan', sortable: true, sortDirection: 'desc' },
          { key: 'exposure_type', label: 'Jenis Exposure', sortable: true, sortDirection: 'desc' },
          { key: 'date_sample', label: 'Tarikh Sample', sortable: true, sortDirection: 'desc' },
          { key: 'type_sample', label: 'Jenis', sortable: true, sortDirection: 'desc' },
          { key: 'grading', label: 'Grading', sortable: true, sortDirection: 'desc' },
          { key: 'date_result', label: 'Tarikh Keputusan', sortable: true, sortDirection: 'desc' }, 
          { key: 'notes', label: 'Status Saringan/ Kontak', sortable: true, sortDirection: 'desc' },
        //  { key: 'actions', label: '' },
        ],
         vaccineitems: [],
       vaccinefields: [     
          { key: 'vaccine_type', label: 'Jenis Vaksin', sortable: true, sortDirection: 'desc' },
          { key: 'first_dose_date', label: '1st Dose', sortable: true, sortDirection: 'desc' },
          { key: 'second_dose_date', label: '2nd Dose', sortable: true, sortDirection: 'desc' },
        //  { key: 'actions', label: '' },
        ],
               dischargeitems: [],
       dischargefields: [     
          { key: 'date_dc', label: 'Tarikh Disaj', sortable: true, sortDirection: 'desc' },
          { key: 'duration', label: 'Bilangan Hari', sortable: true, sortDirection: 'desc' },
          { key: 'type_dc', label: 'Jenis Discharges', sortable: true, sortDirection: 'desc' },
          { key: 'notes', label: 'Catatan', sortable: true, sortDirection: 'desc' },
     //   { key: 'actions', label: '' },
        ],
         reviewitems: [],
       reviewfields: [     
          { key: 'date_review', label: 'Tarikh', sortable: true, sortDirection: 'desc' },
          { key: 'reviewing_mo', label: 'Medical Officer', sortable: true, sortDirection: 'desc' },
   
        //  { key: 'actions', label: '' },
        ],
      }
 


    },
    mounted: function(){
      this.cases();
      this.admissionrecord();

   
     
    }, 
   


  }
</script>ad


<style type="text/css">

</style>