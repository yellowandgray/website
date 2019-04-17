<?php
session_start();
include('dbcon.php');
if (isset($_SESSION["arise_franchise"])) {

} else {
    header("Location: http://myarisenshine.com/eshine/staff/index.php?errMsg=No Session Exist !!");
}

if (isset($_GET['frm']) && $_GET['frm'] == 'launch') {
    $answ1 = "select * from answeekly order by id desc limit 0,1";
    $answ_res = mysqli_query($db, $answ1);
    $answc = mysqli_num_rows($answ_res);
    $answ = mysqli_fetch_assoc($answ_res);
    if ($answc == 1) {
        ?>
        <script>
            window.location.href = "answ-edit.php?id=<?php echo $answ['id'] ?>";
        </script>
        <?php
    }
}
?>
<html>
    <head>
        <title>	Arise 'n' Shine Weekly Update </title>
        <link rel="stylesheet" href="style.css" media="all" />
        <script type="text/javascript" src="js/jquery-1.3.2.js" ></script>
        <script type="text/javascript" src="js/ajaxupload.3.5.js" ></script>
        <script type="text/javascript" src="js/operations.js"></script>
        <script language="javascript" type="text/javascript">
    $(function ()
    {

        var btnUpload = $('#upload');
        var status = $('#status');
        new AjaxUpload(btnUpload, {
            action: 'upload-file.php',
            name: 'uploadfile',
            onSubmit: function (file, ext)
            {
                if (!(ext && /^(doc|docx|xls|xlsx|txt|pdf|ppt|pptx|zip|rar|png|jpg|jpeg)$/.test(ext))) {
                    // extension is not allowed
                    status.text('Only Word,Excel,PDF,ZIP,RAR,jpg,png and Text files are allowed');
                    return false;
                }
                status.text('Uploading...');
            },
            onComplete: function (file, response)
            {

                //On completion clear the status
                status.text('');
                var c = "";
                var c = $('#upd_count').val();
                c++;
                $('#upd_count').val(c);
                var f = "";
                f = $('#upd_files').val();
                f += file + ",";
                $('#upd_files').val(f);
                f = "'" + file + "'";
                //Add uploaded file to list
                var bb = response.substr(0, 7)
                var idd = response.replace('success', ' ');
                var idb = idd.replace(/^\s*|\s*$/g, '');
                if (bb === "success")
                {

                    $('<div id="f_' + c + '"></div>').appendTo('#files').html('<span>' + file + '</span>&nbsp;&nbsp;<a href="javascript:void(0)" onClick="remove_attach(' + f + ',' + c + ');">Remove</a>').addClass('success');

                } else
                {
                    $('<span></span>').appendTo('#files').text(response).addClass('error');
                }
            }});
    });



    function remove_attach(cur, v)
    {

        var newval = new Array();
        var v1 = $("#upd_files").val();
        var va = v1.split(',');
        var k = 0;
        for (i = 0; i < va.length; i++) {
            if (cur != va[i])
            {
                newval[k] = va[i];
                k++;
            }
        }
        var n = newval.join();
        $("#upd_files").val(n);
        $("#f_" + v).remove();

    }

        </script>

    </head>
    <body oncopy="return false" oncut="return false" onpaste="return false">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
    $(document).ready(function () {
        $('window').bind('copy paste', function (e) {
            e.preventDefault();
        });
    });
        </script>

        <div class="box2">
            <div class="title">
                <center> <img src="answeekly.jpg" /> </center>
            </div>

            <!--<h3 class="h31">PLAY GROUP ATTENDANCE</h3>-->
            <form action="answ.php" method="POST" enctype="multipart/form-data" onSubmit="return eval();">
            <!--<table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="pink">
                    <td><span>Children absent more than a day</span><br><input type="text" name="pgat1" ></td>
                    <td><span>Teachers absent more than a day</span><br><input type="text" name="pgat2" ></td>
                    <td><span>Nannies absent more than a day</span><br><input type="text" name="pgat3" ></td>
                    </tr>
            </table>

            <h3 class="h33">PRESCHOOL ATTENDANCE</h3>
            <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="sky">
                    <td><span>Children absent more than a day</span><br><input type="text" name="psat1" ></td>
                    <td><span>Teachers absent more than a day</span><br><input type="text" name="psat2" ></td>
                    <td><span>Nannies absent more than a day</span><br><input type="text" name="psat3" ></td>
                    </tr>
            </table>

            <h3 class="h34">EXTENDED CARE ATTENDANCE (MyBeeHive)</h3>
            <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="green">
                    <td><span>Children absent more than a day</span><br><input type="text" name="ecat1" ></td>
                    <td><span>Teachers absent more than a day</span><br><input type="text" name="ecat2" ></td>
                    <td><span>Nannies absent more than a day</span><br><input type="text" name="ecat3" ></td>
                    </tr>
            </table>

            <h3 class="h32">ADMIN ATTENDANCE</h3>
            <table width="100%" cellpadding="0" cellspacing="0" class="border">
                    <tr class="tan">
                    <td><span>Children absent more than a day</span><br><input type="text" name="adat1" ></td>
                    <td><span># of days van arrived late</span><br><input type="text" name="adat2" ></td>
                    <td><span>Attendance comments</span><br><input type="text" name="adat3" ></td>
                    </tr>
            </table>-->

                <h3 class="h31">PLAY GROUP</h3>
                <table cellpadding="0" cellspacing="0" class="w100 pink">
                    <tr>
                        <td class="b4 border2">
                            <span>HIGHLIGHTS</span><br>
                            <textarea name="pghigh" ></textarea>
                        </td>
                        <td class="b4">
                            <span>CHALLENGES</span><br>
                            <textarea name="pgchal" ></textarea>
                        </td>
                    </tr>
                </table>

                <h3 class="h33">PRESCHOOL</h3>
                <table cellpadding="0" cellspacing="0" class="w100 sky">
                    <tr>
                        <td class="b4 border2">
                            <span>HIGHLIGHTS</span><br>
                            <textarea name="pshigh" ></textarea>
                        </td>
                        <td class="b4">
                            <span>CHALLENGES</span><br>
                            <textarea name="pschal" ></textarea>
                        </td>
                    </tr>
                </table>

                <h3 class="h34">EXTENDED CARE</h3>
                <table cellpadding="0" cellspacing="0" class="w100 green border">
                    <tr>
                        <td class="b4 border2">
                            <span>HIGHLIGHTS</span><br>
                            <textarea name="echigh" > </textarea>
                        </td>
                        <td class="b4">
                            <span>CHALLENGES</span><br>
                            <textarea name="ecchal" ></textarea>
                        </td>
                    </tr>
                </table>

                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td class="b1">
                            <span>General Challenges</span><br>
                            <br>
                            <textarea name="challenges" onClick="if (this.value == '(Any challenges faced with the activities, curriculum, administration, parents, staff, children, transportation, suppliers, corporate or other work related challenges. If there are no challenges, just say none)') {
                                        this.value = ('')
                                    }" onBlur="if (this.value == '') {
                                                this.value = '(Any challenges faced with the activities, curriculum, administration, parents, staff, children, transportation, suppliers, corporate or other work related challenges. If there are no challenges, just say none)'
                                            }">(Any challenges faced with the activities, curriculum, administration, parents, staff, children, transportation, suppliers, corporate or other work related challenges. If there are no challenges, just say none)</textarea>
                        </td>

                        <td class="b2">
                            <span>Open items</span><br>
                            <br>
                            <textarea name="openitems" onClick="if (this.value == '(Any open items related to curriculum, administration, parents, staff, children, suppliers, corporate, hiring new staff, yourself. If there are no open items, just say none)') {
                                        this.value = ('')
                                    }" onBlur="if (this.value == '') {
                                                this.value = '(Any open items related to curriculum, administration, parents, staff, children, suppliers, corporate, hiring new staff, yourself. If there are no open items, just say none)'
                                            }">(Any open items related to curriculum, administration, parents, staff, children, suppliers, corporate, hiring new staff, yourself. If there are no open items, just say none)</textarea>
                        </td>
                    </tr>

                    <!--<div class="clb"></div>-->
                    <tr>
                        <td class="b1">
                            <span>Important updates</span><br>
                            <br>
                            <textarea name="imptupdates" onClick="if (this.value == '(Update on recruiting, sales, parent request, happy parents, and unhappy parents. If there are no important updates, just say none)') {
                                        this.value = ('')
                                    }" onBlur="if (this.value == '') {
                                                this.value = '(Update on recruiting, sales, parent request, happy parents, and unhappy parents. If there are no important updates, just say none)'
                                            }">(Update on recruiting, sales, parent request, happy parents, and unhappy parents. If there are no important updates, just say none)</textarea>
                        </td>
                        <td class="b2">
                            <span>Attachments</span><br>
                            <br>
                            <h5>(Student Records, Sales Leads, Recruiting, Others - whenever you attach a file please mention the name of the file(s) you are attaching. You will send these files for review every time you update them)</h5>
                            <input type="hidden" id="upd_count" value="1" />
                            <input type="file" id="files" name="files" />
        <!-- <input type="hidden" name="files" id="upd_files" value=""  />
<div id="upload" >Add Attachment</div><span id="status"></span>
<div id="files"></div>-->
                        </td>
                    </tr>
                </table>

                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="sky"><td><input type="text" name="email" value="Enter email address. Enter comma  for more than one email address" onClick="if (this.value == 'Enter email address. Enter comma  for more than one email address') {
                                this.value = ('')
                            }" onBlur="if (this.value == '') {
                                        this.value = 'Enter email address. Enter comma  for more than one email address'
                                    }" class="eval"><br><div id="evalerror" style="color:red;"></td>
                        <td><input type="submit" value="Save" name="save">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Send" name="send">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/eshine/staff/landingpage.php" style="text-decoration:none;"><input type="button" value="Exit" name="exit"></a></td></tr>
                </table>
            </form>
        </div>
        <!--<center><a href="ansupdates.php"><h3>Updates Home</h3></a></center>-->

    </body>
</html>