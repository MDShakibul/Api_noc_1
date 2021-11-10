<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        <form action="{{url('info/create')}}" method="" enctype="multipart/form-data" id="noc_applicant_comment_save">
        @csrf
        <label for="cars">NOC Status: </label>

        <select name="noc_status" id="noc_status">
            <option value="1">NOC Issue</option>
            <option value="2">Loan Case</option>
            <option value="3">Reject</option>
        </select><br><br>

        <label>NOC File:</label>

        <input id="noc_issued_files" class="noc_issued_files" name="noc_issued_files" type="file"/>

        <input id="application_number" class="application_number" name="noc_appication_number" value="100" type="hidden"/>

        <input id="applicant_name" class="applicant_name" name="noc_applicant_name" value="shakib" type="hidden"/>

        <input id="contact_no" class="contact_no" name="noc_applicant_contact_no" value="01992632069" type="hidden"/>

        <input id="applicant_mausa_name" class="applicant_mausa_name" name="noc_applicant_mausa_name" value="khulna" type="hidden"/>

        <input id="noc_applicant_address" class="noc_applicant_address" name="noc_applicant_address" value="khulna add" type="hidden"/>

        <input id="noc_issue_date" class="noc_issue_date" name="noc_issue_date" value={{\Carbon\Carbon::now()}} type="hidden"/>

        <button type="submit" id="submit">Submit</button>

        </form>

        {{-- <img src="image/user_form_image_10-11-2021-5-20-10_9088.PNG" alt=""> --}}

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>



<script>
    $(document).ready(function () {
        $('#noc_applicant_comment_save').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: $(this).attr('action'),
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){

                    /* console.log("success");
                    console.log(data); */

                    var noc_status = $("#noc_status").val();
                    console.log(noc_status);

                    var application_number = $("#application_number").val();
                    console.log(application_number);

                    var applicant_name = $("#applicant_name").val();
                    console.log(applicant_name);

                    var contact_no = $("#contact_no").val();
                    console.log(contact_no);

                    var applicant_mausa_name = $("#applicant_mausa_name").val();
                    console.log(applicant_mausa_name);

                    var noc_issue_date = $("#noc_issue_date").val();
                    console.log(noc_issue_date);

                    var noc_applicant_address = $("#noc_applicant_address").val();
                    console.log(noc_applicant_address);

                    /* var noc_issued_files = val(data.noc_file); */
                    var noc_issued_files = data.noc_file;
                    //var noc_issued_files = $('.noc_issued_files').val();

                    //var noc_issued_files = $('.noc_issued_files').prop('files')[0];
                    console.log(noc_issued_files);

                    $.ajax({
                        url : "{{ url('http://localhost/cp/public/api/save') }}"+'?noc_status='+ noc_status+'&application_number='+application_number+'&applicant_name='+applicant_name+'&contact_no='+contact_no+'&applicant_mausa_name='+applicant_mausa_name+'&noc_issue_date='+noc_issue_date+'&noc_issue_date='+noc_issue_date+'&noc_applicant_address='+noc_applicant_address+'&noc_issued_files='+noc_issued_files,
                        method: 'POST',
                        dataType: 'json',
                        success: function(){

                        },
                    });
                }
            });
        }));
    });
</script>

</body>
</html>
