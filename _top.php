 <ul>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> (+000) 009 455 4088</li>
                        <li><i class="fa fa-envelope-o list-icon" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                        <li><i class="fa fa-user list-icon" aria-hidden="true"></i>
                            <?php  echo $_SESSION['ssn_user']['username'];?>
                           [<?php  echo $_SESSION['ssn_user']['role_code'];?>]
                        </li>
                        <li><i class="fa fa-arrow-left list-icon" aria-hidden="true"></i><a href="logout.php">Logout</a></li>

                    </ul>