<!-- footer start -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="footer-content col-md-4">
            <h4>Company Info</h4>
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url() .'about-us'; ?>">About Us</a></li>
			  <li><a href="#">Pricing</a></li>
			  <li><a href="<?php echo base_url() .'blog'; ?>">Blog</a></li>
            </ul>
          </div>
          <div class="footer-content col-md-4">
            <h4>Learn More</h4>
            <ul>
              <li><a href="#">Licensing</a></li>
              <li><a href="<?php echo base_url() .'term-conditions'; ?>">Terms of Use</a></li>
              <li><a href="<?php echo base_url() .'privacy-policy'; ?>">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="footer-content col-md-4">
              <h4>Need Help</h4>
              <ul>
                <li><a href="<?php echo base_url() .'contact-us'; ?>">Contact Us</a></li>
                <li><a href="<?php echo base_url() .'faq'; ?>">FAQ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12 text-center">
            <p class="copy-line">&copy; qusetblinkstock.com. All right reserved</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo config_item('asset'); ?>js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo config_item('asset'); ?>js/popper.min.js"></script>
    <script src="<?php echo config_item('asset'); ?>js/bootstrap.min.js"></script>
  </body>
</html>