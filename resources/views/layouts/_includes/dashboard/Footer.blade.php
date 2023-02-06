</div>
<!-- page-body-wrapper ends -->

</div>
<!-- container-scroller -->
@if (session('create'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cadastrado com sucesso!',
            showConfirmButton: true
        })
    </script>

@elseif(session('destroy'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Eliminado com sucesso!',
            showConfirmButton: true
        })
    </script>

@elseif(session('update'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Atulização realizada com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('edit'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Alterações foram salvas com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('create_image'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Imagens foram salvas com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('NoAuth'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Não tem autorização para visualizar esta página!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>

@elseif(session('NoPermit'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Sala Ocupada nesta Data',
        showConfirmButton: true
    })
</script>
@endif


<script src="/js/sweetalert2.all.min.js"></script>

<!-- plugins:js -->
<script src="/dashboard/vendors/js/vendor.bundle.base.js"></script>
<script src="/dashboard/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->


<!-- inject:js -->
<script src="/dashboard/js/shared/off-canvas.js"></script>
<script src="/dashboard/js/shared/misc.js"></script>
<!-- endinject -->

<!-- Custom js for this page-->
<script src="/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="/dashboard/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js"></script>

<script src="/dashboard/js/shared/data-table.js"></script>
<script src="/dashboard/js/demo_1/dashboard.js"></script>
<!-- End custom js for this page -->

<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [8, 16, 32, 64, -1],
            [8, 16, 32, 64, "All"]
        ],
        "order": [
            [0, 'desc']
        ]
    });
</script>



<script>
    $(document).ready(function() {

        $('#deleteCategoryBtn').click(function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            console.log(category_id);
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');

        });
    });
</script>
</body>

</html>
