@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h1 style="text-align: center;">UAProjects Control Panel</h1>
<p class="task-counter justify-center">Total tasks: {{ $totalTasks }}</p>
<div class="d-block d-md-flex justify-content-around">
    <div>
        <h2 class="text-center">Tasks by user</h2>
        <canvas id="barChart"></canvas>
    </div>
    <div>
        <h2 class="text-center">Tasks by status</h2>
        <canvas id="doughnutChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  var colors = ["gold","indigo","olive","black","dodgerblue","darkslategrey","darkcyan","aquamarine","darkseagreen","forestgreen","mediumblue","ivory","rosybrown","dimgrey","dodgerblue","goldenrod","lemonchiffon","lightgray","khaki","lightsalmon","maroon"];

  var ctxB = document.getElementById("barChart").getContext('2d');
  var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
      labels: [
        @foreach ($tasksPerUser as $user => $taskCount)
          "{{ $user }}",
        @endforeach
      ],
      datasets: [{
        data: [
          @foreach ($tasksPerUser as $taskCount)
            {{ $taskCount }},
          @endforeach
        ],
        backgroundColor: 'rgba(75, 192, 192, 1)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false // Establece esta propiedad en "false" para ocultar la leyenda interactiva
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });

  var ctxD = document.getElementById("doughnutChart").getContext('2d');
  var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
      labels: ["In progress","To do","Completed"],
      datasets: [{
        data: [{{ $numinProgress }}, {{ $numtoDo }}, {{ $numtoCompleted }}],
        backgroundColor: colors,
        hoverBackgroundColor: colors
      }]
    },
    options: {
      responsive: true
    }
  });
</script>

<style>
  .task-counter {
    text-align: center;
    font-size: 30px;
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 5px;
  }
</style>

@endsection
