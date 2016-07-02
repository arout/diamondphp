<div class="white-row">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="center-box">
                <div class="row">
                    <p class="lead text-center"> If you prefer downloading from our repository or wish contribute to the kW Fusion project, 
                        visit us on <a class="btn btn-xs btn-success" target="_blank" href="https://github.com/arout/diamondphp/"><i class="fa fa-github"></i> GitHub</a> </p>
                    <div class="text-left">
                        <?php
							if( ! isset($_POST['email']))
							{ ?>
                        <script type="text/javascript">
								$(document).ready(function () {
									$('#myModal').modal('show');
								});
							</script>
                        <div class="white-row">
                            
                            <legend>
                            <h4>Project Status <span class="badge">Beta</span><br>
                                <small>Projected release date: Jan 18, 2015</small></h4>
                            </legend>

                            
                            <div class="row text-left">
                                <div class="col-md-12">
                                    <div class="progress-bars">
                                        <div class="progress-label"> <span>Conception</span> </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-appear-progress-animation="100%"> <span class="progress-bar-tooltip">100%</span> </div>
                                        </div>
                                        <div class="progress-label"> <span>Design</span> </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-appear-progress-animation="100%" data-appear-animation-delay="300"> <span class="progress-bar-tooltip">100%</span> </div>
                                        </div>
                                        <div class="progress-label"> <span>Code</span> </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="93%" data-appear-animation-delay="300"> <span class="progress-bar-tooltip">93%</span> </div>
                                        </div>
                                        <div class="progress-label"> <span>Testing</span> </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" data-appear-progress-animation="69%" data-appear-animation-delay="300"> <span class="progress-bar-tooltip">69%</span> </div>
                                        </div>
                                        <div class="progress-label"> <span>Documentation</span> </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" data-appear-progress-animation="28%" data-appear-animation-delay="300"> <span class="progress-bar-tooltip">28%</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                
                        <div class="divider styleColor"><!-- divider --> 
                            <i class="fa fa-leaf"></i> </div>
                        <h2>Notify me <strong>as soon as</strong> download is available</h2>
                        <form method="post" action="" class="input-group">
                            <input type="email" class="form-control" name="email" id="s" required placeholder="Email Address" />
                            <span class="input-group-btn">
                            <button class="btn btn-primary"><i class="fa fa-envelope-o"></i></button>
                            </span>
                        </form>
                        <?php } else { 

							$host = "localhost";						// Most users should leave this set to localhost
							$dbname = "brightid_notifications";			// Name of database
							$db_user = "brightid";						// Username to connect to database
							$db_pass = "arout77!";						// Database password
		
							## Setup PDO connection
							try {  
							  $db = new PDO("mysql:host=$host;dbname=$dbname", $db_user, $db_pass); 
							  $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false ); 
							  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
							}  
							catch(PDOException $e) {  
								
								file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
							}
							
							$email = $_POST['email'];
							$q = "INSERT INTO notify_kw_fusion_release(email, timestamp) VALUES(?, ?)";
							$s = $db->prepare($q);
							$s->execute(array($email, time()));

						    $subject = 'Someone is waiting for kW Fusion';
						    $message = 'Please send a notification to '.$email.' as soon as kW Fusion is ready!';
						    // message lines should not exceed 70 characters (PHP rule), so wrap it
						    $message = wordwrap($message, 70);
							$from = "From: kW Fusion\n";
						    // send mail
						    @mail("andrew_rout@yahoo.com",$subject,$message,$from);

							?>
                        <div class="alert alert-success"> <i class="fa fa-check-circle"></i> An email will be sent to you at
                            <?= $_POST['email']; ?>
                            as soon downloads become available. </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
