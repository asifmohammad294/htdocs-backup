<div class="menu" id="open-navbar1">
            <ul class="list">
              <li><a href="<?php echo url('/'); ?>/profiles">Dashboard</a></li>
              
                <li><a href="<?php echo url('/'); ?>/view_profile/<?php echo Session::get('user_id'); ?>">My Profile</a></li>
                <li><a href="<?php echo url('/'); ?>/listing">Discover Matches</a></li>
                <li><a href="<?php echo url('/'); ?>/introduction_received">Inbox </a></li>
                <li><a href="<?php echo url('/'); ?>/plan">Buy Plan </a></li>
                <li><a href="#"><i class="fa fa-bell"></i> </a></li>
                <li>
                  <a href="#" onclick="myFunction()">
                    <div class="profile_img">
                      <img src="<?php echo url('/'); ?>/public/assets/images/footer-logo.png" alt="profile">
                    </div>
                    <div id="myDIV" class="dropdown-content" style="display: none;">
                        <a href="<?php echo url('/'); ?>/logout">Logout</a>
                        
                    </div>
                  </a>
              </li>
            </ul>
          </div>