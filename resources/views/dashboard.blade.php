@extends('layout.app')
@section('title', 'Dashboard admin')    
@section('page-pretitle', 'Dashboard admin')    
@section('page-title', 'Sistem aplikasi data siswa')    
@section('isi')
<div class="col-12">
    <div class="row row-cards">
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  132 Sales
                </div>
                <div class="text-secondary">
                  12 waiting payments
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  78 Orders
                </div>
                <div class="text-secondary">
                  32 shipped
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-x text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-x -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 4l11.733 16h4.267l-11.733 -16z"></path><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path></svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  623 Shares
                </div>
                <div class="text-secondary">
                  16 today
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-2 row-cards">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
          <div class="row row-cards">
            <div id="jenis-kelamin" class="chart-lg"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
          <div class="row row-cards">
            <div id="kota" class="chart-lg"></div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-body">
        <div class="row row-cards">
          <div id="tanggal-lahir" class="chart-lg"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('jenis-kelamin'), {
        chart: {
          type: "donut",
          fontFamily: 'inherit',
          height: 240,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        series: [44, 55, 12, 10],
        labels: ["Direct", "Affilliate", "E-mail", "Other"],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
        legend: {
          show: true,
          position: 'bottom',
          offsetY: 12,
          markers: {
            width: 10,
            height: 10,
            radius: 100,
          },
          itemMargin: {
            horizontal: 8,
            vertical: 8
          },
        },
        tooltip: {
          fillSeriesColor: false
        },
      })).render();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <script>
    
      
    var options = {
          series: [44, 55, 13, 43, 22],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#kota"), options);
        chart.render();
      
      
    
  </script>

<script>
  var options = {
    series: [{
      name: 'Jumlah Siswa',
      data: [50, 75, 100, 80, 60, 90, 110, 95, 85, 70, 65, 40] 
    }],
    chart: {
      type: 'bar',
      height: 400,
      toolbar: {
        show: true
      },
    },
    plotOptions: {
      bar: {
        borderRadius: 8,
        horizontal: false,
        dataLabels: {
          position: 'top',
        },
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      offsetY: 5,
      style: {
        fontSize: '12px',
        colors: ["#fff"]
      }
    },
    xaxis: {
      categories: ["2000", "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011"], 
      title: {
        text: 'Tahun Kelahiran'
      }
    },
    yaxis: {
      title: {
        text: 'Jumlah Siswa'
      },
      labels: {
        formatter: function (val) {
          return val;
        }
      }
    },
    title: {
      text: 'Jumlah Siswa Berdasarkan Tahun Kelahiran',
      align: 'center',
      margin: 20,
      style: {
        fontSize: '16px',
        color: '#444'
      }
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + ' siswa';
        }
      }
    },
    colors: ['#008FFB']
  };

  var chart = new ApexCharts(document.querySelector("#tanggal-lahir"), options);
  chart.render();
</script>
@endsection