@extends('admin.layouts.main')

@section('container')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Charts
      </h2>
      <!-- CTA -->
      <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="https://github.com/estevanmaito/windmill-dashboard">
        <div class="flex items-center">
          <svg
            class="w-5 h-5 mr-2"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
            ></path>
          </svg>
          <span>Star this project on GitHub</span>
        </div>
        <span>View more &RightArrow;</span>
      </a>

      <p class="mb-8 text-gray-600 dark:text-gray-400">
        Charts are provided by
        <a
          class="text-purple-600 dark:text-purple-400 hover:underline"
          href="https://www.chartjs.org/"
        >
          Chart.js
        </a>
        . Note that the default legends are disabled and you should
        provide a description for your charts in HTML. See source code for
        examples.
      </p>

      <!-- Lines chart -->
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 my-10">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Lines
        </h4>
        <canvas id="line"></canvas>
      </div>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Doughnut/Pie chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300 relative">
            Doughnut/Pie
          </h4>
          <canvas id="pie" style="height:40vh; width:40vw"></canvas>
        </div>
        <!-- Bars chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Bars
          </h4>
          <canvas id="bars"></canvas>
        </div>
      </div>
    </div>
  </main>



    <script>
      BarChart()
        //Fetching data
        fetch('/admin/dashboard/ajax?data=types')
          .then(response => response.json())
          .then( data => 
            PieChart(data.types)
        )
        fetch('/admin/dashboard/ajax?data=timeseries')
          .then(response => response.json())
          .then( data => {
              console.log(data.timeseries)
              LineChart(data.timeseries)
          }
        )

        //Pie Chart Function
        function PieChart(types){
          //merubah penyusunan data agar bisa dikonsumsi dan dimasukkan config
          let type_data = {
            label : [],
            data  : []
          }
          types.map(function(val, index){
              type_data.label.push(val.type)
              type_data.data.push(val.count)
          })

          let colorArray = interpolateColors("rgb(6, 148, 162)", "rgb(126, 58, 142)", type_data.label.length);
          //config dari pie Chart
          const pieConfig = {
            type: 'doughnut',
            data: {
              datasets: [
                {
                  data: type_data.data,
                  backgroundColor: colorArray,
                  label: 'Type Of Collection',
                },
              ],
              labels: type_data.label,
            },
            options: {
              maintainAspectRatio: false,
              responsive: false,
              cutoutPercentage: 50,
              legend: {
                display: true,
              },
            },
          }
          // membuat Chart berdasarkan config yang telah ditentukan
          const pieCtx = document.getElementById('pie')
          window.myPie = new Chart(pieCtx, pieConfig)
        }

        //Line Chart Function
        function LineChart(data){
          //menyiapkan variabel untuk transformasi
          let config = {};
          // variabel set untuk menyimpan nilai-nilai unik
          const labels = new Set();
          let label_username = new Set();
          const datasets = [];

          data.map(function(val, index){
              labels.add(val.Month)
              label_username.add(val.username)
          })

          // merubah set menjadi array agar bisa memanfaatkan index
          label_username = [...label_username]

          // membuat array warna berdasarkan banyaknya label username
          let colorArray = interpolateColors("rgb(6, 148, 162)", "rgb(126, 58, 142)", label_username.length);

          //melakukan nested looping untuk mengumpulkan data berdasarkan label username sejenis untuk digunakan di config
          label_username.forEach ((value, index) => {
              let temp = value;
              let data_label = [];
              for(let j=0; j<data.length; j++){
                if(data[j].username === temp){
                  //mengumpulkan data berdasarkan label user sejenis
                  console.log('index :',index)
                  console.log('j :',j)
                  data_label.push(data[j].Count)
                }
              }
              // membuat object berdasarkan label user sejenis
              const obj = {
                label: temp,
                backgroundColor: colorArray[index],
                borderColor: colorArray[index],
                data: data_label,
                fill: false,
              };
              datasets.push(obj);
          })
          console.log('datasets')
          console.log(datasets)
          const lineConfig = {
            type: 'line',
            data: {
              labels: [...labels],
              datasets: datasets
            },
            options: {
              responsive: true,
              /**
              * Default legends are ugly and impossible to style.
              * See examples in charts.html to add your own legends
              *  */
              legend: {
                display: true,
              },
              tooltips: {
                mode: 'index',
                intersect: false,
              },
              hover: {
                mode: 'nearest',
                intersect: true,
              },
              scales: {
                x: {
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Month',
                  },                  
                },
                y: {
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Value',
                  },                  
                },
              },
            },
          }
          const lineCtx = document.getElementById('line')
          window.myLine = new Chart(lineCtx, lineConfig)
        }

        //Bar Chart Function
        function BarChart(){
          const barConfig = {
            type: 'bar',
            data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
              datasets: [
                {
                  label: 'Shoes',
                  backgroundColor: '#0694a2',
                  // borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [-3, 14, 52, 74, 33, 90, 70],
                },
                {
                  label: 'Bags',
                  backgroundColor: '#7e3af2',
                  // borderColor: window.chartColors.blue,
                  borderWidth: 1,
                  data: [66, 33, 43, 12, 54, 62, 84],
                },
              ],
            },
            options: {
              responsive: true,
              legend: {
                display: false,
              },
            },
          }
          const barsCtx = document.getElementById('bars')
          window.myBar = new Chart(barsCtx, barConfig)
        }




        //Random Color beetwen 2 color
        function HexColor(rgb) {
            let [r,g,b] = rgb;
        
            let hr = r.toString(16).padStart(2, '0');
            let hg = g.toString(16).padStart(2, '0');
            let hb = b.toString(16).padStart(2, '0');
        
            return "#" + hr + hg + hb;
        }

        function interpolateColor(color1, color2, factor) {
            if (arguments.length < 3) { 
                factor = 0.5; 
            }
            var result = color1.slice();
            for (var i = 0; i < 3; i++) {
                result[i] = Math.round(result[i] + factor * (color2[i] - color1[i]));
            }
            return result;
        };
        function interpolateColors(color1, color2, steps) {
            var stepFactor = 1 / (steps - 1),
                interpolatedColorArray = [];

            color1 = color1.match(/\d+/g).map(Number);
            color2 = color2.match(/\d+/g).map(Number);

            for(var i = 0; i < steps; i++) {
                interpolatedColorArray.push(HexColor(interpolateColor(color1, color2, stepFactor * i)));
            }

            return interpolatedColorArray;
        }
    </script>
@endsection