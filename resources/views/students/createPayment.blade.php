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
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
         <h3>Make Payment Here</h3>
    </div>
</div>
    <div class="card-body">
          
<form method="POST" action="{{ route('students.storePayment') }}" enctype="multipart/form-data" novalidate>
    @csrf

    <!-- Payment Purpose Dropdown -->
    <div class="mb-4">
        <label for="paymentPurpose" class="form-label">Payment Purpose</label>
        <select class="form-select" id="paymentPurpose" name="payment_purpose" required>
            <option value="" selected disabled>Select Payment Purpose</option>
            <option value="tuition_fee">Tuition Fee</option>
            <option value="library_fee">Library Fee</option>
            <option value="hostel_fee">Hostel Fee</option>
            <option value="other">Other</option>
        </select>
        <div class="invalid-feedback">Please select a payment purpose.</div>
    </div>

    <!-- Payment Mode Dropdown -->
    <div class="mb-4">
        <label for="paymentMode" class="form-label">Payment Mode</label>
        <select class="form-select" id="paymentMode" name="method" required>
            <option value="" selected disabled>Select Payment Mode</option>
            <option value="mobile_money_payment">Mobile Money Payment</option>
            <option value="card">Credit/Debit Card</option>
            <option value="bank_transfer">Bank Transfer</option>
        </select>
        <div class="invalid-feedback">Please select a payment mode.</div>
    </div>

    <!-- Payment Amount Field -->
    <div class="mb-4">
        <label for="paymentAmount" class="form-label">Amount (ZMK)</label>
        <input type="number" class="form-control" id="paymentAmount" name="amount" min="0" step="0.01" required value="{{ $applicationFee ?? '50.00' }}">
        <div class="invalid-feedback">Please enter a valid payment amount.</div>
    </div>

    <!-- Mobile Money Payment Details -->
    <div id="mobileMoneyDetails" style="display:none;">
        <div class="mb-3">
            <label for="paymentNumber" class="form-label">Mobile Money Number</label>
            <input type="text" class="form-control" id="paymentNumber" name="payment_number" placeholder="e.g. 097XXXXXXX">
            <div class="invalid-feedback">Please enter payment number.</div>
        </div>
        <div class="mb-3">
            <label for="paymentReference" class="form-label">Transaction Reference</label>
            <input type="text" class="form-control" id="paymentReference" name="reference" placeholder="MM transaction reference">
            <div class="invalid-feedback">Please enter transaction reference.</div>
        </div>
    </div>

    <!-- Card Payment Details -->
    <div id="cardDetails" style="display:none;">
        <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" name="cardNumber" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
            <div class="invalid-feedback">Please enter a valid card number.</div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cardExpiry" class="form-label">Expiry Date (MM/YY)</label>
                <input type="text" class="form-control" id="cardExpiry" name="cardExpiry" placeholder="MM/YY" maxlength="5">
                <div class="invalid-feedback">Please enter card expiry date.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cardCVC" class="form-label">CVC</label>
                <input type="text" class="form-control" id="cardCVC" name="cardCVC" maxlength="4" placeholder="123">
                <div class="invalid-feedback">Please enter card CVC.</div>
            </div>
        </div>
    </div>

    <!-- Bank Transfer Details -->
    <div id="bankTransferDetails" style="display:none;">
        <div class="mb-3">
            <label for="bankName" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Your Bank Name">
            <div class="invalid-feedback">Please enter bank name.</div>
        </div>
        <div class="mb-3">
            <label for="accountNumber" class="form-label">Account Number</label>
            <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Your Account Number">
            <div class="invalid-feedback">Please enter account number.</div>
        </div>
        <div class="mb-3">
            <label for="transactionReference" class="form-label">Transaction Reference</label>
            <input type="text" class="form-control" id="transactionReference" name="reference" placeholder="Bank Transaction Reference">
            <div class="invalid-feedback">Please enter transaction reference.</div>
        </div>
    </div>

    <!-- Payment Processing Section -->
    <div id="paymentProcessing" style="display: none;">
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Processing payment...</span>
            </div>
            <p class="mt-3">Processing your payment. Please wait...</p>
        </div>
    </div>

    <!-- Payment Verification Section -->
    <div id="paymentVerification" style="display: none;">
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i> Payment successfully received! Verifying transaction...
        </div>
    </div>

    <div class="form-navigation">
        <button type="button" class="btn btn-prev-step">
            <i class="bi bi-arrow-left me-2"></i> Back
        </button>
        <button type="submit" id="initiatePaymentBtn" class="btn btn-primary">
            <i class="bi bi-credit-card me-2"></i> Process Payment
        </button>
    </div>
</form>

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
    // JavaScript to toggle visibility based on payment mode selection
    document.getElementById("paymentMode").addEventListener("change", function() {
        const mobileMoneyDetails = document.getElementById("mobileMoneyDetails");
        const cardDetails = document.getElementById("cardDetails");
        const bankTransferDetails = document.getElementById("bankTransferDetails");

        mobileMoneyDetails.style.display = "none";
        cardDetails.style.display = "none";
        bankTransferDetails.style.display = "none";

        if (this.value === "mobile_money_payment") {
            mobileMoneyDetails.style.display = "block";
        } else if (this.value === "card") {
            cardDetails.style.display = "block";
        } else if (this.value === "bank_transfer") {
            bankTransferDetails.style.display = "block";
        }
    });
    </script>
  </body>
</html>