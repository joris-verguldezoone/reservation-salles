<!DOCTYPE html>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">La Cage D'escalier</h5>

<?php  if(isset($_SESSION['connected'])){
    
                echo "<form id='deco' action='' method='POST'>
                <input type='submit' id='deconnexion' name='disconnect' value='Déconnexion'>
                </form>";
                if(isset($_POST['disconnect'])){
                    session_destroy();
                }
}  
?>
            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

   

            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <img src="<?php echo $img_signature; ?>"> © 2021 Copyright:    
            <p class="signature_font"> HARDJOJO </p>
        
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html> 