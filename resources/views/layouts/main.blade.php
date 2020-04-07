<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Custom fonts for this template-->
  
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ ('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>

<body id="page-top">

      
      @yield('content')
      

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
  <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script type="text/javascript">

  function printDiv(className){

    w=window.open();
    w.document.write($('.'+className).html());
    w.print();
    w.close();
  }

  function showTotalFees(){
    let tutionFees = $('#tution_fees').val();
    let developmentFees = $('#development_fees').val();
    let totalFees = 0;
    if(tutionFees == "" || tutionFees== 'undefined'){
      $("#tution_fees_error").html('Please enter the tution fees').css('display','block');
      return false;
    }
    if(developmentFees == "" || developmentFees== 'undefined'){
      $("#development_fees_error").html('Please enter the development fees').css('display','block');
      return false;
    }
    $("#tution_fees_error").css('display','none');
    $("#development_fees_error").css('display','none');
    totalFees = parseInt(tutionFees) + parseInt(developmentFees);
    $("#total_fees_div").css('display','block');
    $("#total_fees").val(totalFees);
    
    }

    function getFees(){
      let courseType = $('#courseType').val();
      let branch = $('#branch').val();
      let year = $("#year").val();
      let totalFees = 0;
      if(courseType == "" || courseType== 'undefined'){
        $(".course_name_error").html('Please select the course type');
        return false;
      }

      if(branch == "" || branch== 'undefined'){
        $(".branch_name_error").html('Please select the branch');
        return false;
      }

      if(year == "" || year== 'undefined'){
        $(".year_error").html('Please select the year');
        return false;
      }
      
      $.ajax({
        type:'POST',
        url:'/student/getFees',
        dataType:'JSON',
        headers: { 'X-CSRF-Token' : "{{ csrf_token() }}" },
        data:{
          year:year,
          branch:branch,
          courseType:courseType,
        },
        success:function(res){
          if(res.count > 0){
            $("#tution_fees").val(res.tution_fees);
            $("#development_fees").val(res.development_fees);
            $("#total_fees").val(res.total_fees);
          }else{
            $("#tution_fees").val('');
            $("#development_fees").val('');
            $("#total_fees").val('');
          }
        }
      });

    }
    function getGrossSalary(){
      let basic_sal = document.getElementById("basic_sal").value;
      let da = document.getElementById('da').value;
      let agp = document.getElementById('agp').value;
      if(basic_sal == "" || basic_sal== 'undefined'){
          $("#basic_sal_error").html('Please enter the basic salary');
          return false;
      }

      if(da == "" || da== 'undefined'){
          $("#da_error").html('Please enter the DA in %');
          return false;
      }

      if(agp == "" || agp== 'undefined'){
          $("#agp_error").html('Please enter the AGP');
          return false;
      }
      
      let total_da = parseInt(basic_sal)*parseInt(da)/100;
      let total_agp = parseInt(agp);
      let total_hra = parseInt(basic_sal)*parseInt(40)/100;
      let grossSalary = parseInt(basic_sal) + parseInt(total_hra) + parseInt(total_da) + parseInt(total_agp);
      document.getElementById("gross_salary").value = grossSalary;
      
      
      

    }

</script>
</body>

</html>
