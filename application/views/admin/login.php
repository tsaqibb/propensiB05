<div id="container">
            <div class="shell">                
                <!-- Message Error -->
                
                <br>
                <!-- Main -->
                <div id="main">
                    <div class="cl">&nbsp;</div>

                    <!-- Content -->
                    <div id="content">
                        <!-- Box -->
                        <div class="box">
                            <!-- Box Head -->
                            <div class="box-head">
                                <h2>Login</h2>
                            </div>
                            <!-- End Box Head -->

                            <form action="<?php echo base_url(); ?>user/login_submit/admin" method="post">

                                <!-- Form -->
                                <div class="form">
                                    <p>
                                        <label>Username</label>
                                        <input type="text" class="field" id="email" name="email">
                                    </p>
                                    <p>
                                        <label>Password</label>
                                        <input type="password" class="field" id="password" name="password">
                                    </p>

                                </div>
                                <!-- End Form -->

                                <!-- Form Buttons -->
                                <div class="buttons">
                                    <input type="submit" class="button" value="submit">
                                </div>
                                <!-- End Form Buttons -->
                            </form>
                        </div>
                        </div>
                    </div>

                    <div class="cl">&nbsp;</div>			
                </div>
                <!-- Main -->
            </div>