@extends('layout.app')
@section('title', 'Dashboard admin')    
@section('page-pretitle', 'Dashboard admin')    
@section('page-title', 'Sistem aplikasi data siswa')    
@section('isi')
<div class="col-12">
    <div class="row row-cards">
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-body d-flex" style="height: 100px; align-items: center;">
            <div class="row align-items-center">
              <div class="col-auto" >
                <span class="avatar" style="width: 60px; height: 60px;">
                  <img src="{{ asset('group.png') }}" width="50" height="50" alt="" style="box-sizing: border-box">
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  Total
                </div>
                <div class="text-secondary">
                  60 Siswa
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-body d-flex" style="height: 100px; align-items: center;">
            <div class="row align-items-center">
              <div class="col-auto" >
                <span class="avatar" style="width: 60px; height: 60px;">
                  <img src="{{ asset('pria.png') }}" width="50" height="50" alt="" style="box-sizing: border-box">
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  Laki-Laki
                </div>
                <div class="text-secondary">
                  50
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-body d-flex" style="height: 100px; align-items: center;">
            <div class="row align-items-center">
              <div class="col-auto" >
                <span class="avatar" style="width: 60px; height: 60px;">
                  <img src="{{ asset('wanita.png') }}" width="50" height="50" alt="" style="box-sizing: border-box">
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  Perempuan
                </div>
                <div class="text-secondary">
                  10
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