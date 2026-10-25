@extends('layouts.admin.app')

@section('content')
{{-- start main content --}}
<!-- START: Dashboard Header Banner -->
    <div class="page-header">
      <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-subtitle">Kelola dan Pantau stok barang UMKM dengan mudah.</p>
      </div>
      <button class="btn-date-picker" type="button" id="date-picker-trigger">
        <i class="bi bi-calendar4-event"></i>
        <span id="selected-date-range">January 12, 2026 - January 23, 2026</span>
        <i class="bi bi-chevron-down ms-1"></i>
      </button>
    </div>
    <!-- END: Dashboard Header Banner -->

    <!-- START: Main Layout Grid (2 Columns: Dashboard + Performance Pane) -->
    <div class="row g-4">

      <!-- TOP AREA: Quick Info Stat Cards Row (Full Width) -->
      <div class="col-12">
        <div class="row g-4">
          <!-- Stat Card 1: Green Alert Banner -->
          <div class="col-md-4">
            <div class="card alert-green-card">
              <div class="position-relative z-index-2">
                <span class="alert-green-badge">Update</span>
                <div class="alert-green-date">Feb 14th 2026</div>
                <div class="alert-green-text">Stok barang tersimpan dengan rapi dan mudah dipantau.</div>
              </div>
              <a href="#" class="alert-green-link z-index-2" id="alert-link-statistics">
                <span>Lihat Data Barang</span>
                <i class="bi bi-arrow-right"></i>
              </a>

              <!-- Inline SVG geometric decoration (Lime green 6-pointed star/asterisk with rounded caps) -->
              <svg class="alert-green-bg-shape" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g transform="translate(50,50)">
                  <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" />
                  <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(60)" />
                  <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(120)" />
                </g>
              </svg>
            </div>
          </div>

          <!-- Stat Card 2: Net Income -->
          <div class="col-md-4">
            <div class="card card-stat d-flex flex-column justify-content-between">
              <div>
                <div class="card-header">
                  <span class="stat-label">Total Jenis Barang</span>
                  <div class="dropdown">
                    <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                      aria-label="More Options" id="btn-more-income">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-repeat"></i> Refresh</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Export
                          Report</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-eye-slash"></i> Hide Details</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="stat-value">25</div>
                <div class="trend-badge trend-up">
                  <i class="bi bi-arrow-up-right"></i>
                  <span>Jenis barang terdata</span>
                </div>
              </div>
              <div class="sparkline-container sparkline-card-footer">
                <div id="income-sparkline"></div>
              </div>
            </div>
          </div>

          <!-- Stat Card 3: Total Return -->
          <div class="col-md-4">
            <div class="card card-stat d-flex flex-column justify-content-between">
              <div>
                <div class="card-header">
                  <span class="stat-label">Total Stok Barang</span>
                  <div class="dropdown">
                    <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                      aria-label="More Options" id="btn-more-return">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-repeat"></i> Refresh</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Export
                          Report</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-eye-slash"></i> Hide Details</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="stat-value">565</div>
                <div class="trend-badge trend-up">
                  <span>Total stok barang</span>
                </div>
              </div>
              <div class="sparkline-container sparkline-card-footer">
                <div id="return-sparkline"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END: TOP AREA -->

      <!-- LEFT AREA: Primary Dashboard Stats & Tables -->
      <div class="col-xl-9 col-lg-8">

        <!-- START: Details Area (Transactions + Performance Charts) -->
        <div class="row g-4">
          <!-- Column: Revenue Chart (Full Width / Wider) -->
          <div class="col-12">
            <div class="card mb-0">
              <div class="card-header mb-2">
                <h2 class="card-title">Ringkasan Stok Barang</h2>
                <!-- Custom Static Legends -->
                <div class="d-flex gap-3 align-items-center">
                  <div class="chart-legend-item">
                    <span class="legend-dot bg-forest-medium"></span>
                    <span class="chart-legend-label">Stok Tersedia</span>
                  </div>
                  <div class="chart-legend-item">
                    <span class="legend-dot bg-lime-accent"></span>
                    <span class="chart-legend-label">Stok menipis</span>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-baseline gap-2 mb-3">
                <span class="stat-value-amount">25</span>
                <span class="trend-badge trend-up fs-xs">Jenis Barang Yang terdata</span>
              </div>
              <div id="revenue-chart"></div>
            </div>
          </div>

          <!-- Column: Transaction List -->
          <div class="col-md-7 d-flex flex-column">
            <div class="card h-100 flex-grow-1">
              <div class="card-header">
                <h2 class="card-title">Transaction</h2>
                <div class="dropdown">
                  <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    aria-label="More Options" id="btn-more-transaction">
                    <i class="bi bi-three-dots"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-funnel"></i> Filter Status</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Export CSV</a>
                    </li>
                  </ul>
                </div>
              </div>

              <!-- Transaction Items List -->
              <div class="transaction-list">
                <div class="transaction-item">
                  <div class="transaction-icon bg-forest-light text-lime">
                    <i class="bi bi-spotify"></i>
                  </div>
                  <div class="transaction-info">
                    <div class="transaction-name">Penambahan Stok Barang</div>
                    <div class="transaction-date">Aktivitas pencatatan barang</div>
                  </div>
                  <div class="transaction-amount text-main">Stok bertambah</div>
                </div>

                <div class="transaction-item">
                  <div class="transaction-icon bg-forest-light text-lime">
                    <i class="bi bi-paypal"></i>
                  </div>
                  <div class="transaction-info">
                    <div class="transaction-name">Pembaruan Data Barang</div>
                    <div class="transaction-date">Feb 13, 2026 • 08:15 AM</div>
                  </div>
                  <div class="transaction-amount text-success">Data diperbarui</div>
                </div>

                <div class="transaction-item">
                  <div class="transaction-icon bg-forest-light text-lime">
                    <i class="bi bi-stripe"></i>
                  </div>
                  <div class="transaction-info">
                    <div class="transaction-name">Penyesuaian Stok Barang</div>
                    <div class="transaction-date">Feb 11, 2026 • 04:30 PM</div>
                  </div>
                  <div class="transaction-amount text-success">Stok disesuaikan</div>
                </div>

                <div class="transaction-item">
                  <div class="transaction-icon bg-forest-light text-lime">
                    <i class="bi bi-slack"></i>
                  </div>
                  <div class="transaction-info">
                    <div class="transaction-name">Pemeriksaan Data Barang</div>
                    <div class="transaction-date">Feb 09, 2026 • 09:20 AM</div>
                  </div>
                  <div class="transaction-amount text-main">Data Diperiksa</div>
                </div>
              </div>

            </div>
          </div>

          <!-- Column: Product Overview Progress -->
          <div class="col-md-5 d-flex flex-column">
            <div class="card h-100 flex-grow-1">
              <div class="card-header">
                <h2 class="card-title">Status Stok Barang</h2>
                <div class="dropdown">
                  <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    aria-label="More Options" id="btn-more-products">
                    <i class="bi bi-three-dots"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-plus-lg"></i> Add Product</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Manage</a></li>
                  </ul>
                </div>
              </div>

              <div class="progress-container">
                <div class="progress-label-row">
                  <span class="progress-label">Stok Tersedia</span>
                  <span class="progress-value">233</span>
                </div>
                <div class="progress" role="progressbar" aria-label="Product Launched Progress" aria-valuenow="65"
                  aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar bg-lime-accent w-65"></div>
                </div>
              </div>

              <div class="progress-container">
                <div class="progress-label-row">
                  <span class="progress-label">Stok Menipis</span>
                  <span class="progress-value">23</span>
                </div>
                <div class="progress" role="progressbar" aria-label="Ongoing Product Progress" aria-valuenow="20"
                  aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar bg-lime-accent opacity-50 w-50"></div>
                </div>
              </div>

              <div class="progress-container">
                <div class="progress-label-row">
                  <span class="progress-label">Stok Habis</span>
                  <span class="progress-value">482</span>
                </div>
                <div class="progress" role="progressbar" aria-label="Product Sold Progress" aria-valuenow="85"
                  aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar bg-lime-accent w-85"></div>
                </div>
              </div>

            

              

              
            </div>

          </div>
        </div>
        <!-- END: Details Area -->

      </div>

      <!-- RIGHT AREA: Performance Details Sidebar Panel -->
      <div class="col-xl-3 col-lg-4">
        <div class="right-panel-wrapper d-flex flex-column gap-4 h-100">

          <!-- Performance Donut Chart card -->
          <div class="card flex-grow-1 d-flex flex-column justify-content-between mb-0">
            <div class="card-header mb-1">
              <h2 class="card-title">Distribusi Stok Barang</h2>
            </div>

            <div id="views-chart"></div>

            
          </div>

          <!-- Level Up Promotion CTA banner -->
          <div class="promo-banner-card">
            <!-- Inline SVG geometric decoration (Lime green 6-pointed star/asterisk with rounded caps) -->
            <svg class="promo-banner-bg-shape" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g transform="translate(50,50)">
                <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" />
                <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(60)" />
                <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(120)" />
              </g>
            </svg>

            <h3 class="promo-title">Kelola Stok Barang Lebih Mudah</h3>
            <p class="promo-desc">Catat dan pantau persediaan barang UMKM dengan lebih rapi.</p>
            <button class="btn-promo" id="btn-promo-action">Lihat Data Barang</button>
          </div>
        </div>
      </div>
      <!-- END: RIGHT AREA -->

    </div>
    <!-- END: Main Layout Grid -->
{{-- end main content --}}
@endsection
