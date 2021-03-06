@section('content')
@extends('Restaurant.layout')
  <!-- Scripts -->

<h1>Home Page</h1>


















<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
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
  <script>
      $(function(){
          $(document).on('click','#delete',function(e){
           e.preventDefault();
           var link =$(this).attr('href');
           const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                window.location.href=link;
                swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your file is safe :)',
                'error'
                )
            }
            })
                    });
                });
  </script>
<script>

    //Image Show Before Upload Start
$(document).ready(function(){
  $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      if (fileName){
          $('#image').html(fileName);
      }
  });
});

function showImage(data, imgId){
  if(data.files && data.files[0]){
      var obj = new FileReader();

      obj.onload = function(d){
          var image = document.getElementById(imgId);
          image.src = d.target.result;
      }
      obj.readAsDataURL(data.files[0]);
  }
}
//Image Show Before Upload End
</script>
@endsection
