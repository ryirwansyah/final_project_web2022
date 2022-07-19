</div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Reeds Story
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/_admins/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/node-waves/waves.min.js"></script>
		<script src="<?= base_url() ?>assets/_admins/assets/js/app.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/js/datatable/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/js/datatable/dataTables.bootstrap5.min.js"></script>
		<!-- Sweet Alert -->
		<script src="<?= base_url() ?>assets/_admins/assets/libs/sweetalert2/sweetalert2.min.js"></script>
		<!-- toastr plugin -->
		<script src="<?= base_url() ?>assets/_admins/assets/libs/toastr/build/toastr.min.js"></script>

        <?php @$script ? $this->load->view($script):''; ?>
    </body>
</html>
