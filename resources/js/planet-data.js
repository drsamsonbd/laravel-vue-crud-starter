

import * as axios from 'axios';

const admissionTotal =[];
const admissionDates = [];

axios.get('/api/admissionChart/').then(resp => {
 admissionDates = data.date;
 admissionTotal = data.count;
  printTheChart(resp.data)
})
.catch(err => console.log("Error while getting the data: ", err));



const admissionData = {
  label: 'Admission',
  data: admissionTotal,
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderColor: 'rgba(0, 99, 132, 1)',
  yAxisID: "y-axis-density"
};
 
const dischargeData = {
  label: 'Discharge',
  data: [],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderColor: 'rgba(99, 132, 0, 1)',
  yAxisID: "y-axis-gravity"
};
 
const planetData = {
  labels: admissionDates,
  datasets: [admissionData, dischargeData]
};
 
const chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }

};
 


export const planetChartData = {
  type: 'bar',
  data: planetData,
  options: chartOptions
};
  export default planetChartData;