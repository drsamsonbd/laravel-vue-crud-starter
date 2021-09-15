<template>
  <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
  <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian Pesakit Dalam</h6>
                </div>

    <div class="container-fluid">

    <b-row>
     <b-col cols="12">
    <label >Ketua Jururawat Bertugas :</label>  <span>  {{form.name_kj}} </span>             
  <input type="text" class="form-control" id="mo" v-model="form.name_kj" disabled hidden>
  </b-col>
 </b-row> 
      <b-form inline>
           <label class="mr-sm-2" for="inline-form-custom-select-pref">Tarikh</label>
    <b-form-input
      id="inline-form-input-name"
      class="mb-4 mr-sm-2 mb-sm-0"
      type="date"
      v-model="datereporting"
    ></b-form-input>


    <label class="mr-sm-3" for="inline-form-custom-select-pref">Syif</label>
    <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0"
      v-model="form.shift"
    >   <option value="Pagi">Pagi</option>
                          <option value="Petang">Petang</option>
                          <option value="Malam">Malam</option></b-form-select>
        
    <b-button variant="primary" @click="report()">Generate Cencus</b-button>
  </b-form>
           

       <br>  <hr>
   <h6><b>CENCUS NON-COVID</b></h6>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.male">

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.female" >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="form.paeds_male">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="form.paeds_female">
       
    </div> 
      </div>
<hr>
         
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Lelaki </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" v-model="form.ward_male">      
    </div>

       <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Perempuan</b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="children" v-model="form.ward_female">      
    </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Bersalin </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="maternity" v-model="form.maternity">
        </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="tb" v-model="form.tb">      
    </div>
   </div>
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Covid </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="covid" v-model="form.covid">
                         <small class="text-danger" v-if="errors.covid">{{errors.covid[0]}}</small>
      
    </div>
     </div>               
       <hr>
   
<!--Admission-->
    <h6><b>Bilangan Kemasukan Baru</b></h6>
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Non Covid</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="newadm" v-model="form.new_admn">
                         <small class="text-danger" v-if="errors.new_adm">{{errors.new_adm[0]}}</small>
    </div>

         <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 1</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.newstage_1">
                         <small class="text-danger" v-if="errors.newstage_1">{{errors.newstage_1[0]}}</small>
    </div>

        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 2</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns2" v-model="form.newstage_2">
                         <small class="text-danger" v-if="errors.newstage_2">{{errors.newstage_2[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 3</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns3" v-model="form.newstage_3">
                         <small class="text-danger" v-if="errors.newstage_3">{{errors.newstage_3[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 4</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns4" v-model="form.newstage_4">
                         <small class="text-danger" v-if="errors.newstage_4">{{errors.newstage_4[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 5</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns5" v-model="form.newstage_5">
                         <small class="text-danger" v-if="errors.newstage_5">{{errors.newstage_5[0]}}</small>
    </div>


      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>PUI</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="puinew" v-model="form.pui_new">
                         <small class="text-danger" v-if="errors.pui_new">{{errors.pui_new[0]}}</small>
    </div>

    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Pending Admission</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.pending">
                         <small class="text-danger" v-if="errors.pending">{{errors.pending[0]}}</small>
    </div>
  </div>


  <!--Discharged--> <hr>
 <h6><b>Discaj</b></h6>
 <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Non Covid </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="discharged" v-model="form.discharged">
      
                         <small class="text-danger" v-if="errors.discharged">{{errors.discharged[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>PUI</b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="puidc" v-model="form.pui_discharged" >
      
                         <small class="text-danger" v-if="errors.pui_discharged">{{errors.pui_discharged[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>COVID-19 </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="form.covid_discharged">
                         <small class="text-danger" v-if="errors.covid_discharged">{{errors.covid_discharged[0]}}</small>
      
    </div>

            <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>COVID-19 Death </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="form.covid_death">
                         <small class="text-danger" v-if="errors.covid_death">{{errors.covid_death[0]}}</small>
      
    </div>

            <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>PUI Death</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="form.pui_death">
                         <small class="text-danger" v-if="errors.pui_death">{{errors.pui_death[0]}}</small>
      
    </div>

  </div> 
    
<!-- COVID--> <hr>
      <h6><b>Pesakit COVID</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.covid_adult_male">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.covid_adult_female" >
          </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="form.covid_paeds_male">
                  
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="form.covid_paeds_female">
        
    </div>

  </div> 
                             <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Local </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.covid_local">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Non-local </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.covid_non_local" >
      
    </div>
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Step Up </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.covid_step_up" >
      
                         <small class="text-danger" v-if="errors.covid_step_up">{{errors.covid_step_up[0]}}</small>
    </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Step Down </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.covid_step_down" >
      
                         <small class="text-danger" v-if="errors.covid_step_down">{{errors.covid_step_down[0]}}</small>
    </div>
</div>

<!-- PUI--> <hr>
      <h6><b>Pesakit PUI</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.pui_adult_male">
      
                         <small class="text-danger" v-if="errors.pui_adult_male">{{errors.pui_adult_male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.pui_adult_female" >
      
                         <small class="text-danger" v-if="errors.pui_adult_female">{{errors.pui_adult_female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="form.pui_paeds_male">
                         <small class="text-danger" v-if="errors.pui_paeds_male">{{errors.pui_paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="form.pui_paeds_female">
                         <small class="text-danger" v-if="errors.pui_paeds_female">{{errors.pui_paeds_female[0]}}</small>
      
    </div>
  </div> 

<!--Oxygen-->
<hr>
    <h6><b>Penggunaan Oksigen</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Concentrator </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.o2_conc">
                         <small class="text-danger" v-if="errors.o2_conc">{{errors.o2_conc[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Oxygen Concentrator Occupied </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.o2_conc_occupied">
                         <small class="text-danger" v-if="errors.o2_conc_occupied">{{errors.o2_conc_occupied[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Cylinder </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder">
                         <small class="text-danger" v-if="errors.o2_cylinder">{{errors.o2_cylinder[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Oxygen Cylinder Occupied</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder_occupied">
                         <small class="text-danger" v-if="errors.o2_cylinder_occupied">{{errors.o2_cylinder_occupied[0]}}</small>
    </div>
  </div> 
  <hr>
                <div class="form-group">
    <label for="colFormLabelSm" > <code>*</code> <b>Staf Bertugas </b> </label>
 
      <textarea type="text" class="form-control "  id="staff" v-model="form.staff"></textarea>
      
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>

   

  </div> 
  <hr>
    <!--Staging-->
                            <h6><b>Covid Patient Staging</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.stage_1">
                         <small class="text-danger" v-if="errors.stage_1">{{errors.stage_1[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b> Stage 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s2" v-model="form.stage_2">
                         <small class="text-danger" v-if="errors.stage_2">{{errors.stage_2[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s3" v-model="form.stage_3">
                         <small class="text-danger" v-if="errors.stage_3">{{errors.stage_3[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 4</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s4" v-model="form.stage_4">
                         <small class="text-danger" v-if="errors.stage_4">{{errors.stage_4[0]}}</small>
    </div>
      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 5</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s5" v-model="form.stage_5">
                         <small class="text-danger" v-if="errors.stage_5">{{errors.stage_5[0]}}</small>
    </div>
  </div>
  
<hr>

        

<!--Vaccination-->
 <hr>
  <h6><b><u>Bilangan Pesakit Menerima Vaksin </u></b></h6>
                     <h6> Pesakit Stage 1</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs11" v-model="form.stage_1_1">
                         <small class="text-danger" v-if="errors.stage_1_1">{{errors.stage_1_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs12" v-model="form.stage_1_2">
                         <small class="text-danger" v-if="errors.stage_1_2">{{errors.stage_1_2[0]}}</small>
    </div>
       
  </div>        

              <h6> Pesakit Stage 2</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs21" v-model="form.stage_2_1">
                         <small class="text-danger" v-if="errors.stage_2_1">{{errors.stage_2_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>

   
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs22" v-model="form.stage_2_2">
                         <small class="text-danger" v-if="errors.stage_2_2">{{errors.stage_2_2[0]}}</small>
    </div>
       
  </div>        
                    <h6> Pesakit Stage 3</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs31" v-model="form.stage_3_1">
                         <small class="text-danger" v-if="errors.stage_3_1">{{errors.stage_3_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs32" v-model="form.stage_3_2">
                         <small class="text-danger" v-if="errors.stage_3_2">{{errors.stage_3_2[0]}}</small>
    </div>
       
  </div>    
   <h6> Pesakit Stage 4</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs41" v-model="form.stage_4_1">
                         <small class="text-danger" v-if="errors.stage_4_1">{{errors.stage_4_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs42" v-model="form.stage_4_2">
                         <small class="text-danger" v-if="errors.stage_4_2">{{errors.stage_4_2[0]}}</small>
    </div>
       
  </div>   
  <h6> Pesakit Stage 5</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs51" v-model="form.stage_5_1">
                         <small class="text-danger" v-if="errors.stage_5_1">{{errors.stage_5_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs52" v-model="form.stage_5_2">
                         <small class="text-danger" v-if="errors.stage_5_2">{{errors.stage_5_2[0]}}</small>
    </div>
       
  </div>   
  <hr>
                      
      
                    <div class="form-group">
                      <label> <code>*</code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Hantar</button>
                    </div>
                    <hr>
         
  </div>
              
         

               
          </div>


              </div>
            </div>
          </div>
            </div>  

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
      },
     mounted(){
       this.pkrclist();
        this.user();


     },
     data(){
      return{
      
          pkrcs:[],
          selectedpkrc: null,
          datereporting: null,       
     
        form:{
          name_kj:null,
          date: null, 
          time: null, 
          pkrc: null, 
          male: null, 
          female: null, 
          paeds_male: null, 
          paeds_female: null, 
          new_admission: null, 
          step_up: null, 
          discharged: null, 
          home_q: null, 
          carer: null, 
          local: null, 
          non_local: null, 
          bor: null, 
          stage_1: null, 
          stage_2: null, 
          stage_3: null, 
          stage_4: null, 
          stage_5: null, 
          stage_1_1: null, 
          stage_1_2: null, 
          stage_2_1: null, 
          stage_2_2: null, 
          stage_3_1: null, 
          stage_3_2: null, 
          stage_4_1: null, 
          stage_4_2: null, 
          stage_5_1: null, 
          stage_5_2: null, 
          staff: null, 
          pui_adult_male: null, 
          pui_adult_female: null, 
          pui_paeds_male: null, 
          pui_paeds_female: null, 
          pui_new: null, 
          pui_discharged: null, 
          pui_step_up: null, 
          notes: null, 
        },
        errors:'',
        itemize: [
          {
            text: 'Laporan',
            href: '#'
          },
          
          {
            text: 'Pesakit Dalam',
            active: true
          },
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
      },

    },
 
  methods:{
       pkrclist(){
    let self = this;
     axios.get('/api/pkrc/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.pkrcs = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
     user(){
      let loggeduser = localStorage.getItem('user')
      this.form.name_kj = loggeduser;
    }, 
    report(){
    let self = this;
     axios.get('/api/CovidFemale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.female  = response.data[0].count;
      }),
        axios.get('/api/CovidMale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.male  = response.data[0].count;
      }),
        axios.get('/api/CovidMalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.paeds_male  = response.data[0].count;
      })
     ,
        axios.get('/api/CovidFemalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.paeds_female  = response.data[0].count;
      })
        ,
        axios.get('/api/stageOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_1  = response.data[0].count;
      })    ,
        axios.get('/api/stageTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_2  = response.data[0].count;
      })    ,
        axios.get('/api/stageThree/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_3  = response.data[0].count;
      })    ,
        axios.get('/api/stageFour/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_4  = response.data[0].count;
      })    ,
        axios.get('/api/stageFive/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_5  = response.data[0].count;
      })
       ,
        axios.get('/api/newAdmission/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.new_admission  = response.data[0].count;
      }),
        axios.get('/api/stepUp/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.step_up  = response.data[0].count;
      }),
            axios.get('/api/statDischarges/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.discharged  = response.data[0].count;
      }) ,           axios.get('/api/HQ/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.home_q  = response.data[0].count;
      })
       ,           axios.get('/api/WN/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.local  = response.data[0].count;
      })
      ,           axios.get('/api/BWN/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.non_local = response.data[0].count;
      })
       ,           axios.get('/api/stageOneVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_1_1 = response.data[0].count;
      })
         ,           axios.get('/api/stageOneVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_1_2 = response.data[0].count;
      })   ,           axios.get('/api/stageTwoVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_2_1 = response.data[0].count;
      }) ,           axios.get('/api/stageTwoVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_2_2 = response.data[0].count;
     }) ,           axios.get('/api/stageThreeVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_3_1 = response.data[0].count;
     })  ,           axios.get('/api/stageThreeVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_3_2 = response.data[0].count;
     }) ,           axios.get('/api/stageFourVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_4_1 = response.data[0].count;
     })   ,           axios.get('/api/stageFourVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_4_2 = response.data[0].count;
     })  ,           axios.get('/api/PUIMale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_adult_male = response.data[0].count;
     })  ,           axios.get('/api/PUIFemale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_adult_female = response.data[0].count;
     })  ,           axios.get('/api/PUIMalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_paeds_male = response.data[0].count;
     }) 
      ,           axios.get('/api/PUIFemalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_paeds_female = response.data[0].count;
     })   ,           axios.get('/api/newAdmissionPUI/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_new = response.data[0].count;
     })    ,           axios.get('/api/statDischargesPUI/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_discharged = response.data[0].count;
     }) ,           axios.get('/api/stepUpPUI/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_step_up = response.data[0].count;
     }) ,           axios.get('/api/BOR/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.bor = response.data;
     }) 
    }
  }
 
  }   
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>