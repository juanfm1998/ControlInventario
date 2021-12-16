new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2020-01', value: 20 , value2: 15},
    { year: '2020-02', value: 10 , value2: 15},
    { year: '2020-03', value: 5 , value2: 15},
    { year: '2020-04', value: 5 , value2: 15},
    { year: '2020-05', value: 20 , value2: 15},
    { year: '2020-06', value: 20 , value2: 15},
    { year: '2020-07', value: 60 , value2: 15},
    { year: '2020-08', value: 70 , value2: 15},
    { year: '2020-09', value: 20 , value2: 15},
    { year: '2020-10', value: 10 , value2: 15},
    { year: '2020-11', value: 20 , value2: 15},
    { year: '2020-12', value: 5 , value2: 15}
    
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value', 'value2'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value'],
  resize: true
});