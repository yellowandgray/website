<!DOCTYPE html>
<?php
require_once '../include/master.php';
require_once '../include/common.php';
$object = new master();
$result1 = $object->getAllTitle();
$titles = [];
if ($result1['error'] === false) {
    $titles = $result1['data'];
}
?>
<html lang="en">
    <?php include "head.php"; ?>
    <body class="no-skin" onload="listPageContent();">
        <?php include "header.php"; ?>
        <div class="main-container ace-save-state" id="main-container">
            <?php
            $active = "banner";
            include "menu.php";
            ?>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Page Content</li>
                        </ul><!-- /.breadcrumb -->
                    </div>
                    <div class="page-content">
                        <div class="page-header">
                            <h1>Page Content<small><i class="ace-icon fa fa-angle-double-right"></i></small></h1>
                        </div><!-- /.page-header -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="space-6"></div>
                                    <form class="form-horizontal" id="add_pagecontent">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="sub_title_id">Sub Title : </label>
                                            <div class="col-sm-9">
                                                <select id="sub_title_id" name="sub_title_id" class="input-medium" data-placeholder="Click to Choose...">
                                                    <option value="">--Select Sub Page--</option>
                                                    <?php
                                                    foreach ($titles as $title) {
                                                        echo '<option value="' . $title['ID'] . '">' . $title['title'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="bannercontent">Content : </label>

                                            <div class="col-sm-9">
                                                <textarea id="content" name="content" placeholder="Content" class="col-xs-10 col-sm-5"></textarea>
                                            </div>
                                        </div>
                                        <div class="space-2"></div><br/><br/>
                                        <div class="form-group">
                                            <div class="clearfix align-center">
                                                <button type="submit" class="width-35 btn btn-sm btn-primary">
                                                    <span class="bigger-110">Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.row -->
                            <div class="hr hr32 hr-dotted"></div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="pagecontent_table"></div>
                                </div>
                            </div>
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
        <?php include 'footer.php'; ?>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->
    <?php include "basic_js.php"; ?> 
    <div id="update_pagecontents" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Service Category</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="update_pagecontent">
                        <input type="hidden" id="update_pagecontent_id" name="update_pagecontent_id" value="" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="sub_title_id">Sub Title : </label>
                            <div class="col-sm-9">
                                <select id="update_sub_title_id" name="update_sub_title_id" class="input-medium" data-placeholder="Click to Choose...">
                                    <option value="">--Select Sub Page--</option>
                                    <?php
                                    foreach ($titles as $title) {
                                        echo '<option value="' . $title['ID'] . '">' . $title['title'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="update_content">Content : </label>

                            <div class="col-sm-9">
                                <textarea id="update_content" name="update_content" placeholder="Content" class="col-xs-10 col-sm-5"></textarea>
                            </div>
                        </div>
                        <div class="space-2"></div><br/><br/>
                        <div class="form-group">
                            <div class="clearfix align-center">
                                <button type="submit" class="width-35 btn btn-sm btn-primary">
                                    <span class="bigger-110">Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
</body>
</html>