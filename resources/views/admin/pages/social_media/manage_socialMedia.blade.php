@extends('admin.layout.master')
@section('title')
    | manage social media
@endsection
@push('css')
    <!-- DataTables -->

    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="main-wrapper">
  <!-- Page Wrapper -->
  <div class="page-wrapper">
      <div class="content container-fluid">
          <div class="card ">
            <div class="card-header">
                <div class="row">
                  <div class="col-sm-7 col-auto">
                    <h3 class="page-title">روابط التواصل الاجتماعي</h3>
                </div>
                  @if(count($social_media) == 0)
                    <div class="col-sm-5 col">
                        <a href="{{ route('create_socialMedia') }}" class="btn btn-primary float-end ">  <i class="ti-plus"></i> قم بانشاء روابط التواصل الاجتماعي</a>
                    </div>
                  @endif
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-responsive table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>رابط  Facebook</th>
                              <th>رابط Twitter</th>
                              <th>رابط Snapchat </th>
                              <th>رابط Instagram</th>
                              <th>افعال</th>
                            </tr>
                      </thead>
                      <tbody>

                          @foreach ($social_media as $serial => $show)
                              <tr>
                                  <td>{{ $serial + 1 }}</td>
                                  <td>{{ $show->facebook }}</td>
                                  <td>{{ $show->twitter }}</td>
                                  <td>{{ $show->google }}</td>
                                  <td>{{ $show->instagram }}</td>
                                  <th>
                                      <a href="{{ route('edit_socialMedia', $show->id) }}" class="h4 text-success"> <i
                                              class="ti-pencil"></i> تعديل </a>
                                      <a class="h4 text-danger mr-2" type="submit"
                                          onclick="deletecontent({{ $show->id }})">
                                          <i class="ti-trash"></i> حذف
                                      </a>
                                      <form id="delete-form-{{ $show->id }}"
                                          action="{{ route('destroy_socialMedia', $show->id) }}" method="get"
                                          style="display: none;">
                                          @csrf

                                      </form>

                                  </th>
                              </tr>
                          @endforeach




                      </tbody>
    
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
  </div>
</div>


@endsection

@section('js')
    <!-- DataTables  & Plugins -->
 
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
                    document.getElementById('delete-form-' + id).submit();
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
@endsection
