<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  


 <hr>
   <div class="container-fluid">
  <div class=" row shadow-sm- p-4 mb-4 bg-white">
   <div class="col-lg-12 ">
                   <b-row>
                        <b-col cols="7" >
                      <label>Nama Pesakit</label>
                       <input class="form-control" id="name" v-model="form.name" disabled>
                    
                     </b-col>
                     <b-col cols="3" >
                      <label>Nombor Pengenalan</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled>                    
                  </b-col>
                           <b-col cols="2" >
                      <label>RN</label>
                      <input type="text" class="form-control" v-model="form.rn" disabled>                    
                  </b-col>
                     </b-row> <br> <hr>

<!-- UPDATE BEDS-->

    <header> <b> KEMASKINI KATIL </b></header> <br>
  <form class="user" @submit.prevent="updateBed" >  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group 
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
        
          <b-input-group size="md">
              <b-form-input v-model="bedUpdate.BDid" disabled hidden>
             
         >
  </b-form-input>  
    
              <b-form-input v-model="bedUpdate.ward" disabled  hidden>
             
         >
  </b-form-input>  
  <b-form-input v-model="bedUpdate.discipline" disabled hidden>
             
         >
  </b-form-input>  
        <b-form-input v-model="bedUpdate.current_bed_code" disabled>
             
         >
  </b-form-input>           

    <b-form-select   v-model="bedUpdate.bedcode" required >
                    <option v-for="bed in bedlist" v-bind:key="bed.id"  v-bind:value="bed.id">{{bed.bed_code}} </option>
                </b-form-select>  
<b-form-input v-model="bedUpdate.date_bed"
         placeholder="Tarikh" type="date"         
        required hidden>
  </b-form-input>
         
          </b-input-group>
        </b-form-group>     

</b-col>   <b-input-group-append>
              <b-button type="submit" variant="outline-primary" > <b>Kemaskini </b></b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
  </form>  <br> <hr>
<!-- UPDATE WARD-->

    <header> <b> KEMASKINI WAD </b></header> <br>
  <form class="user" @submit.prevent="updateWard">  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
          <b-input-group size="md">
  <b-form-input v-model="wardUpdate.discipline_id" disabled hidden>
             
         >
  </b-form-input>  
        <b-form-input v-model="wardUpdate.ward" disabled hidden>
             
         >
  </b-form-input>           
        <b-form-select  v-model="wardUpdate.newWard"    
                required @change="getBedWard()" >
                     <option v-for="ward in wards" v-bind:key="ward.ward" v-bind:value="ward.id" >{{ward.ward }} </option> 
                </b-form-select>  <span></span>
    <b-form-select   v-model="wardUpdate.bedcode" required >
                    <option v-for="bed in beds" v-bind:key="bed.id"  v-bind:value="bed.id">{{bed.bed_code}} </option>
                </b-form-select>  
                <br>
                    <b-form-select v-model="wardUpdate.newDiscipline"
         placeholder="Sila pilih disiplin"        
        required >
           <option v-for="discipline in disciplines" v-bind:key="discipline.discipline" v-bind:value="discipline.id" >{{discipline.discipline }} </option>
                </b-form-select>  
  <b-form-input v-model="wardUpdate.date_update"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>

    <b-form-input v-model="wardUpdate.time_update"
         placeholder="Tarikh" type="time"         
        required >
  </b-form-input>
         
          </b-input-group>
        </b-form-group>     

</b-col>
<b-input-group-append>
              <b-button type="submit" variant="outline-primary" > <b>Kemaskini </b></b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
               
                  </form> <br>
<!-- UPDATE DISCIPLINE --> <hr>
    <header> <b> KEMASKINI DISIPLIN </b></header> <br>
  <form class="user" @submit.prevent="updateDiscipline">  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
          <b-input-group size="md">

        <b-form-input v-model="form.bed_id" hidden disabled>
             
         >
  </b-form-input>     
        <b-form-input v-model="bed_discipline.discipline" disabled>
             
         >
  </b-form-input>           
    <b-form-select v-model="bed_discipline.newDiscipline"
         placeholder="Sila pilih disiplin"        
        required >
           <option v-for="discipline in disciplines" v-bind:key="discipline.discipline" v-bind:value="discipline.id" >{{discipline.discipline }} </option>
                </b-form-select>  


  <b-form-input v-model="bed_discipline.date_update"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>
    <b-form-input v-model="bed_discipline.time_update"
         placeholder="Tarikh" type="time"         
        required >
  </b-form-input>
         
          </b-input-group>
        </b-form-group>     

</b-col>
<b-input-group-append>
              <b-button type="submit" variant="outline-primary" > <b>Kemaskini </b></b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
               
                  </form> <br>
                  <hr>

<!-- UPDATE DIAGNOSIS -->
    <header> <b> KEMASKINI DIAGNOSIS </b></header> <br>
  <form class="user" @submit.prevent="updateDiagnosis">  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
          <b-input-group size="md">

  
        <b-form-input v-model="diagnosisUpdate.diagnosis" disabled>
             
         >
  </b-form-input>       

 
        <b-form-input v-model="diagnosisUpdate.stage" disabled>
             
         >
  </b-form-input>   

    <b-form-select v-model="diagnosisUpdate.newDiagnosis"
         placeholder="Diagnosis Baru"        
        required >
            <option >COVID-19</option>
                        <option >PUI</option>
                        <option>PUS</option>
                          <option>SARI</option>
                            <option>Non COVID</option> 
                </b-form-select>  
   <b-form-select v-model="diagnosisUpdate.newStage"
         placeholder="Stage"        
        required >           
                     <option >1</option>
                        <option >2</option>
                        <option>3</option>
                          <option>4</option>
                        <option>5</option>
                        <option>NA</option>
                </b-form-select>  

  <b-form-input v-model="diagnosisUpdate.date_update"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>
        
          </b-input-group>
        </b-form-group>     

</b-col>    <b-input-group-append>
              <b-button type="submit" variant="outline-primary">Kemaskini</b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
               
                  </form> 


  <!-- UPDATE VACCINATION -->
    <header> <b> KEMASKINI VAKSINASI </b></header> <br>
  <form class="user" @submit.prevent="updateVaccination">  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
          <b-input-group size="md">

    <b-form-select v-model="vaccineUpdate.vaccine"
         placeholder="Diagnosis Baru"        
        required >
   <option v-for="vaccine in vaccines" v-bind:key="vaccine.vaccine" > {{vaccine.vaccine }}</option>
                </b-form-select>  

  <b-form-input v-model="vaccineUpdate.date_first"
         placeholder="Tarikh" type="date"         
        >
  </b-form-input>
    <b-form-input v-model="vaccineUpdate.date_second"
         placeholder="Tarikh" type="date"         
        >
  </b-form-input>
           
          </b-input-group>
        </b-form-group>     

</b-col> <b-input-group-append>
              <b-button type="submit" variant="outline-primary">Kemaskini</b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
               
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
       methods:{
         cases(){
      
        axios.get('/api/WardAdmissionRecord/'+this.$route.query.id + '?token='+ localStorage.getItem('token'))
        .then(({data}) => (this.patient = data[0],
        this.form = data[0], this.bed_discipline.discipline = data[0].discipline, this.bedUpdate.discipline = data[0].discipline_id, 
        this.bedUpdate.current_bed_code = data[0].bed_code,
        this.bedUpdate.time_bed = data[0].time_bed,
         this.bedUpdate.date_bed = data[0].date_bed,
         this.bedUpdate.status = data[0].status,
         this.wardUpdate.discipline_id = data[0].discipline_id, 
        this.bedUpdate.BDid = data[0].BDid,
        this.bedUpdate.ward = data[0].Wardid,
        this.diagnosisUpdate.diagnosis = data[0].diagnosis,
         this.diagnosisUpdate.stage = data[0].stage,
         this.vaccineUpdate =data[0],
         this.wardUpdate.ward =data[0].ward
        ))
      },
        


             getward(){
    let self = this;
     axios.get('/api/ward/'+'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.wards = response.data;
      })
    },

    getdiscipline(){
    let self = this;
     axios.get('/api/discipline'+'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.disciplines = response.data;
      })
    },
      
                  getBed(){
 
    let self = this;
     axios.get('/api/bed/ward/'+this.$route.query.ward_id +'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.bedlist = response.data;
      })
    },   
                  getBedWard(){
    let self = this;
     axios.get('/api/bed/ward/'+this.wardUpdate.newWard +'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.beds = response.data;
      })
    },   
 //updateBed
       updateBed(){
       let $id = this.bedUpdate.BDid;
       axios.patch('/api/bed_discipline/'+$id+'?token='+ localStorage.getItem('token'), 
       {
           
      
      rn: this.form.reg_number,
      date_bed: this.bedUpdate.date_bed,
      time_bed: this.bedUpdate.time_bed,
      bed_id: this.bedUpdate.bedcode,
      discipline_id: this.bedUpdate.discipline,
      remarks: 'New',
      status: '1'
       })
       .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          })

      
    setTimeout(function(){ window.top.close();}, 3000);
     },
     
//update ward
     updateWard(){
      let $id = this.bedUpdate.BDid;
       axios.patch('/api/bed_discipline/status/'+$id+'?token='+ localStorage.getItem('token'), 
       {

      status: '0'
       }),
       axios.post('/api/bed_discipline'+'?token='+ localStorage.getItem('token'), 
       {
      
       rn: this.form.rn,
       date_bed: this.wardUpdate.date_update,       
       bed_id: this.bedUpdate.bed_id,
       discipline_id:this.wardUpdate.discipline_id,     
       time_bed: this.wardUpdate.time_update,
       remarks: 'TRANSFER OUT',
       status: '0'
       }),

       axios.post('/api/bed_discipline'+'?token='+ localStorage.getItem('token'), 
       {
      
       rn: this.form.rn,
       date_bed: this.wardUpdate.date_update,       
       bed_id: this.wardUpdate.bedcode,
       discipline_id:this.wardUpdate.newDiscipline,     
       time_bed: this.wardUpdate.time_update,
       remarks: 'TRANSFER IN',
       status: '1'
        })
       .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          })

      setTimeout(function(){ window.top.close();}, 3000);
       
     }, 

      //updateDiscipline
       updateDiscipline(){
       let $id = this.bedUpdate.BDid;
       axios.patch('/api/bed_discipline/status/'+$id+'?token='+ localStorage.getItem('token'), 
       {

      status: '0'
       }),
      axios.post('/api/bed_discipline'+'?token='+ localStorage.getItem('token'), 
       {
      
        rn: this.form.reg_number,
       date_bed: this.bed_discipline.date_update,       
       bed_id: this.form.bed_id,
       discipline_id:this.form.discipline_id,     
       time_bed: this.bed_discipline.time_update,
       remarks: 'UPDATE DISCIPLINE',
       status: '0'
       }),
     axios.post('/api/bed_discipline'+'?token='+ localStorage.getItem('token'), 
       {
      
       rn: this.form.reg_number,
       date_bed: this.bed_discipline.date_update,       
       bed_id: this.form.bed_id,
       discipline_id:this.bed_discipline.newDiscipline,     
       time_bed: this.bed_discipline.time_update,
       remarks: 'NEW DISCIPLINE',
       status: '1'
       })
       .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          }), 
      
      setTimeout(function(){ window.top.close();}, 3000);
  
  },
        //updateDiagnosis
       updateDiagnosis(){
       let $id = this.form.Did;
       axios.patch('/api/diagnosis/status/'+$id+'?token='+ localStorage.getItem('token'), 
       {

      status: '0'
       }),
      axios.post('/api/diagnosis'+'?token='+ localStorage.getItem('token'), 
       {
      
       patient_reg_number: this.form.reg_number,
       diagnosis: this.diagnosisUpdate.newDiagnosis,       
       stage: this.diagnosisUpdate.newStage,
       date_diagnosis: this.diagnosisUpdate.date_update,       
       remarks: 'UPDATE DIAGNOSIS',
       status: '1'
       })
       .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          }), 
      
       setTimeout(function(){ window.top.close();}, 3000);
  
  },

          //updateVaccination
       updateVaccination(){
       let $id = this.form.vaccinations_status_id;
       axios.patch('/api/vaccinestatus/'+$id+'?token='+ localStorage.getItem('token'), 
       {

      
       patient_kp_passport: this.form.kp_passport,
       vaccine: this.vaccineUpdate.vaccine,       
       date_first: this.vaccineUpdate.date_first,
       date_second: this.vaccineUpdate.date_second,       
       remarks: '', 
       })
       .then(() => {       
                  Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    ) 
       }).catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data! Nothing has been updated.'
            });
          }), 
      
       setTimeout(function(){ window.top.close();}, 3000);
  
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
    },
  

   
   
      
     data(){
      return{disciplines:[],
             wards:[],
             patient:[],
          vaccines:[],
          beds:[],
          bedlist:[],

          form:{
          name:null,
          kp_passport: null,
          reg_number: null,
          date_bed: null,
          bed_id: null,
          time_bed: null,
          remarks: null,
          status: null,
          discipline_id: null,
          Did: null,
          },

         diagnosisUpdate:{
          diagnosis: null,
          stage: null,
          newDiagnosis: null,
          newStage: null,
          date_update: null,
         },

          bed_discipline:{
          discipline: null,
          newDiscipline: null,        
          bed_code: null,        
          bed_id: null, 
          discipline_id: null,
          date_update: null,
          time_update: null,
          },

          bedUpdate:{
            ward: null,
            BDid: null,
            bed_discipline: null,
            current_bed_code: null,
            bedcode: null,
            ward: null,
            date_update: null,
            time_bed: null,
            status: null,
          },
           wardUpdate:{
            bedcode: null,
            ward: null,
            newWard:null,
            date_update: null,
            newDiscipline: null,
            time_update:null,
            discipline_id: null,
          },
          vaccineUpdate:{
            vaccine_status_id: null,
          vaccine: null,
          date_first:null,
          date_second: null,
        
          },
        errors:{},     
        
        itemize: [
          {
            text: 'Pesakit Dalam',
            href: 'inpatientactive'
          },
        
          {
            text: 'Admission',
            active: true
          },
        ],
      
      }
 


    },
    mounted: function(){
        this.cases();
         this.getward();
         this.getdiscipline();
         this.vaccine();
        
         this.getBed();
    }, 
   


  }
  
</script>


<style type="text/css">

</style>