  

<template>
  <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <b-modal ref="my-modal" size="xl" hide-footer title="Laporan Kejururawatan">
    
           <form class="user" @submit.prevent="register">
                  
                      <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="form.date">
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Syif</label>
                      <select id="shift" class="form-control" v-model="form.shift">
                          <option value="Pagi">Pagi</option>
                          <option value="Petang">Petang</option>
                          <option value="Malam">Malam</option>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                      </select>
                     </b-col>

                         <b-col>
                        <label >Ketua Jururawat Bertugas</label>                        
                      <input type="text" class="form-control" id="mo" v-model="form.name_kj" disabled>
                      </b-col>
                     </b-row>
                           <br>  <hr>
                            <h6><b>Bilangan Pesakit</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Wad Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.male">
      
                         <small class="text-danger" v-if="errors.male">{{errors.male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.female" >
      
                         <small class="text-danger" v-if="errors.female">{{errors.female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="form.paeds_male">
                         <small class="text-danger" v-if="errors.paeds_male">{{errors.paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="form.paeds_female">
                         <small class="text-danger" v-if="errors.paeds_female">{{errors.paeds_female[0]}}</small>
      
    </div>
      </div>

         
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Jumlah Wad Kanak-kanak </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="children" v-model="form.children">
                         <small class="text-danger" v-if="errors.children">{{errors.children[0]}}</small>
      
    </div>

      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Bersalin </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="maternity" v-model="form.maternity">
                         <small class="text-danger" v-if="errors.maternity">{{errors.maternity[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="tb" v-model="form.tb">
                         <small class="text-danger" v-if="errors.tb">{{errors.tb[0]}}</small>
      
    </div>

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
 
      <textarea type="text" class="form-control "  id="staff" v-model="forms.staff"></textarea>
      
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
                 
                  </form>            
               
          
</b-modal>
 <!------------------------------------------------------------------Update Modal-------------------------------------------> 

     <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Laporan Kejururawatan">
    
           <form class="user" @submit.prevent="patientUpdate">
              <div class="form-group" hidden>
                      <label>ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                  
                      <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="forms.date">
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Syif</label>
                      <select id="shift" class="form-control" v-model="forms.shift">
                          <option value="Pagi">Pagi</option>
                          <option value="Petang">Petang</option>
                          <option value="Malam">Malam</option>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                      </select>
                     </b-col>

                         <b-col>
                        <label >Ketua Jururawat Bertugas</label>                        
                      <input type="text" class="form-control" id="mo" v-model="forms.name_kj" disabled>
                      </b-col>
                     </b-row>
                           <br>  <hr>
                            <h6><b>Bilangan Pesakit</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Wad Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.male">
      
                         <small class="text-danger" v-if="errors.male">{{errors.male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.female" >
      
                         <small class="text-danger" v-if="errors.female">{{errors.female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="forms.paeds_male">
                         <small class="text-danger" v-if="errors.paeds_male">{{errors.paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="forms.paeds_female">
                         <small class="text-danger" v-if="errors.paeds_female">{{errors.paeds_female[0]}}</small>
      
    </div>
      </div>

         
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Jumlah Wad Kanak-kanak </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="children" v-model="forms.children">
                         <small class="text-danger" v-if="errors.children">{{errors.children[0]}}</small>
      
    </div>

      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Bersalin </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="maternity" v-model="forms.maternity">
                         <small class="text-danger" v-if="errors.maternity">{{errors.maternity[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="tb" v-model="forms.tb">
                         <small class="text-danger" v-if="errors.tb">{{errors.tb[0]}}</small>
      
    </div>

<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Covid </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="covid" v-model="forms.covid">
                         <small class="text-danger" v-if="errors.covid">{{errors.covid[0]}}</small>
      
    </div>
     </div>               
       <hr>
   
<!--Admission-->
    <h6><b>Bilangan Kemasukan Baru</b></h6>
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Non Covid</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="newadm" v-model="forms.new_admn">
                         <small class="text-danger" v-if="errors.new_adm">{{errors.new_adm[0]}}</small>
    </div>

         <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 1</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.newstage_1">
                         <small class="text-danger" v-if="errors.newstage_1">{{errors.newstage_1[0]}}</small>
    </div>

        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 2</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns2" v-model="forms.newstage_2">
                         <small class="text-danger" v-if="errors.newstage_2">{{errors.newstage_2[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 3</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns3" v-model="forms.newstage_3">
                         <small class="text-danger" v-if="errors.newstage_3">{{errors.newstage_3[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 4</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns4" v-model="forms.newstage_4">
                         <small class="text-danger" v-if="errors.newstage_4">{{errors.newstage_4[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 5</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns5" v-model="forms.newstage_5">
                         <small class="text-danger" v-if="errors.newstage_5">{{errors.newstage_5[0]}}</small>
    </div>

      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>PUI</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="puinew" v-model="forms.pui_new">
                         <small class="text-danger" v-if="errors.pui_new">{{errors.pui_new[0]}}</small>
    </div>

    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Pending Admission</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.pending">
                         <small class="text-danger" v-if="errors.pending">{{errors.pending[0]}}</small>
    </div>
  </div>
  <!--Discharged--> <hr>
 <h6><b>Discaj</b></h6>
 <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Non Covid </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="discharged" v-model="forms.discharged">
      
                         <small class="text-danger" v-if="errors.discharged">{{errors.discharged[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>PUI</b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="puidc" v-model="forms.pui_discharged" >
      
                         <small class="text-danger" v-if="errors.pui_discharged">{{errors.pui_discharged[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>COVID-19 </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="forms.covid_discharged">
                         <small class="text-danger" v-if="errors.covid_discharged">{{errors.covid_discharged[0]}}</small>
      
    </div>

            <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>COVID-19 Death </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="forms.covid_death">
                         <small class="text-danger" v-if="errors.covid_death">{{errors.covid_death[0]}}</small>
      
    </div>

            <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>PUI Death</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="forms.pui_death">
                         <small class="text-danger" v-if="errors.pui_death">{{errors.pui_death[0]}}</small>
      
    </div>

  </div> 

    
<!-- COVID--> <hr>
      <h6><b>Pesakit COVID</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.covid_adult_male">
      
                         <small class="text-danger" v-if="errors.covid_adult_male">{{errors.covid_adult_male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.covid_adult_female" >
      
                         <small class="text-danger" v-if="errors.covid_adult_female">{{errors.covid_adult_female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="forms.covid_paeds_male">
                         <small class="text-danger" v-if="errors.covid_paeds_male">{{errors.covid_paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="forms.covid_paeds_female">
                         <small class="text-danger" v-if="errors.covid_paeds_female">{{errors.covid_paeds_female[0]}}</small>
      
    </div>

  </div> 
                             <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Local </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.covid_local">
      
                         <small class="text-danger" v-if="errors.covid_local">{{errors.covid_local[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Non-local </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.covid_non_local" >
      
                         <small class="text-danger" v-if="errors.covid_non_local">{{errors.covid_non_local[0]}}</small>
    </div>
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Step Up </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.covid_step_up" >
      
                         <small class="text-danger" v-if="errors.covid_step_up">{{errors.covid_step_up[0]}}</small>
    </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Step Down </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.covid_step_down"  >
      
                         <small class="text-danger" v-if="errors.covid_step_down">{{errors.covid_step_down[0]}}</small>
    </div>

</div>


<!-- PUI--> <hr>
      <h6><b>Pesakit PUI</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.pui_adult_male">
      
                         <small class="text-danger" v-if="errors.pui_adult_male">{{errors.pui_adult_male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.pui_adult_female" >
      
                         <small class="text-danger" v-if="errors.pui_adult_female">{{errors.pui_adult_female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="forms.pui_paeds_male">
                         <small class="text-danger" v-if="errors.pui_paeds_male">{{errors.pui_paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="forms.pui_paeds_female">
                         <small class="text-danger" v-if="errors.pui_paeds_female">{{errors.pui_paeds_female[0]}}</small>
      
    </div>
  </div> 

<!--Oxygen-->
<hr>
    <h6><b>Penggunaan Oksigen</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Concentrator </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.o2_conc">
                         <small class="text-danger" v-if="errors.o2_conc">{{errors.o2_conc[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Oxygen Concentrator Occupied </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.o2_conc_occupied">
                         <small class="text-danger" v-if="errors.o2_conc_occupied">{{errors.o2_conc_occupied[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Cylinder </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.o2_cylinder">
                         <small class="text-danger" v-if="errors.o2_cylinder">{{errors.o2_cylinder[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Oxygen Cylinder Occupied</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.o2_cylinder_occupied">
                         <small class="text-danger" v-if="errors.o2_cylinder_occupied">{{errors.o2_cylinder_occupied[0]}}</small>
    </div>
  </div> 
  <hr>
                <div class="form-group">
    <label for="colFormLabelSm" > <code>*</code> <b>Staf Bertugas </b> </label>
 
      <textarea type="text" class="form-control "  id="staff" v-model="forms.staff"></textarea>
      
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>

   

  </div> 
  <hr>
    <!--Staging-->
                            <h6><b>Covid Patient Staging</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_1">
                         <small class="text-danger" v-if="errors.stage_1">{{errors.stage_1[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b> Stage 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s2" v-model="forms.stage_2">
                         <small class="text-danger" v-if="errors.stage_2">{{errors.stage_2[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s3" v-model="forms.stage_3">
                         <small class="text-danger" v-if="errors.stage_3">{{errors.stage_3[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 4</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s4" v-model="forms.stage_4">
                         <small class="text-danger" v-if="errors.stage_4">{{errors.stage_4[0]}}</small>
    </div>
      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 5</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s5" v-model="forms.stage_5">
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
   <input type="number" class="form-control form-control-sm" id="vs11" v-model="forms.stage_1_1">
                         <small class="text-danger" v-if="errors.stage_1_1">{{errors.stage_1_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs12" v-model="forms.stage_1_2">
                         <small class="text-danger" v-if="errors.stage_1_2">{{errors.stage_1_2[0]}}</small>
    </div>
       
  </div>        

              <h6> Pesakit Stage 2</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs21" v-model="forms.stage_2_1">
                         <small class="text-danger" v-if="errors.stage_2_1">{{errors.stage_2_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>

   
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs22" v-model="forms.stage_2_2">
                         <small class="text-danger" v-if="errors.stage_2_2">{{errors.stage_2_2[0]}}</small>
    </div>
       
  </div>        
                    <h6> Pesakit Stage 3</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs31" v-model="forms.stage_3_1">
                         <small class="text-danger" v-if="errors.stage_3_1">{{errors.stage_3_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs32" v-model="forms.stage_3_2">
                         <small class="text-danger" v-if="errors.stage_3_2">{{errors.stage_3_2[0]}}</small>
    </div>
       
  </div>    
   <h6> Pesakit Stage 4</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs41" v-model="forms.stage_4_1">
                         <small class="text-danger" v-if="errors.stage_4_1">{{errors.stage_4_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs42" v-model="forms.stage_4_2">
                         <small class="text-danger" v-if="errors.stage_4_2">{{errors.stage_4_2[0]}}</small>
    </div>
       
  </div>   
  <h6> Pesakit Stage 5</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs51" v-model="forms.stage_5_1">
                         <small class="text-danger" v-if="errors.stage_5_1">{{errors.stage_5_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs52" v-model="forms.stage_5_2">
                         <small class="text-danger" v-if="errors.stage_5_2">{{errors.stage_5_2[0]}}</small>
    </div>
       
  </div>   
  <hr>
                      
      
                    <div class="form-group">
                      <label> <code>*</code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="forms.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Kemaskini</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
</b-modal>
 <!------------


  <!--userUpdate Modal-->
  <div>
  <b-modal ref="view-modal" size="xl" hide-footer title="Laporan Harian Kejururawatan">     
          <form> 
                    <div class="form-group" hidden>
                      <label>ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                 
                                    <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="views.date" disabled>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Syif</label>
                      <select id="shift" class="form-control" v-model="views.shift" disabled>
                          <option value="Pagi">Pagi</option>
                          <option value="Petang">Petang</option>
                          <option value="Malam">Malam</option>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                      </select>
                     </b-col>

                         <b-col>
                        <label >Ketua Jururawat Bertugas</label>                        
                      <input type="text" class="form-control" id="mo" v-model="views.name_kj" disabled>
                      </b-col>
                     </b-row>
                           <br>  <hr>
                            <h6><b>Bilangan Pesakit</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Wad Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="views.male" disabled>
      
                         <small class="text-danger" v-if="errors.male">{{errors.male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="views.female"disabled >
      
                         <small class="text-danger" v-if="errors.female">{{errors.female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="views.paeds_male" disabled>
                         <small class="text-danger" v-if="errors.paeds_male">{{errors.paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="views.paeds_female" disabled>
                         <small class="text-danger" v-if="errors.paeds_female">{{errors.paeds_female[0]}}</small>
      
    </div>
      </div>

         
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Jumlah Wad Kanak-kanak </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="children" v-model="views.children" disabled>
                         <small class="text-danger" v-if="errors.children">{{errors.children[0]}}</small>
      
    </div>

      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Bersalin </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="maternity" v-model="views.maternity" disabled >
                         <small class="text-danger" v-if="errors.maternity">{{errors.maternity[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="tb" v-model="views.tb" disabled>
                         <small class="text-danger" v-if="errors.tb">{{errors.tb[0]}}</small>
      
    </div>

<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Covid </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="covid" v-model="views.covid" disabled>
                         <small class="text-danger" v-if="errors.covid">{{errors.covid[0]}}</small>
      
    </div>
     </div>               
       <hr>
   
<!--Admission-->
    <h6><b>Bilangan Kemasukan Baru</b></h6>
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Non Covid</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="newadm" v-model="views.new_admn" disabled>
                         <small class="text-danger" v-if="errors.new_adm">{{errors.new_adm[0]}}</small>
    </div>

         <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 1</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.newstage_1" disabled>
                         <small class="text-danger" v-if="errors.newstage_1">{{errors.newstage_1[0]}}</small>
    </div>

        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 2</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns2" v-model="views.newstage_2" disabled>
                         <small class="text-danger" v-if="errors.newstage_2">{{errors.newstage_2[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 3</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns3" v-model="views.newstage_3" disabled>
                         <small class="text-danger" v-if="errors.newstage_3">{{errors.newstage_3[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 4</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns4" v-model="views.newstage_4" disabled>
                         <small class="text-danger" v-if="errors.newstage_4">{{errors.newstage_4[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Covid Stage 5</b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="ns5" v-model="views.newstage_5" disabled>
                         <small class="text-danger" v-if="errors.newstage_5">{{errors.newstage_5[0]}}</small>
    </div>

      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>PUI</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="puinew" v-model="views.pui_new" disabled>
                         <small class="text-danger" v-if="errors.pui_new">{{errors.pui_new[0]}}</small>
    </div>

    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Pending Admission</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.pending" disabled>
                         <small class="text-danger" v-if="errors.pending">{{errors.pending[0]}}</small>
    </div>
  </div>
  <!--Discharged--> <hr>
 <h6><b>Discaj</b></h6>
 <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Non Covid </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="discharged" v-model="views.discharged" disabled>
      
                         <small class="text-danger" v-if="errors.discharged">{{errors.discharged[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>PUI</b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="puidc" v-model="views.pui_discharged" disabled>
      
                         <small class="text-danger" v-if="errors.pui_discharged">{{errors.pui_discharged[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>COVID-19 </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="views.covid_discharged" disabled>
                         <small class="text-danger" v-if="errors.covid_discharged">{{errors.covid_discharged[0]}}</small>
      
    </div>

            <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>COVID-19 Death </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="views.covid_death" disabled>
                         <small class="text-danger" v-if="errors.covid_death">{{errors.covid_death[0]}}</small>
      
    </div>

            <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>PUI Death</b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="coviddc" v-model="views.pui_death" disabled>
                         <small class="text-danger" v-if="errors.pui_death">{{errors.pui_death[0]}}</small>
      
    </div>

  </div> 

  
<!-- COVID--> <hr>
      <h6><b>Pesakit COVID</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="views.covid_adult_male" disabled>
      
                         <small class="text-danger" v-if="errors.covid_adult_male">{{errors.covid_adult_male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="views.covid_adult_female" disabled>
      
                         <small class="text-danger" v-if="errors.covid_adult_female">{{errors.covid_adult_female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="views.covid_paeds_male" disabled>
                         <small class="text-danger" v-if="errors.covid_paeds_male">{{errors.covid_paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="views.covid_paeds_female" disabled>
                         <small class="text-danger" v-if="errors.covid_paeds_female">{{errors.covid_paeds_female[0]}}</small>
      
    </div>

  </div> 
                             <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Local </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="views.covid_local" disabled>
      
                         <small class="text-danger" v-if="errors.covid_local">{{errors.covid_local[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Non-local </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="views.covid_non_local" disabled>
      
                         <small class="text-danger" v-if="errors.covid_non_local">{{errors.covid_non_local[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Step Up </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="views.covid_step_up" disabled>
      
                         <small class="text-danger" v-if="errors.covid_step_up">{{errors.covid_step_up[0]}}</small>
    </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Step Down </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="views.covid_step_down" disabled>
      
                         <small class="text-danger" v-if="errors.covid_step_down">{{errors.covid_step_down[0]}}</small>
    </div>

</div>

<!-- PUI--> <hr>
      <h6><b>Pesakit PUI</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="views.pui_adult_male" disabled>
      
                         <small class="text-danger" v-if="errors.pui_adult_male">{{errors.pui_adult_male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="views.pui_adult_female" disabled>
      
                         <small class="text-danger" v-if="errors.pui_adult_female">{{errors.pui_adult_female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="views.pui_paeds_male" disabled>
                         <small class="text-danger" v-if="errors.pui_paeds_male">{{errors.pui_paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="views.pui_paeds_female" disabled>
                         <small class="text-danger" v-if="errors.pui_paeds_female">{{errors.pui_paeds_female[0]}}</small>
      
    </div>
  </div> 

<!--Oxygen-->
<hr>
    <h6><b>Penggunaan Oksigen</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Concentrator </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.o2_conc" disabled>
                         <small class="text-danger" v-if="errors.o2_conc">{{errors.o2_conc[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Oxygen Concentrator Occupied </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.o2_conc_occupied" disabled>
                         <small class="text-danger" v-if="errors.o2_conc_occupied">{{errors.o2_conc_occupied[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Cylinder </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.o2_cylinder" disabled>
                         <small class="text-danger" v-if="errors.o2_cylinder">{{errors.o2_cylinder[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Oxygen Cylinder Occupied</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.o2_cylinder_occupied" disabled>
                         <small class="text-danger" v-if="errors.o2_cylinder_occupied">{{errors.o2_cylinder_occupied[0]}}</small>
    </div>
  </div> 
  <hr>
                <div class="form-group">
    <label for="colFormLabelSm" > <code>*</code> <b>Staf Bertugas </b> </label>
 
      <textarea type="text" class="form-control "  id="staff" v-model="views.staff"></textarea>
      
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>

   

  </div> 
  <hr>
    <!--Staging-->
                            <h6><b>Covid Patient Staging</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="views.stage_1" disabled>
                         <small class="text-danger" v-if="errors.stage_1">{{errors.stage_1[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b> Stage 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s2" v-model="views.stage_2" disabled>
                         <small class="text-danger" v-if="errors.stage_2">{{errors.stage_2[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s3" v-model="views.stage_3" disabled>
                         <small class="text-danger" v-if="errors.stage_3">{{errors.stage_3[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 4</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s4" v-model="views.stage_4" disabled>
                         <small class="text-danger" v-if="errors.stage_4">{{errors.stage_4[0]}}</small>
    </div>
      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 5</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s5" v-model="views.stage_5" disabled>
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
   <input type="number" class="form-control form-control-sm" id="vs11" v-model="views.stage_1_1" disabled>
                         <small class="text-danger" v-if="errors.stage_1_1">{{errors.stage_1_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs12" v-model="views.stage_1_2" disabled>
                         <small class="text-danger" v-if="errors.stage_1_2">{{errors.stage_1_2[0]}}</small>
    </div>
       
  </div>        

              <h6> Pesakit Stage 2</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs21" v-model="views.stage_2_1" disabled>
                         <small class="text-danger" v-if="errors.stage_2_1">{{errors.stage_2_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>

   
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs22" v-model="views.stage_2_2" disabled>
                         <small class="text-danger" v-if="errors.stage_2_2">{{errors.stage_2_2[0]}}</small>
    </div>
       
  </div>        
                    <h6> Pesakit Stage 3</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs31" v-model="views.stage_3_1" disabled>
                         <small class="text-danger" v-if="errors.stage_3_1">{{errors.stage_3_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs32" v-model="views.stage_3_2" disabled>
                         <small class="text-danger" v-if="errors.stage_3_2">{{errors.stage_3_2[0]}}</small>
    </div>
       
  </div>    
   <h6> Pesakit Stage 4</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs41" v-model="views.stage_4_1" disabled>
                         <small class="text-danger" v-if="errors.stage_4_1">{{errors.stage_4_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs42" v-model="views.stage_4_2" disabled>
                         <small class="text-danger" v-if="errors.stage_4_2">{{errors.stage_4_2[0]}}</small>
    </div>
       
  </div>   
  <h6> Pesakit Stage 5</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs51" v-model="views.stage_5_1" disabled>
                         <small class="text-danger" v-if="errors.stage_5_1">{{errors.stage_5_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="vs52" v-model="views.stage_5_2" disabled>
                         <small class="text-danger" v-if="errors.stage_5_2">{{errors.stage_5_2[0]}}</small>
    </div>
       
  </div>   
  <hr>
                      
      
                    <div class="form-group">
                      <label> <code>*</code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="views.notes" disabled></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                  
                    <hr>
                 
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
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian Kejururawatan</h6>
                </div>

 
    <b-row >
      <b-col sm="1" class="my-1" align="right">
           <b-button size="sm" variant="outline-primary" id="show-btn" @click="showModal"> <i class="fas fa-plus"></i></b-button>
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
  </section>

</template>



<script type="text/javascript">
 
  export default {
      
     mounted(){
        this.allPatient();
        this.race();
        this.area(),
        this.pkrc();
        this.user();
      },

      
     data(){
      return{
          views:[], 
          races: [],
          pkrcs:[],
          areas:[], 
          form:{
date: null,
shift: null,
name_kj: null,
acute: null,
children: null,
female: null,
maternity: null,
male: null,
tb: null,
covid: null,
o2_conc: null,
o2_conc_occupied: null,
o2_cylinder: null,
o2_cylinder_occupied: null,
bor: null,
paeds_male: null,
paeds_female: null,
new_adm: null,
newstage_1: null,
newstage_2: null,
newstage_3: null,
newstage_4: null,
newstage_5: null,
discharged: null,
covid_discharged: null,
pending: null,
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
covid_adult_male: null,
covid_adult_female: null,
covid_paeds_male: null,
covid_paeds_female: null,
covid_local: null,
covid_non_local: null,
pui_adult_male: null,
pui_adult_female: null,
pui_paeds_male: null,
pui_paeds_female: null,
pui_new: null,
pui_discharged: null,
pui_death: null,
covid_death: null,
covid_step_up: null,
covid_step_down: null,
notes: null,
          
        },
          forms:{

date: null,
shift: null,
name_kj: null,
acute: null,
children: null,
female: null,
maternity: null,
male: null,
tb: null,
covid: null,
o2_conc: null,
o2_conc_occupied: null,
o2_cylinder: null,
o2_cylinder_occupied: null,
bor: null,
paeds_male: null,
paeds_female: null,
new_adm: null,
newstage_1: null,
newstage_2: null,
newstage_3: null,
newstage_4: null,
newstage_5: null,
discharged: null,
covid_discharged: null,
pending: null,
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
covid_adult_male: null,
covid_adult_female: null,
covid_paeds_male: null,
covid_paeds_female: null,
covid_local: null,
covid_non_local: null,
pui_adult_male: null,
pui_adult_female: null,
pui_paeds_male: null,
pui_paeds_female: null,
pui_new: null,
pui_discharged: null,
pui_death: null,
covid_death: null,
covid_step_up: null,
covid_step_down: null,
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
            text: 'Laporan',
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
          { key: 'date', label: 'Tarikh', sortable: true, sortDirection: 'asc' },
       //   { key: 'time', label: 'Masa', sortable: true, sortDirection: 'desc' },
         // { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
          { key: 'male', label: 'Dewasa Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'female', label: 'Dewasa Perempuan', sortable: true, sortDirection: 'desc' },
          { key: 'children', label: 'Kanak-kanak', sortable: true, sortDirection: 'desc' },
          { key: 'maternity', label: 'Maternity', sortable: true, sortDirection: 'desc' },
         // { key: 'carer', label: 'Penjaga', sortable: true, sortDirection: 'desc' },
         // { key: 'local', label: 'Warganegara', sortable: true, sortDirection: 'desc' },
         // { key: 'non_local', label: 'BWN', sortable: true, sortDirection: 'desc' },
          { key: 'tb', label: 'TB', sortable: true, sortDirection: 'desc' },
         { key: 'covid', label: 'COVID', sortable: true, sortDirection: 'desc' },
      //  { key: 'stage_2', label: 'Stage 2', sortable: true, sortDirection: 'desc' },
      //  { key: 'staff', label: 'Staf Bertugas', sortable: true, sortDirection: 'desc' },
       // { key: 'notes', label: 'Nota', sortable: true, sortDirection: 'desc' },
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
     axios.get('/api/nursingreports/'+ '?token='+ localStorage.getItem('token'))
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
      user(){
      let loggeduser = localStorage.getItem('user')
      this.form.name_kj = loggeduser;
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
                    axios.delete('/api/nursingreports/'+id)
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
         axios.get('/api/nursingreports/'+id+ '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
    
   
       register(){
          axios.post('/api/nursingreports'+ '?token='+ localStorage.getItem('token'), this.form)
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
              title: 'Pastikan tarikh dan masa telah diisi!'
            });
              })
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/nursingreports/'+id+ '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/nursingreports/'+ '?token='+ localStorage.getItem('token'))
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

         viewModal(record) {
          let self = this;
            axios.get('/api/nursingreports/'+record.id+ '?token='+ localStorage.getItem('token'))
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