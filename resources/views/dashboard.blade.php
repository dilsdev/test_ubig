@extends('layout.app')
@section('title', 'Dashboard admin')    
@section('page-pretitle', 'Dashboard admin')    
@section('page-title', 'Sistem aplikasi data siswa')    
@section('isi')
@php
$laki_laki=0;
$perempuan=0;
@endphp
@foreach ($jeniskelamin as $jenis)
  @if ($jenis['gender'] == 'Laki-laki')
      @php
          $laki_laki += $jenis['total'];
      @endphp
  @endif
  @if ($jenis['gender'] == 'Perempuan')
      @php
          $perempuan += $jenis['total'];
      @endphp
  @endif
@endforeach
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
                  {{ $laki_laki + $perempuan }} Siswa
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
                  {{ $laki_laki }} Siswa
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
                  {{ $perempuan }} Siswa
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
          <div class="card-header w-full d-flex aligh-items-center justify-content-center">
            <h2 class="text-secondary m-0">Persentase siswa berdasarkan jenis kelamin</h2>
          </div>
          <div class="card-body">
          <div class="row row-cards">
            <div id="jenis-kelamin" class="chart-lg"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header w-full d-flex aligh-items-center justify-content-center">
            <h2 class="text-secondary m-0">Persentase asal kota</h2>
          </div>
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
    var jeniskelamin = @json($jeniskelamin); 

    
    var genders = jeniskelamin.map(jenis => jenis.gender);
    var totals = jeniskelamin.map(jenis => jenis.total);

    
    var options = {
      chart: {
        type: 'donut',
        fontFamily: 'inherit',
        height: 240,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      series: totals, 
      labels: genders, 
      fill: {
        opacity: 1,
      },
      tooltip: {
        theme: 'dark',
        fillSeriesColor: false 
      },
      grid: {
        strokeDashArray: 2,
      },
      colors: ['#008FFB', '#FF4560'], 
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
    };

    
    if (window.ApexCharts) {
      var chart = new ApexCharts(document.getElementById('jenis-kelamin'), options);
      chart.render();
    }
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <script>
    var kotas = @json($kotas);
    var kota = kotas.map(kota => kota.kota);
    var totals = kotas.map(kota => kota.total);
      
    var options = {
          series: totals,
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: kota,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
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
    var students = @json($students);

    var years = students.map(student => student.year);
    var totals = students.map(student => student.total);
    var options = {
    series: [{
      name: 'Jumlah Siswa',
      data: totals 
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
      categories: years, 
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