<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name', 'AED-IFAD')}}</title>

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
<body class="hold-transition sidebar-mini">
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

<script type="text/javascript"> 
const currentLocation = location.href;
const menuItem = document.querySelectorAll('a')
const menuLength = menuItem.length
for (let i = 0; i<menuLength; i++){
  if(menuItem[i].href === currentLocation){
    menuItem[i].className = "nav-link active"
  } 
} /**"copy", "csv" , "colvis" */
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Afficher l'image quand elle est selectionnee-->
<script>
  $('input[type="file"][name="image"]').val('');

  $('input[type="file"][name="image"]').on('change',function(){
    var img_path = $(this)[0].value;
    var img_holder = $('.img-holder');
    var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

    if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension =='jfif')
    {
      if(typeof(FileReader) != 'undefined')
      {
        img_holder.empty();
        var reader = new FileReader();
        reader.onload = function(e)
        {
          $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).
          appendTo(img_holder);
        }
        img_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
      }
      else
      {
        $(img_holder).html('Image pas supportée');
      }
    }
    else
    {
      $(img_holder).empty();
    }
  })
</script>
<!-- fin affichage-->
<!-- Afficher l'image quand elle est selectionnee-->
<script>
  $('input[type="file"][name="urlficher"]').val('');

  $('input[type="file"][name="urlficher"]').on('change',function(){
    var img_path = $(this)[0].value;
    var img_holder = $('.img-holder');
    var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

    if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension =='jfif')
    {
      if(typeof(FileReader) != 'undefined')
      {
        img_holder.empty();
        var reader = new FileReader();
        reader.onload = function(e)
        {
          $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).
          appendTo(img_holder);
        }
        img_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
      }
      else
      {
        $(img_holder).html('');
      }
    }
    else
    {
      $(img_holder).empty();
    }
  })
</script>
<!-- fin affichage-->

<!-- charts affichage-->
<script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
  
  
      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')

      var areaChartData = {
      labels  : ['Temps passé par fonction'],
      datasets: [
        {
          label               : 'F1',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : ['{{$tabvaleurtemps[0]}}']
        },
        {
          label               : 'F2',
          backgroundColor     : 'rgba(245,105,84)',
          borderColor         : 'rgba(245,105,84)',
          pointRadius          : false,
          pointColor          : '#f56954',
          pointStrokeColor    : 'rgba(245,105,84)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(245,105,84)',
          data                : ['{{$tabvaleurtemps[1]}}']
        },
        {
          label               : 'F3',
          backgroundColor     : 'rgba(60,188,171)',
          borderColor         : 'rgba(60,188,171)',
          pointRadius          : false,
          pointColor          : '#3cbcab',
          pointStrokeColor    : 'rgba(60,188,171)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,188,171)',
          data                : ['{{$tabvaleurtemps[2]}}']
        },
        {
          label               : 'F4',
          backgroundColor     : 'rgba(241,194,50)', 	
          borderColor         : 'rgba(241,194,50)',
          pointRadius         :  false,
          pointColor          : '#f1c232',
          pointStrokeColor    : 'rgba(241,194,50)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(241,194,50)',
          data                : ['{{$tabvaleurtemps[3]}}']
        },
        {
          label               : 'F5',
          backgroundColor     : 'rgba(106,168,79)',
          borderColor         : 'rgba(106,168,79)',
          pointRadius         :  false,
          pointColor          : '#6AA84F',
          pointStrokeColor    : 'rgba(106,168,79)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(106,168,79)',
          data                : ['{{$tabvaleurtemps[4]}}']
        },
      ]
    }
    

      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp0
      barChartData.datasets[1] = temp1
  
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
  
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    })
  </script>

<!-- charts affichage-->



</body>
</html>
