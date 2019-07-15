<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="https://facebook.com/dmons02">Mochammad Nurjaman</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>
  <div class="modal" id="modal-delete1">
    <div class="modal-dialog modal-sm modal-danger">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-info-circle"></i> Hapus!</h4>
          <span>Hapus data ini dari database?</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
          <a href="#" id="btn-yes" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>



  <!-- JS Image -->
      <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/galeri/js/bootstrap.js"></script>
    
    <!-- jQuery Lightbox -->
    <script src="<?php echo base_url() ?>public/assets/galeri/js/lightbox-plus-jquery.min.js"></script>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>public/admin/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/moment.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/js/stisla.js"></script>


  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>public/admin/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url() ?>public/admin/modules/jquery-ui/jquery-ui.min.js"></script>
  

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>public/admin/js/page/modules-datatables.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>public/admin/js/sweet.js"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>public/admin/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>public/admin/js/custom.js"></script>

  <?php 
         if($this->session->flashdata('pesan')<>''){
             echo $this->session->flashdata('pesan'); 
         
         }
      ?>

  <script>
    function detail_reklame(param) 
    {
      $('div#modal-id').modal('show');
    }
    
    function setMapToForm(latitude, longitude) 
    {
      $('input[name="latitude"]').val(latitude);
      $('input[name="longitude"]').val(longitude);
    }
    $(document).ready(function() {
      var base_url = '<?php echo base_url() ?>';
      $("#sidebar-sticker").sticky({topSpacing:70});
      <?php if($this->session->flashdata('message')) : ?>
      $('div#modal-alert').modal('show');
      <?php endif; ?>

      $('a.delete-reklame').on('click', function() 
      {
        var ID = $(this).data('id');

        $('#modal-delete').modal('show');
        $('a#btn-yes').attr('href', base_url + 'admin/deletereklame/' + ID);
      });
    });



     function updateProfile(userId){
      swal({
        title: "Update Profl",
        text: "Apakah anda yakin untuk mengubah data Profil ? Pastikan data anda benar.",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          window.location.href = "<?php echo base_url() ?>user/updateProfile/"+userId;
        } else {
          swal("Anda membatalkan perubahan.");
        }
      });
  }



     function acceptUser(userId){
      swal({
        title: "Update Status",
        text: "jika iya maka User dapat Order Reklame",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          window.location.href = "<?php echo base_url() ?>admin/acceptUser/"+userId;
        } else {
          swal("Anda tidak jadi Accept User ini !");
        }
      });
  }

   function declineUser(userId){
      swal({
        title: "Update Status",
        text: "Jika iya maka User tidak dapat Pesan Reklame",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          window.location.href = "<?php echo base_url() ?>admin/declineUser/"+userId;
        } else {
          swal("Anda tidak jadi Decline User ini !");
        }
      });
  }

     function acceptOrder(no_invoice){
      swal({
        title: "Update Status",
        text: "jika iya maka akan dimunculkan pada client",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          window.location.href = "<?php echo base_url() ?>detail/acceptOrder/"+no_invoice;
        } else {
          swal("Anda tidak jadi Accept Reklame ini ");
        }
      });
  }

  function declineOrder(no_invoice){
      swal({
        title: "Update Status",
        text: "jika iya maka akan dihilangkan pada client",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          window.location.href = "<?php echo base_url() ?>detail/declineOrder/"+no_invoice;
        } else {
          swal("Anda tidak jadi Decline Reklame ini ");
        }
      });
  }

   function hapus_order(no_invoice){
      swal({
        title: "Hapus Order ? ",
        text: "jika iya maka semua foto akan ikut terhapus",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?php echo base_url() ?>detail/deleteorder/"+no_invoice;
        } else {
          swal("Anda tidak jadi menghapus Order ini ");
        }
      });
  }

    function hapus_reklame(id){
      swal({
        title: "Hapus Reklame ? ",
        text: "jika iya maka semua foto akan ikut terhapus",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?php echo base_url() ?>admin/deletereklame/"+id;
        } else {
          swal("Anda tidak jadi menghapus Reklame ini ");
        }
      });
  }

  function hapus_semua_gambar(id){
      swal({
        title: "Hapus semua ? ",
        text: "jika iya maka semua gambar project ini akan terhapus",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?php echo base_url() ?>admin/hapus_semua_gambar/"+id;
        } else {
          swal("Anda tidak jadi menghapus semua gambar");
        }
      });
  }

  function hapus_gambar(id_foto,id_reklame){
      swal({
        title: "Hapus gambar ini  ? ",
        text: "jika iya maka gambar ini akan terhapus",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?php echo base_url() ?>admin/hapus_gambar/"+id_foto+"/"+id_reklame;
        } else {
          swal("Anda tidak jadi menghapus client");
        }
      });
  }
  </script>


</body>
</html>