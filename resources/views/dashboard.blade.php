@extends('layouts.app')

@section('content')
<style>
  .dashboard-stat-card {
    border: 0;
    border-radius: 8px;
    box-shadow: 0 3px 14px rgba(31, 45, 61, .08);
  }

  .dashboard-stat-card .card-icon {
    border-radius: 8px 0 0 8px;
  }

  .dashboard-panel {
    height: 100%;
    border: 0;
    border-radius: 8px;
    box-shadow: 0 3px 14px rgba(31, 45, 61, .08);
  }

  .dashboard-panel .card-header {
    min-height: 64px;
    padding: 18px 22px;
    border-bottom: 1px solid #eef1f5;
  }

  .dashboard-panel .card-header h4 {
    margin: 0;
    color: #253858;
    font-size: 16px;
  }

  .dashboard-panel .card-body {
    padding: 22px;
  }

  .dashboard-chart {
    position: relative;
    min-height: 320px;
  }

  .dashboard-stock-table {
    min-width: 560px;
    margin-bottom: 0;
  }

  .dashboard-stock-table th {
    border-top: 0;
    color: #8a94a6;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;
  }

  .dashboard-stock-table td {
    vertical-align: middle;
  }

  .dashboard-stock-table .stock-value {
    font-weight: 700;
  }

  @media (max-width: 767.98px) {
    .dashboard-panel .card-header,
    .dashboard-panel .card-body {
      padding: 16px;
    }

    .dashboard-chart {
      min-height: 260px;
    }
  }
</style>

<div class="section-header">
  <h1>Dashboard</h1>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1 dashboard-stat-card">
        <div class="card-icon bg-primary">
          <i class="fas fa-thin fa-cubes"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Semua Barang</h4>
          </div>
          <div class="card-body">
            {{ $barang }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1 dashboard-stat-card">
        <div class="card-icon bg-danger">
          <i class="fas fa-file-import"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Barang Masuk</h4>
          </div>
          <div class="card-body">
            {{ $barangMasuk }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1 dashboard-stat-card">
        <div class="card-icon bg-warning">
          <i class="fas fa-file-export"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Barang Keluar</h4>
          </div>
          <div class="card-body">
            {{ $barangKeluar }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1 dashboard-stat-card">
        <div class="card-icon bg-success">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pengguna</h4>
          </div>
          <div class="card-body">
            {{ $user }}
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-lg-7 col-md-12 mb-4">
    <div class="card dashboard-panel">
      <div class="card-header">
        <h4>Grafik Barang Masuk & Barang Keluar</h4>
      </div>
      <div class="card-body">
        <div class="dashboard-chart">
          <canvas id="summaryChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5 col-md-12 mb-4">
    <div class="card dashboard-panel">
      <div class="card-header">
        <h4>Semua Stok Barang</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-hover dashboard-stock-table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($barangMinimum as $barang)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>
                  <span class="stock-value {{ $barang->stok <= $barang->stok_minimum ? 'text-danger' : 'text-success' }}">
                    {{ number_format($barang->stok ?? 0, 0, ',', '.') }}
                  </span>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center">Belum ada data barang</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        </div>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const chartMonths = @json($chartMonths->values());
const chartLabels = chartMonths.map((month) => {
  const [year, monthNumber] = month.split('-');
  return new Date(Number(year), Number(monthNumber) - 1, 1).toLocaleDateString('id-ID', {
    month: 'short',
    year: 'numeric'
  });
});

const chart = new Chart(document.getElementById('summaryChart'), {
      type: 'bar',
      data: {
        labels: chartLabels,
        datasets: [
          {
            label: 'Barang Masuk',
            data: @json($barangMasukData->values()),
            backgroundColor: 'rgba(67, 97, 238, .78)',
            borderColor: '#4361ee',
            borderWidth: 1,
            borderRadius: 4
          },
          {
            label: 'Barang Keluar',
            data: @json($barangKeluarData->values()),
            backgroundColor: 'rgba(239, 71, 111, .78)',
            borderColor: '#ef476f',
            borderWidth: 1,
            borderRadius: 4
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
          mode: 'index',
          intersect: false
        },
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              usePointStyle: true,
              padding: 18
            }
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            }
          },
          y: {
            beginAtZero: true,
            ticks: {
              precision: 0
            },
            grid: {
              color: '#edf0f5'
            }
          }
        }
      }
    });
</script>
@endpush
