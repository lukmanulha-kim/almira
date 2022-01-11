<?php  ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>assets/demo/chart-area-demo.js"></script>
        <script src="<?= base_url('assets/') ?>assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>js/datatables-simple-demo.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script type="text/javascript">
            function toast() {
                toastr.success('Are you the 6 fingered man?');
            }
            <?php if (null !==($this->session->flashdata('message'))) { 
                if ($this->session->flashdata('status')==1) {
            ?>
                toastr.success("<?php echo $this->session->flashdata('message'); ?>");
            <?php }else{ ?>
                toastr.error("<?php echo $this->session->flashdata('message'); ?>");
            <?php }} ?>
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').trigger('focus')
            })
            // $(function () {
            //     $('.editMapel').click(function (e) {
            //         e.preventDefault();
            //         $('#modal').modal({
            //             backdrop: 'static',
            //             show: true
            //         });
            //         id = $(this).data('id');
            //         // mengambil nilai data-id yang di click
            //         $.ajax({
            //             url: 'mapel/edit/' + id,
            //             success: function (data) {
            //                 $("input[name='i_id']").val(data.id);
            //                 $("input[name='i_user']").val(data.user);
            //                 $("input[name='i_mapel']").val(data.nama);
            //                 if (data.status=='1') {
            //                     $(':radio[name=i_status][value="1"]').prop('checked', true);
            //                 }else{
            //                     $(':radio[name=i_status][value="0"]').prop('checked', true);
            //                 }
            //             }
            //         });
            //    });
            // }) 
            $(document).ready(function() {
                // Untuk sunting
                $('#editModal').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find('#i_id').attr("value",div.data('id'));
                    modal.find('#i_mapel').attr("value",div.data('mapel'));
                    if (div.data('status')=='1') {
                        $(':radio[name=i_status][value="1"]').prop('checked', true);
                    }else{
                        $(':radio[name=i_status][value="0"]').prop('checked', true);
                    }
                });
            });
        </script>
    </body>
</html>