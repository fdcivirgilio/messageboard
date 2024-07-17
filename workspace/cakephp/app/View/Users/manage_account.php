<?php

    foreach($user as $user_details){

        ?>


            <div class="container-fluid py-4">

                <h1 class = "fw-bold text-center">Manage Account</h1>

                <div class="row" style = "height: 30vh">

                    <div class = "order-2 ps-0 p-4">

                        <div class="p-2">
                            <?php echo $this->Form->create(null, ['type' => 'file']); ?>
                            <?php 
                                echo $this->Form->input('name', 
                                    [
                                        'type' => 'text', 
                                        'label' => 'Name', 
                                        'value' => $user_details['name'], 
                                        'class' => 'form-control mb-2'
                                    ]
                                ); 
                            ?>
                            <div class = "real-birth-date d-none">
                                <?php 
                                
                                echo $this->Form->input('birthdate', 
                                    [
                                        'type' => 'date', 
                                        'label' => 'Birthdate'
                                    ]
                                ); 
                                
                                ?>
                            </div>

                            <div class="row user-view-birth-date">

                                <label>
                                    Birthdate
                                </label>

                                <div class="input-group mb-3">

                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar"></i></span>
                                    <input type="text" class="form-control" id="inputDate" name="inputDate" value = "<?php echo $user_details['birthdate']; ?>">
                                </div>
                                
                            </div>

                            <div class="gender-box mb-2">
                                <label for="">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" data-gender = "male">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" data-gender = "female" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Female
                                    </label>
                                    
                                </div>
                            </div>

                            <div class="real-gender-box">

                                <?php echo $this->Form->input('gender', ['type' => 'text', 'id' => 'genderInput', 'label' => 'Gender', 'value' => $user_details['gender']]); ?>

                            </div>

                            <?php
                                echo $this->Form->input('hobby', array(
                                    'type' => 'textarea',
                                    'label' => 'Hobby', // Optional: Custom label
                                    'rows' => '5', // Optional: Number of visible rows
                                    'cols' => '30', // Optional: Number of visible columns
                                    'class' => 'form-control', // Optional: CSS class
                                    'value' => $user_details['hobby']
                                ));
                            ?>

                            <div class="update-box-for-btn text-center my-4">

                                <?php echo $this->Form->button(__('Update')); ?>

                            </div>

                            <?php echo $this->Form->file('profile_picture', ['class' => 'd-none']); ?>

                            <?php echo $this->Form->end(); ?>
                        </div>

                        
            

                    </div>

                    <div class="order-1 p-4 h-100 text-center">

                        <div class="img-box text-center d-flex justify-content-center" id = "">

                            <img 
                                src="
                                    <?php echo $profile_picture; ?>
                                " 
                                id="profilePicturePreview" 
                                alt="Default Profile Picture"
                                style="height: 10vh"
                            >
                            
                        </div>

                        <div class="img-box-upload-btn py-3">

                            <button class = "btn btn-dark" data-bs-toggle="modal" data-bs-target="#uploadImageModal">Upload Pic</button>

                        </div>

                        
                    </div>

                </div>





            </div>

                

        <?php


    }
?>

<!-- Modal -->
<div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <h2 class = "text-center mb-4">Upload New Profile Picture</h2>

        <div class="img-box-upload-within-modal py-3">
            <?php echo $this->Form->create(null, ['type' => 'file', 'id' => 'uploadFormForImageSelect']); ?>
            <?php echo $this->Form->file('profile_picture', ['id' => 'profilePictureInput', 'class' => 'form-control']); ?>

            <div class="form-control border-0 text-center my-4">

                <?php echo $this->Form->button(__('Preview Image'), ['type' => 'button', 'id' => 'uploadButton', 'class' => 'btn btn-secondary']); ?>

            </div>
            <?php echo $this->Form->end(); ?>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
    //for the profile picture
    // This script is used to preview the selected image before uploading it
    //app/view/users/manage_account.php

    document.getElementById('uploadButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        var input = document.getElementById('profilePictureInput');
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('profilePicturePreview');
                output.src = dataURL;
                output.style.display = 'block';

                // Simulate the selection of the same file in UserProfilePicture
                var userProfileInput = document.getElementById('UserProfilePicture');
                userProfileInput.files = input.files; // This may not work due to browser restrictions

                $("#uploadImageModal .btn-close").trigger("click");

            };

            reader.readAsDataURL(file);
        } else {
            alert('Please select a file to upload.');
        }
    });

    //update the birthdate on load (.real-birth-date) - hidden

    $(function(){

        let birthdate = getDateArrayFromDateString('<?php echo $user_details['birthdate']; ?>');
    
        $("#UserBirthdateMonth option").filter(function() {
            return $(this).text() === birthdate['month'];
        }).prop('selected', true);
        $("#UserBirthdateDay").val(padWithZero(birthdate['day']));
        $("#UserBirthdateYear").val(birthdate['year']);
        
    })

    //update birthdate on change of the date input

    $("#inputDate").on('change', function(){

        let birthdate = getDateArrayFromDateString($(this).val());

        $("#UserBirthdateMonth option").filter(function() {
            return $(this).text() === birthdate['month_word'];
        }).prop('selected', true);
        $("#UserBirthdateDay").val(padWithZero(birthdate['day']));
        $("#UserBirthdateYear").val(birthdate['year']);

    })

    //update gender on load

    $(function() {
        let gender = '<?php echo $user_details['gender']; ?>';
        if (gender === 'male') {
            $("input[type='radio'][data-gender='male']").prop('checked', true).trigger("click");
        } else if (gender === 'female') {
            $("input[type='radio'][data-gender='female']").prop('checked', true).trigger("click");
        }
    });

    //update gender on change

    $(function(){
        $("input[type='radio']").on('click', function(){

            $("#genderInput").val($(this).data('gender'));

        });
    })

    //date picker

    $(function(){
        $("#inputDate").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:2100' // Adjust the year range as needed
        });
    });

    
</script>

