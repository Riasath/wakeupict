<div class="content-wrapper">    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Medicine</h3>
                    </div>
                    <form method="POST" action="d_medicine/addNewMedicine">
                        <div class="box-body" id="dynamicInput[0]">
                            <div class="form-group" id="formulario" >
                                Entry 1:<br> <input class="from-control" type="text" name="name[]" value='<?php
                                if (!empty($medicine->name)) {
                                    echo $medicine->name;
                                }
                                ?>'> 
                                <input type="button" value="+ Add New Entry" onClick="addInput();">
                            </div>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($medicine->id)) {
                                echo $medicine->id;
                            }
                            ?>'>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var counter = 1;
    var dynamicInput = [];

    function addInput() {
        var newdiv = document.createElement('div');
        newdiv.id = dynamicInput[counter];
        newdiv.innerHTML = " Entry: " + (counter + 1) + "<div class=''> <input type='text' class='' name='name[]'> <input type='button' value='-' onClick='removeInput(" + dynamicInput[counter] + ");'> </div>";
        document.getElementById('formulario').appendChild(newdiv);
        counter++;
    }

    function removeInput(id) {
        var elem = document.getElementById(id);
        return elem.parentNode.removeChild(elem);
    }
</script>



