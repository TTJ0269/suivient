<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name', 'AED-IFAD')}}</title>

 <!-- statistique -->
 <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">
 <link rel="stylesheet" href="{{ asset('statistiquechart.css') }}"
 integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
   <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

<!--  1.  Top Menu-->
@include('layouts.menu.topmenu')
<!--  2.  Left Menu-->
@include('layouts.menu.leftmenu')
<!--  3.  Main Content (Body) -->

  <div class="content-wrapper">
    <!-- Main content -->
                          @if (session()->has('message'))
                          <div class="btn btn-success btn-block" role="alert">
                          {{ session()->get('message') }}
                          </div>
                          @endif

                          @if (session()->has('messagealert'))
                          <div class="alert alert-danger" role="alert">
                          {{ session()->get('messagealert') }}
                          </div>
                          @endif
    <section class="content">
        @yield('content')
    </section>
  </div>

<!--  4.  Right Menu-->
@include('layouts.menu.rightmenu')
<!--  5.  Footer Menu-->
@include('layouts.menu.footermenu')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.js"> </script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- statistique -->
<script src="{{ asset('js/statistiquechart.js') }}"
integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery -->
<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('vendors/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('vendors/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('vendors/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('vendors/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('vendors/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('vendors/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('vendors/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<!-- CodeMirror -->
<script src="{{ asset('vendors/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('vendors/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('vendors/plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('vendors/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('vendors/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Debut de retour a la ligne-->
<script>
const splitString = (text, chunkSize) => {
    const arr = text.split(" ")
    const output = []

    for (let i = 0, length = arr.length; i < length; i += chunkSize) {
        output.push(arr.slice(i, i + chunkSize))
    }

    return output
};
</script>
<!-- Fin de retour a la ligne-->

<!-- Debut activites confiees-->
<script>
let labelsactivite = [
                  @foreach ($activites as $activite)
                    splitString(('{{ $activite['fonction_libelle'] }} "{{ $activite['operation']}}%"'),2),
                  @endforeach
              ];
let myChartactivite = document.getElementById("activite").getContext('2d');

let activite = new Chart(myChartactivite, {
    type: 'radar',
    data: {
        labels: labelsactivite,
        datasets: [
          {
            label: 'Activités confiées',
            fillColor: "rgba(25, 25, 25, 5)",
            backgroundColor: "rgba(0, 0, 255, 0.3)",
            borderColor: "rgba(54, 162, 235, 1)",
            pointBorderColor: "#191919",
            pointBackgroundColor: "rgba(25, 25, 25, 5)",
            data: [
              @foreach ($activites as $activite)
                  '{{ $activite['operation'] }}',
              @endforeach
              ]
          }
        ]
    },
    options: {
       responsive: true,
        legend: {
        position: 'top',
            labels: {
                fontSize:20,
                fontColor: 'blue'
            }
        },
        title: {
            text: "",
            display: true,
            fontSize:24,
            fontColor: 'blue'
        },
        scale: {
          ticks: {
              fontSize: 15,
              fontColor: 'black',
              max: 100,
              min: 0,
              stepSize: 20,
          },
          angleLines: {
            color: 'red'
          },
          gridLines: {
            color: 'black'
          },
          pointLabels: {
            fontSize: 17,
            fontColor: 'black',
          }
       },
    }
});
</script>
<!-- Fin Activites confiees-->

<!-- Début nombre heure par fonction-->
<script>
    let labelsnombre_heure = [
                    @foreach ($nombre_heures as $nombre_heure)
                          ' {{ round($nombre_heure->temps,0) }}% - {{ $nombre_heure->LibelleFonction }}',
                    @endforeach
                  ];
    let datanombre_heure = [
                  @foreach ($nombre_heures as $nombre_heure)
                          '{{ $nombre_heure->seconde }}',
                  @endforeach
                ];
    let colorsnombre_heure = ['#49A9EA', '#6A329F', '#EAE749', '#49EA4E', '#EA4956', '#34495E'];

    let pourcentage = [
                  @foreach ($nombre_heures as $nombre_heure)
                  "{{ $nombre_heure->temps }}",
                  @endforeach
                ];

    let myChartnombre_heure = document.getElementById("nombre_heure").getContext('2d');

    let nombre_heure = new Chart(myChartnombre_heure, {
        type: 'pie',
        data: {
            labels: labelsnombre_heure,
            datasets: [{
                data: datanombre_heure,
                backgroundColor: colorsnombre_heure
            }]
        },
        options: {
          responsive: true,
            legend: {
              align: 'start',
            position: 'bottom',
                labels: {
                    fontSize:15,
                    fontColor: 'black'
                }
            },
            title: {
                text: "Nombre d'heure par fonction",
                display: true,
                fontSize:20,
                fontColor: 'blue'
            }
        }
    });
</script>
<!-- Fin nombre heure par fonction-->

<!-- Debut fonction -->
@foreach ($collection_fonctions as $collection_fonction)
<script type="text/javascript">
    let labels{{$collection_fonction['fonction_id']}} = [
                @foreach ($collection_fonction['activite_posits'] as $positionnement)
                  splitString(('{{ $positionnement->LibelleType }} "{{round($positionnement->position,0) }}"'),3),
                @endforeach
              ];
    let myChart{{$collection_fonction['fonction_id']}} = document.getElementById("fonction{{$collection_fonction['fonction_id']}}").getContext('2d');

    let fonction{{$collection_fonction['fonction_id']}} = new Chart(myChart{{$collection_fonction['fonction_id']}}, {
        type: 'radar',
        data: {
            labels: labels{{$collection_fonction['fonction_id']}},
            datasets: [
              {
                label: '{{$collection_fonction['fonction_libelle']}}',
                fillColor: "rgba(25, 25, 25, 5)",
                backgroundColor: "rgba(0, 0, 255, 0.3)", //"rgb(55, 144, 246)"
                borderColor: "rgba(54, 162, 235, 1)",
                pointBorderColor: "#191919",
                pointBackgroundColor: "rgba(25, 25, 25, 5)",
                data: [
                    @foreach ($collection_fonction['activite_posits'] as $positionnement)
                      '{{ $positionnement->position }}',
                    @endforeach
                  ]
              }
            ]
        },
        options: {
           responsive: true,
            legend: {
            //align: 'start',
            position: 'top',
                labels: {
                    fontSize:20,
                    fontColor: 'blue',
                }
            },
            title: {
                text: "",
                display: true,
                fontSize:24,
                fontColor: 'blue'
            },
            scale: {
              ticks: {
                  fontSize: 15,
                  fontColor: 'black',
                  max: 4,
                  min: 0,
                  stepSize: 1,
              },
              angleLines: {
                color: 'red'
              },
              gridLines: {
                color: 'black'
              },
              pointLabels: {
                fontSize: 17,
                fontColor: 'black',
              }
           },
        }
    });
    </script>
@endforeach
<!-- Fin fonction -->


</body>
</html>
