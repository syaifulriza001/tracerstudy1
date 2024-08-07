<footer class="footer">
        <div class="container-fluid ">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <img src="<?= base_url('assets/frontend/img/logo.png')?>" alt="logo.png" class="footer-img">
                    </div>
                    <div class="col-md">
                        <div class="row text-white">
                            <div class="col">
                                <h5>ALAMAT</h5>
                                <hr>
                                <table width="100%">
                                    <tr>
                                        <td width="15%"><i class="fa fa-map-marker"></i></td>
                                        <td>Jalan Karapitan No 116</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col">
                                <h5>KONTAK</h5>
                                <hr>
                                <table width="100%">
                                    <tr>
                                        <td width="15%"><i class="fa fa-envelope"></i></td>
                                        <td>tracerstudyinformatika@unla.ac.id</td>
                                    </tr>
                                    <tr>
                                        <td width="15%"><i class="fa fa-phone"></i></td>
                                        <td>083821354485</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets/temlogin/vendor/jquery/jquery.min.js')?>"></script>
    
    <script>
        $(document).ready(function(){
            if ($('#about').length) {
                $('#pages').addClass('navbargreen');
            }
        });
    </script>
</body>

</html>