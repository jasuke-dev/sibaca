@extends('admin.layouts.main')

@section('container')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Dashboard
      </h2>

      <!-- Cards -->
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Users
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $user }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
          >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
          </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Collections
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $collection }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Reads
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
            {{ $reads }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Authors
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
            {{ $author }}
            </p>
          </div>
        </div>

      </div>

      <!-- Lines chart -->
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 my-10">
        <div class="flex justify-between">
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Lines
          </h4>
          <input type="date">
        </div>
        <canvas id="line"></canvas>
      </div>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Doughnut/Pie chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300 relative">
            Collection Types
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
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="grow p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
          @livewire('collection-leader')   
        </div>
        <div class="grow p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
          @livewire('user-leader')   
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