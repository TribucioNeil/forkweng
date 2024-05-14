<?= $this->include('employer/inc/top')?>
<div class="container-scroller">
  <?= $this->include('employer/inc/topbar')?>
  <div class="container-fluid page-body-wrapper">

    <?= $this->include('employer/inc/sidebar')?>

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h2 class="font-weight-bold">Welcome Employer</h2>
              </div>
              <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <p class="btn btn-sm btn-light bg-white" type="button">
                      <i class="fas fa-calendar"> <span id="datetime"></span></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Applicant Distribution</h4>
                    <canvas id="applicantChart" width="400" height="400"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
              </div>
              <div class="col-md-6 grid-margin transparent">
              </div>
            </div>
          </div>
        </div>
      </div>
      <?= $this->include('employer/inc/footer')?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

<script>
const datetime = document.getElementById("datetime");

setInterval(() => {
  const date = new Date();
  const options = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric',
    timeZone: 'Asia/Shanghai'
  };

  const formattedDate = date.toLocaleString('en-US', options);

  datetime.textContent = formattedDate;
}, 1000);

const applicantChart = document.getElementById('applicantChart');
const employedCount = <?= $employedCount ?>; // Access data from view variable
const unemployedCount = <?= $unemployedCount ?>; // Access data from view variable

const ctx = applicantChart.getContext('2d');
const chart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Employed', 'Unemployed'],
    datasets: [{
      label:  'Application Status',
      data: [employedCount, unemployedCount],
      backgroundColor: [
        'rgba(0, 255, 0, 0.7)', // Green for employed
        'rgba(255, 0, 0, 0.7)', // Red for unemployed
      ],
      borderColor: [
        'rgba(0, 255, 0, 1)',
        'rgba(255, 0, 0, 1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    // Add any desired chart options here
  }
});
</script>


