<?php
/**
 * Student Page
 */ 
?>
<div id="students_body">
    <?= $this->include('student/student_body'); ?>
</div>
<script>
    //to Add
    function addStudent()
    {
      $.post("<? echo WEBROOT; ?>student/addStudent",function(data){
          loadModal(data);
      });
    }

    /*function insertStudent()
    {
        var params = $('#add_student').serializeArray();
        $.post('<? echo WEBROOT; ?>student/insertStudent',params,function(data){
            $('.modal-dialog').parent().html(data);
        });
    }*/

    
    function insertStudent()
    {
        $.ajax({
            url: '<? echo WEBROOT; ?>student/insertStudent',
            type: "POST",
            data:  new FormData(document.forms['add_student']),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                loadModal(data);
            },
        });
    }


    function editStudent(id)
    {
        $.get('<? echo WEBROOT; ?>student/editStudent',{'id':id},function(data){
            loadModal(data);
        });
    }
</script>
