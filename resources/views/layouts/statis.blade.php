<!-- Début statistiques placement-->
<script>
let labelsplacement = [
                @foreach ($evaluations as $evaluation)
                  '{{ $evaluation->LibelleEvaluation }}',
                @endforeach
              ];
let myChartplacement = document.getElementById("evaluation").getContext('2d');

let evaluation = new Chart(myChartplacement, {
    type: 'radar',
    data: {
        labels: labelsplacement,
        datasets: [
          {
            label: 'Valeur',
            fill: true,
            backgroundColor: "rgba(0, 0, 255, 0.3)",
            borderColor: "rgba(179, 181, 198, 1)",
            pointBorderColor: "#fff",
            pointBackgroundColor: "rgba(179, 181, 198, 1)",
            data: [
              @foreach ($evaluations as $evaluation)
                  '{{ $evaluation->ValeurPlace }}',
              @endforeach
              ]
          }
        ]
    },
    options: {
        title: {
            text: "",
            display: true
        },
        scale: {
          ticks: {
              max: 4,
              min: 0,
              stepSize: 1
          }
       }
    }
});
</script>
<!-- Fin statistiques placement-->