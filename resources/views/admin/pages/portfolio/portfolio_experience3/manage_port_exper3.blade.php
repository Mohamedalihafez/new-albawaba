@extends('admin.layout.master')
@section('title')
| manage portfolio experience3
@endsection
@push('css')
<!-- DataTables -->

  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage portfolio experience3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Manage portfolio experience3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
 <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Project name</th>
                    <th>Experience Name</th>
                    <th>Picture</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($port_exper3 as $serial=>$show)
                    <tr>
                    <td>{{$serial +1 }}</td>
                    <td>{{$show->project_name}}</td>
                    <td>{{$show->experience_name}}</td>
                    <td>
                      <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/images/Portfolio/port_exper3/'.$show->picture)}}" width="70" height="50" alt="img">
                      
                    </td>
                    <td>{{$show->created_at->format('Y-m-d h:i:s')}}</td>
                    <th>{{$show->updated_at->format('Y-m-d h:i:s')}}</th>
                    <th> 
                      <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $show->id  }})">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                    <form id="delete-form-{{ $show->id  }}" 
                     action="{{ route('destroy_port_exp3',$show->id)}}" method="get" style="display: none;">
                      @csrf
                                      
                    </form>

                    <a href="{{ route('edit_port_exp3',$show->id)}}" class="h4 text-success"> <i class="fa fa-pencil-alt"></i> </a>
                   </th>
                  </tr>
                  @endforeach
                 
                 
                 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Project name</th>
                    <th>Experience Name</th>
                    <th>Picture</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
            
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
@endsection

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
 <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deletecontent(id) {
            swal({
                title: 'هل انت متأكد ؟',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم قم بالحذف!',
                cancelButtonText: 'إلغاء',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
   </script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    
@endpush