@extends('admin.layout.master')



@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-sm-7 col-auto">
                        <h3 class="page-title">معلومات اساسيه عنك  </h3>
                    </div>
                      @if(count($about) == 0)
                        <div class="col-sm-5 col">
                            <a href="{{ route('create_about') }}" class="btn btn-primary float-end ">  <i class="ti-plus"></i> قم بانشاء نبذة عنك   </a>
                        </div>
                      @endif
                    </div>
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العمر</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الجوال</th>
                                    <th>العنوان</th>
                                    <th>اللغات</th>
                                    <th>نبذه قصيره</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($about as $serial => $show)
                                    <tr>
                                        <td>{{ $serial + 1 }}</td>
                                        <td>{{ $show->age }}</td>
                                        <td>{{ $show->email }}</td>
                                        <td>{{ $show->phone }}</td>
                                        <td>{{ $show->address }}</td>
                                        <th>{{ $show->language }}</th>
                                        <th>{!! Str::limit($show->short_about, 50) !!}</th>

                                        <th>
                                          <a href="{{ route('edit_about', $show->id) }}" class="h4 text-success"> <i
                                            class=" ti-pencil-alt"></i>  تعديل</a>

                                            <a class="h4 text-danger mr-2" type="submit"
                                                onclick="deletecontent({{ $show->id }})">
                                                <i class=" ti-trash"></i>
                                                حذف
                                            </a>
                                            <form id="delete-form-{{ $show->id }}"
                                                action="{{ route('destroy_about', $show->id) }}" method="get"
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
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection

@section('js')
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
