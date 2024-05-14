<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PESO - Calapan</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/admin/images/logoo.jpg" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<style>
   .form-floating {
  position: relative;
}

.form-floating > .form-control, .form-floating > .asColorPicker-input, .dataTables_wrapper .form-floating > select, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input[type=text],
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input[type=number], .select2-container--default .form-floating > .select2-selection--single, .select2-container--default .select2-selection--single .form-floating > .select2-search__field, .form-floating > .typeahead,
.form-floating > .tt-query,
.form-floating > .tt-hint,
.form-floating > .form-select {
  height: calc(3.5rem + 2px);
  line-height: 1.25;
}

.form-floating > label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  padding: 1rem 0.75rem;
  pointer-events: none;
  border: 1px solid transparent;
  transform-origin: 0 0;
  transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .form-floating > label {
    transition: none;
  }
}

.form-floating > .form-control, .form-floating > .asColorPicker-input, .dataTables_wrapper .form-floating > select, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input[type=text],
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input[type=number], .select2-container--default .form-floating > .select2-selection--single, .select2-container--default .select2-selection--single .form-floating > .select2-search__field, .form-floating > .typeahead,
.form-floating > .tt-query,
.form-floating > .tt-hint {
  padding: 1rem 0.75rem;
}

.form-floating > .form-control::placeholder, .form-floating > .asColorPicker-input::placeholder, .dataTables_wrapper .form-floating > select::placeholder, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input[type=text]::placeholder,
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select::placeholder, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input[type=number]::placeholder, .select2-container--default .form-floating > .select2-selection--single::placeholder, .select2-container--default .select2-selection--single .form-floating > .select2-search__field::placeholder, .form-floating > .typeahead::placeholder,
.form-floating > .tt-query::placeholder,
.form-floating > .tt-hint::placeholder {
  color: transparent;
}

.form-floating > .form-control:focus, .form-floating > .asColorPicker-input:focus, .dataTables_wrapper .form-floating > select:focus, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:focus[type=text],
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select:focus, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:focus[type=number], .select2-container--default .form-floating > .select2-selection--single:focus, .select2-container--default .select2-selection--single .form-floating > .select2-search__field:focus, .form-floating > .typeahead:focus,
.form-floating > .tt-query:focus,
.form-floating > .tt-hint:focus, .form-floating > .form-control:not(:placeholder-shown), .form-floating > .asColorPicker-input:not(:placeholder-shown), .dataTables_wrapper .form-floating > select:not(:placeholder-shown), .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:not(:placeholder-shown)[type=text],
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select:not(:placeholder-shown), .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:not(:placeholder-shown)[type=number], .select2-container--default .form-floating > .select2-selection--single:not(:placeholder-shown), .select2-container--default .select2-selection--single .form-floating > .select2-search__field:not(:placeholder-shown), .form-floating > .typeahead:not(:placeholder-shown),
.form-floating > .tt-query:not(:placeholder-shown),
.form-floating > .tt-hint:not(:placeholder-shown) {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}

.form-floating > .form-control:-webkit-autofill, .form-floating > .asColorPicker-input:-webkit-autofill, .dataTables_wrapper .form-floating > select:-webkit-autofill, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:-webkit-autofill[type=text],
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select:-webkit-autofill, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:-webkit-autofill[type=number], .select2-container--default .form-floating > .select2-selection--single:-webkit-autofill, .select2-container--default .select2-selection--single .form-floating > .select2-search__field:-webkit-autofill, .form-floating > .typeahead:-webkit-autofill,
.form-floating > .tt-query:-webkit-autofill,
.form-floating > .tt-hint:-webkit-autofill {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}

.form-floating > .form-select {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}

.form-floating > .form-control:focus ~ label, .form-floating > .asColorPicker-input:focus ~ label, .dataTables_wrapper .form-floating > select:focus ~ label, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:focus[type=text] ~ label, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select:focus ~ label, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:focus[type=number] ~ label, .select2-container--default .form-floating > .select2-selection--single:focus ~ label, .select2-container--default .select2-selection--single .form-floating > .select2-search__field:focus ~ label, .form-floating > .typeahead:focus ~ label, .form-floating > .tt-query:focus ~ label, .form-floating > .tt-hint:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label,
.form-floating > .asColorPicker-input:not(:placeholder-shown) ~ label,
.dataTables_wrapper .form-floating > select:not(:placeholder-shown) ~ label,
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:not(:placeholder-shown)[type=text] ~ label,
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select:not(:placeholder-shown) ~ label,
.jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:not(:placeholder-shown)[type=number] ~ label,
.select2-container--default .form-floating > .select2-selection--single:not(:placeholder-shown) ~ label,
.select2-container--default .select2-selection--single .form-floating > .select2-search__field:not(:placeholder-shown) ~ label,
.form-floating > .typeahead:not(:placeholder-shown) ~ label,
.form-floating > .tt-query:not(:placeholder-shown) ~ label,
.form-floating > .tt-hint:not(:placeholder-shown) ~ label,
.form-floating > .form-select ~ label {
  opacity: 0.65;
  transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}

.form-floating > .form-control:-webkit-autofill ~ label, .form-floating > .asColorPicker-input:-webkit-autofill ~ label, .dataTables_wrapper .form-floating > select:-webkit-autofill ~ label, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:-webkit-autofill[type=text] ~ label, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > select:-webkit-autofill ~ label, .jsgrid .jsgrid-table .jsgrid-filter-row .form-floating > input:-webkit-autofill[type=number] ~ label, .select2-container--default .form-floating > .select2-selection--single:-webkit-autofill ~ label, .select2-container--default .select2-selection--single .form-floating > .select2-search__field:-webkit-autofill ~ label, .form-floating > .typeahead:-webkit-autofill ~ label, .form-floating > .tt-query:-webkit-autofill ~ label, .form-floating > .tt-hint:-webkit-autofill ~ label {
  opacity: 0.65;
  transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}
</style>

<style>
           

           body {
               margin: 0;
               padding: 0;
           }
   
           .container-scroller {
               padding: 0;
               margin: 0;
           }
   
           .page-body-wrapper {
               margin-left: 0;
           }
       </style>
       
       <style>
           /* Style to change the design of input fields */
           .form-inline input {
               flex: 1;
               padding: 10px;
               border: 1px solid #ccc;
               border-radius: 5px;
               font-size: 14px;
               /* Add any other styles you want to customize */
           }
   
           /* Style to change the design of labels */
           .form-inline label {
               flex: 1;
               max-width: 200px;
               font-weight: bold;
               margin-bottom: 5px;
               /* Add any other styles you want to customize */
           }
           .custom-labelss {
              font-size: 1px; /* Adjust the font size as needed */
          }

       </style>