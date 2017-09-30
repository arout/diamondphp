<div class="white-row">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="center-box">
                <div class="row">
                    <p class="lead text-center"> If you prefer downloading from our repository or wish contribute to the Diamond PHP project, 
                        visit us on <a class="btn btn-xs btn-success" target="_blank" href="https://github.com/arout/diamondphp/"><i class="fa fa-github"></i> GitHub</a> </p>
                    <div class="text-left">
                        {if $email eq ''}
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#modal').modal('show');
                            });
                        </script>
                        <div class="white-row">
                            
                            <legend>
                            <h4>Development Status <span class="badge badge-warning">Alpha</span>
                                <small class="pull-right"><strong>Projected release date:</strong> Jan 1, 2017</small></h4>
                            </legend>

                            <div class="right-container">
                                <h3 class="margin-bottom-25">TASK STATUS <small class="pull-right"><em>(as of {$today|date_format})</em></small></h3>
                                <div class="progressbar">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" data-animate-width="100%">
                                            <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="600"><strong>Conception:</strong> 
                                            <span class="pull-right" style="padding-right: 40px;">100% - Complete</span></span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" data-animate-width="100%">
                                            <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="600"><strong>Design:</strong> 
                                            <span class="pull-right" style="padding-right: 40px;">100% - Complete</span></span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" data-animate-width="97%">
                                            <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="600"><strong>Code:</strong>  
                                            <span class="pull-right" style="padding-right: 40px;">97% - Near Completion</span></span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" data-animate-width="81%">
                                            <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="600"><strong>Testing:</strong> 
                                            <span class="pull-right" style="padding-right: 40px;">81% - In Progress</span></span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" data-animate-width="38%">
                                            <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="600"><strong>Documentation:</strong> 
                                            <span class="pull-right" style="padding-right: 40px;">38% - To Do</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                
                        <div class="divider styleColor"><p><br></p></div>
                        <h2>Notify me <strong>as soon as</strong> download is available</h2>
                        <form method="post" action="" class="form-inline" role="form">
                        <div class="form-group has-feedback">
                        <div class="input-group">

                            <input type="email" class="form-control pull-left" name="email" id="s" required placeholder="Email Address" />
                            <i class="fa fa-envelope-o form-control-feedback"></i>
                            <!-- <span class="input-group-addon"><i class="fa fa-envelope-o form-control-feedback"></i></span> -->
                            <button class="btn btn-primary">Subscribe</button>
                        </div>
                        </div>
                            
                        </form>
                        {else}
                        <div id="modal" class="alert alert-success"> 
                            <i class="fa fa-check-circle"></i> An email will be sent to you at <strong>{$email}</strong> as soon downloads become available. 
                        </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
