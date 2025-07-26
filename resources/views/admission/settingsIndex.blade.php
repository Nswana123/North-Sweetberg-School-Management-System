<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>North Sweetberg University</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico">
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="../assets/css/core/libs.min.css">
      
      <!-- Aos Animation Css -->
      <link rel="stylesheet" href="../assets/vendor/aos/dist/aos.css">
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=4.0.0">
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="../assets/css/custom.min.css?v=4.0.0">
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="../assets/css/dark.min.css">
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="../assets/css/customizer.min.css">
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="../assets/css/rtl.min.css">
      <link rel="stylesheet" href="../assets/css/zed.css">
         
  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>    
    </div>
    <!-- loader END -->
    @include('dashboard.sidebar')
    @include('dashboard.header')
   

<div class="conatiner-fluid content-inner mt-n5 py-0">
@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 
      <div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
    <div class="card-body">
  <div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-0">Admission Settings</h2>
            <p class="text-muted">Manage which programs are open for admissions</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Current Settings</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>Status</th>
                                    <th>Period</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($settings as $setting)
                                <tr>
                                    <td>{{ $setting->program->name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $setting->is_open ? 'success' : 'danger' }}">
                                            {{ $setting->is_open ? 'Open' : 'Closed' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($setting->start_date || $setting->end_date)
                                            {{ optional($setting->start_date)->format('M d, Y') ?? 'No start' }} 
                                            to 
                                            {{ optional($setting->end_date)->format('M d, Y') ?? 'No end' }}
                                        @else
                                            Always open when enabled
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" 
                                                data-bs-target="#editModal{{ $setting->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('admission.settingsToggle', $setting->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $setting->is_open ? 'danger' : 'success' }}">
                                                <i class="fas fa-power-off"></i> {{ $setting->is_open ? 'Close' : 'Open' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $setting->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('admission.settingsUpdate', $setting->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Admission Settings</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="hidden" name="is_open" value="0">
                                            <input type="checkbox" name="is_open" class="form-check-input" 
                                                value="1" {{ $setting->is_open ? 'checked' : '' }}>
                                            <label class="form-check-label">Admission Open</label>
                                        </div>
                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label>Start Date</label>
                                                            <input type="datetime-local" name="start_date" class="form-control" 
                                                                   value="{{ optional($setting->start_date)->format('Y-m-d\TH:i') }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>End Date</label>
                                                            <input type="datetime-local" name="end_date" class="form-control" 
                                                                   value="{{ optional($setting->end_date)->format('Y-m-d\TH:i') }}">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Closure Message</label>
                                                        <textarea name="closure_message" class="form-control" rows="3">{{ $setting->closure_message }}</textarea>
                                                        <small class="text-muted">This message will be shown when admissions are closed</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No admission settings configured yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Add New Setting</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admission.settingsStore') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Program</label>
                            <select name="program_id" class="form-control" required>
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_open" value="0">
                            <input type="checkbox" name="is_open" class="form-check-input" 
                                value="1" {{ old('is_open', true) ? 'checked' : '' }}>
                            <label class="form-check-label">Admission Open</label>
                        </div>
                    </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Start Date (Optional)</label>
                                <input type="datetime-local" name="start_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>End Date (Optional)</label>
                                <input type="datetime-local" name="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Closure Message (Optional)</label>
                            <textarea name="closure_message" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Setting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      </div>
    </div>

    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="../assets/js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="../assets/js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="../assets/js/charts/vectore-chart.js"></script>
    <script src="../assets/js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="../assets/js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="../assets/js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="../assets/js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="../assets/js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="../assets/vendor/aos/dist/aos.js"></script>
    
    <!-- App Script -->
    <script src="../assets/js/hope-ui.js" defer></script>
    
    
  </body>
</html>