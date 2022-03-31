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
            class="p-3 mr-4 text-rose-500 bg-rose-100 rounded-full dark:text-blue-100 dark:bg-rose-500"
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
        <div class="flex justify-between py-6">
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Lines
          </h4>
          <div class="flex space-x-2">
            <button class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-400 hover:text-white focus:outline-none dark:bg-green-600 dark:text-white dark:hover:bg-green-800 dark:border-0 h-12" id="export_reads"><span>{{ __('Export') }}</span>
            <x-icons.excel class="m-2" /></button>
            <select id="range-reads" class="px-4 rounded-md font-medium border-2 text-gray-800 bg-white hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 dark:hover:bg-gray-900 leading-4">
              <option value="pastsixmonths" selected> Past 6 Months</option>
              <option value="pastmonths">Past months</option>
              <option value="pastyears">Past Year</option>
            </select>
          </div>
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
          <div class="flex justify-between py-6">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
              Bars
            </h4>
            <div class="flex space-x-2">
              <button class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-400 hover:text-white focus:outline-none dark:bg-green-600 dark:text-white dark:hover:bg-green-800 dark:border-0 h-12" id="export_deposit"><span>{{ __('Export') }}</span>
              <x-icons.excel class="m-2" /></button>
              <select id="range-deposit" class="px-4 rounded-md font-semibold border-2 text-gray-800 bg-white hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 dark:hover:bg-gray-900 h-12">
                <option value="pastsixmonths" selected> Past 6 Months</option>
                <option value="pastmonths">Past months</option>
                <option value="pastyears">Past Year</option>
              </select>
            </div>
          </div>
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
        getTimeseries('pastsixmonths')
        getDepositSeries('pastsixmonths')
        //Fetching data
        fetch('/admin/dashboard/ajax?data=types')
          .then(response => response.json())
          .then( data => 
            PieChart(data.types)
        )
        function getDepositSeries(range){
          fetch(`/admin/dashboard/ajax?data=deposit&range=${range}`)
            .then(response => response.json())
            .then( data => {
                console.log("data deposit")
                console.log(data.data)
                BarChart(data.data)
            }
          )
        }
        function getTimeseries(range){
          fetch(`/admin/dashboard/ajax?data=timeseries&range=${range}`)
            .then(response => response.json())
            .then( data => {
                console.log(data.query)
                console.log(data.query2)
                console.log(data.timeseries)
                LineChart(data.timeseries)
            }
          )
        }
        function ExportTimeseries(range){
          fetch(`/admin/dashboard/ajax?data=timeseries&range=${range}&export=download`)
            .then( response => response.json())
            .then(data => {
                let csv = 'Username,Month,Count\n';
                data.timeseries.map(function(obj, index){
                      csv += obj.username;
                      csv += "," + obj.Month;
                      csv += "," + obj.Count;
                      csv += "\n";
                })

                let hiddenElement = document.createElement('a');  
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);  
                
                hiddenElement.download = `reportRead-${range}.csv`;  
                hiddenElement.click();  
            })
        }
        function ExportTimeseriesDeposit(range){
          fetch(`/admin/dashboard/ajax?data=deposit&range=${range}&export=download`)
            .then( response => response.json())
            .then(data => {
                let csv = 'Username,Month,Count\n';
                data.data.map(function(obj, index){
                      csv += obj.username;
                      csv += "," + obj.Month;
                      csv += "," + obj.Count;
                      csv += "\n";
                })

                let hiddenElement = document.createElement('a');  
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);  
                
                hiddenElement.download = `ReportDeposit-${range}.csv`;  
                hiddenElement.click();  
            })
        }

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
            type: 'bar',
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
          if(window.myLine){
            window.myLine.destroy()
          }
          window.myLine = new Chart(lineCtx, lineConfig)
        }

        //Bar Chart Function
        function BarChart(data){
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
          console.log('datasets deposit')
          console.log(datasets)

          const barConfig = {
            type: 'bar',
            data: {
              labels: [...labels],
              datasets: datasets
            },
            options: {
              responsive: true,
              legend: {
                display: false,
              },
            },
          }
          const barsCtx = document.getElementById('bars')
          if(window.myBar){
            window.myBar.destroy();
          }
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

        //event listener
        let rangePicker = document.getElementById('range-reads');
        rangePicker.addEventListener('change' , function(){
          console.log(rangePicker.value)
          getTimeseries(rangePicker.value);
        })
        let rangeDepositPicker = document.getElementById('range-deposit');
        rangeDepositPicker.addEventListener('change' , function(){
          console.log(rangeDepositPicker.value)
          getDepositSeries(rangeDepositPicker.value);
        })
        let exportReads = document.getElementById('export_reads');
        exportReads.addEventListener('click' , ()=>{
            console.log('export csv');
            ExportTimeseries(rangePicker.value);

        });
        let exportDeposit = document.getElementById('export_deposit');
        exportDeposit.addEventListener('click' , ()=>{
            console.log('export deposit csv');
            ExportTimeseriesDeposit(rangeDepositPicker.value);

        });
    </script>
@endsection