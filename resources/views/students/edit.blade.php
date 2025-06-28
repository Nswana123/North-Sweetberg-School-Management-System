<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>North Sweetberg University</title>
      
          <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=4.0.0') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=4.0.0') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/zed.css') }}">
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
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
             <h3>{{ isset($student) ? 'Update' : 'Add' }} Student</h3>
    </div>
</div>
    <div class="card-body">
          
    <form method="POST" action="{{ isset($student) ? route('students.update', $student) : route('students.store') }}">
        @csrf
        @if(isset($student)) @method('PUT') @endif

        <div class="d-flex gap-3 flex-wrap mb-3">
            <div class="flex-fill">
                <label class="form-label">User</label>
                <select name="user_id" class="form-control" disabled>
                    <option value="">-- Select User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ isset($student) && $student->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->student_number }}
                    @endforeach
                </select>
            </div>
            <div class="flex-fill">
                <label class="form-label">Campus</label>
                <select name="campus_id" class="form-control" required>
                    @foreach($campuses as $campus)
                        <option value="{{ $campus->id }}" {{ isset($student) && $student->campus_id == $campus->id ? 'selected' : '' }}>
                            {{ $campus->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex-fill">
                <label class="form-label">School</label>
                <select name="school_id" class="form-control" required>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ isset($student) && $student->school_id == $school->id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex gap-3 flex-wrap mb-3">
            <div class="flex-fill">
                <label class="form-label">Department</label>
                <select name="department_id" class="form-control" required>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ isset($student) && $student->department_id == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex-fill">
                <label class="form-label">Program</label>
                <select name="program_id" class="form-control" required>
                    @foreach($programs as $prog)
                        <option value="{{ $prog->id }}" {{ isset($student) && $student->program_id == $prog->id ? 'selected' : '' }}>
                            {{ $prog->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex-fill">
                <label class="form-label">Year of Study</label>
                <input type="number" name="year_of_study" class="form-control"
                       value="{{ $student->year_of_study ?? old('year_of_study') }}" min="1" required>
            </div>
            <div class="flex-fill">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ (isset($student) && $student->status=='active')?'selected':'' }}>Active</option>
                    <option value="suspended" {{ (isset($student) && $student->status=='suspended')?'selected':'' }}>Suspended</option>
                    <option value="graduated" {{ (isset($student) && $student->status=='graduated')?'selected':'' }}>Graduated</option>
                </select>
            </div>
        </div>

        {{-- Next of Kin --}}
        <h5>Next of Kin</h5>
        <div class="d-flex gap-3 flex-wrap mb-3">
            <div class="flex-fill">
                <label class="form-label">Full Name</label>
                <input type="text" name="next_of_kin[full_name]" class="form-control"
                       value="{{ $student->nextOfKin->full_name ?? '' }}" required>
            </div>
            <div class="flex-fill">
                <label class="form-label">Relationship</label>
                <input type="text" name="next_of_kin[relationship]" class="form-control"
                       value="{{ $student->nextOfKin->relationship ?? '' }}" required>
            </div>
            <div class="flex-fill">
                <label class="form-label">Phone</label>
                <input type="text" name="next_of_kin[phone]" class="form-control"
                       value="{{ $student->nextOfKin->phone ?? '' }}">
            </div>
        </div>

        {{-- Address --}}
        <h5>Address</h5>
        <div class="d-flex gap-3 flex-wrap mb-3">
            <div class="flex-fill">
                <label class="form-label">Physical Address</label>
                <input type="text" name="address[physical_address]" class="form-control"
                       value="{{ $student->address->physical_address ?? '' }}" required>
            </div>
            <div class="flex-fill">
                <label class="form-label">Postal Address</label>
                <input type="text" name="address[postal_address]" class="form-control"
                       value="{{ $student->address->postal_address ?? '' }}">
            </div>
            <div class="flex-fill">
                <label class="form-label">Town</label>
                <input type="text" name="address[town]" class="form-control"
                       value="{{ $student->address->town ?? '' }}">
            </div>
            <div class="flex-fill">
                <label class="form-label">Province</label>
                <input type="text" name="address[province]" class="form-control"
                       value="{{ $student->address->province ?? '' }}">
            </div>
            <div class="flex-fill">
                <label class="form-label">Country</label>
                <input type="text" name="address[country]" class="form-control"
                       value="{{ $student->address->country ?? 'Zambia' }}">
            </div>
        </div>

        <button class="btn btn-primary">{{ isset($student) ? 'Update' : 'Create' }} Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
    </div>
</div>

      </div>
    </div>
<script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>
    
    <!-- mapchart Script -->
    <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('assets/js/charts/dashboard.js') }}" ></script>
    
    <!-- fslightbox Script -->
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>
    
    <!-- Settings Script -->
    <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>
    
    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
    
    
    
  </body>
</html>