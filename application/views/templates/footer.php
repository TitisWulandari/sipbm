</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Sistem Informasi Perawatan Benda-Benda Museum Soesilo Soedarman <?= date('Y'); ?> </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js">
</script>

<script>
    <?php if ($this->session->userdata('level') == "admin") { ?>
        $(document).ready(function() {

            $(".pusat").remove();
            $(".pengelola").remove();
            $(".petugas").remove();

        });
    <?php }

    if ($this->session->userdata('level') == "pihak_pusat") { ?>

        $(document).ready(function() {
            $(".admin").remove();
            $(".pengelola").remove();
            $(".jenis_koleksi").remove();
            $(".petugas").remove();

        });

    <?php } else if ($this->session->userdata('level') == "pengelola") { ?>

        $(document).ready(function() {

            $(".admin").remove();
            $(".pusat").remove();
           
            $(".petugas").remove();


        });
    <?php } else if ($this->session->userdata('level') == "petugas_perawatan") { ?>

        $(document).ready(function() {

            $(".admin").remove();
            $(".pusat").remove();
            $(".pengelola").remove();
            $(".jenis_koleksi").remove();
			$(".tess").remove();

        });

    <?php } else {
    }; ?>
</script>

</body>

</html>