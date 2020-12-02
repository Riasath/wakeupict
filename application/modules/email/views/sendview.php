<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Send Email</h3>
              <a href="#">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right"> 
                                    List Of Sent Messages 
                                </button>
                            </div>
                        </a>
            </div>
<div class="panel-body">  
                    <form role="form" class="clearfix" action="email/send" method="post">
                        <label class="control-label">         
                            Send Email To
                        </label>    
                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios1" value="allpatient">
                                All Patient
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="alldoctor">
                                All Doctor
                            </label>
                        </div>
                       
                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="single_patient">
                                Single Patient
                            </label>
                        </div>

                        <div class="radio single_patient">
                            <label>
                               Select patient
                                <select class="form-control m-bot15 js-example-basic-single" name="patient" value=''>
                                    <?php foreach ($patients as $patient) { ?>
                                        <option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option>
                                    <?php } ?> 
                                </select>
                            </label>

                        </div>
                        
                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="other">
                                Others
                            </label>
                        </div>
                        
                         <div class="radio other">
                            <label>
                                Email Address
                               <input type="email" name="other_email" value="" class="form-control">
                            </label>

                        </div>

                        <div class="form-group">
                            <label>Subject
                            <input type="text" class="form-control" name="subject" rows="10">
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Message
                            <textarea class="form-control" name="message" value="" cols="70" rows="10"></textarea>
                            </label>
                        </div>
                        <input type="hidden" name="id" value=''>

                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info col-md-3 pull-right"><i class="fa fa-location-arrow"></i> Send Email</button>
                        </div>

                    </form>
                </div> 
                </div>
            </div>
           </div>
        </section>
    </div>
 


<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>