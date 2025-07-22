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
<div class="container">
    <h2>Manage Class: {{ $class->title }}</h2>

    <ul class="nav nav-tabs" id="classTabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#notes">Notes</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#messages">Messages</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#media">Media</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#assignments">Assignments</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tests">Tests</a></li>
    </ul>

    <div class="tab-content p-3 border border-top-0">
        {{-- Upload Notes --}}
        <div class="tab-pane fade show active" id="notes">
            <form action="{{ route('classes.notes.upload', $class) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"><label>Title</label><input name="title" class="form-control"></div>
                <div class="mb-3"><label>Note File (PDF/DOC)</label><input type="file" name="note_file" class="form-control"></div>
                <button class="btn btn-primary">Upload Note</button>
            </form>
        </div>

        {{-- Send Message --}}
        <div class="tab-pane fade" id="messages">
            <form action="{{ route('classes.message.send', $class) }}" method="POST">
                @csrf
                <div class="mb-3"><label>Message</label><textarea name="message" class="form-control"></textarea></div>
                <button class="btn btn-success">Send Message</button>
            </form>
        </div>

        {{-- Upload Media --}}
        <div class="tab-pane fade" id="media">
            <form action="{{ route('classes.media.send', $class) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"><label>Media File (Video/Audio)</label><input type="file" name="media" class="form-control"></div>
                <button class="btn btn-info">Upload Media</button>
            </form>
        </div>

        {{-- Create Assignment --}}
        <div class="tab-pane fade" id="assignments">
            <form action="{{ route('classes.assignment.create', $class) }}" method="POST">
                @csrf
                <div class="mb-3"><label>Title</label><input name="title" class="form-control"></div>
                <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
                <div class="mb-3"><label>Due Date</label><input type="date" name="due_date" class="form-control"></div>
                <button class="btn btn-warning">Create Assignment</button>
            </form>
        </div>

        {{-- Create Test --}}
        <div class="tab-pane fade" id="tests">
            <form action="{{ route('classes.test.create', $class) }}" method="POST">
                @csrf
                <div class="mb-3"><label>Test Title</label><input name="title" class="form-control"></div>

                <div id="questions-area">
                    {{-- JavaScript will append multiple question sets here --}}
                </div>

                <button type="button" class="btn btn-secondary my-2" onclick="addQuestion()">Add Question</button>
                <button class="btn btn-dark">Create Test</button>
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
    <script>
function addQuestion() {
    const index = document.querySelectorAll('.question-set').length;
    const html = `
        <div class="question-set border p-3 my-2">
            <h5>Question ${index + 1}</h5>
            <div class="mb-2">
                <label>Question Text</label>
                <input type="text" name="questions[${index}][question_text]" class="form-control">
            </div>
            <div class="mb-2">
                <label>Question Type</label>
                <select name="questions[${index}][question_type]" class="form-control">
                    <option value="text">Text</option>
                    <option value="multiple_choice">Multiple Choice</option>
                </select>
            </div>
            <div class="mb-2">
                <label>Marks</label>
                <input type="number" name="questions[${index}][marks]" class="form-control">
            </div>
            <div class="option-set">
                <label>Options (only for multiple choice)</label>
                <div class="mb-1">
                    <input type="text" name="questions[${index}][options][0][text]" placeholder="Option Text" class="form-control d-inline w-75">
                    <input type="checkbox" name="questions[${index}][options][0][is_correct]" value="1"> Correct
                </div>
                <div class="mb-1">
                    <input type="text" name="questions[${index}][options][1][text]" placeholder="Option Text" class="form-control d-inline w-75">
                    <input type="checkbox" name="questions[${index}][options][1][is_correct]" value="1"> Correct
                </div>
            </div>
        </div>
    `;
    document.getElementById('questions-area').insertAdjacentHTML('beforeend', html);
}
</script>
    
  </body>
</html>