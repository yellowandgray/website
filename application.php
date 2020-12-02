<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'applications';
    include 'head.php';
    require_once 'api/include/common.php';
    $obj = new Common();
    $application = $obj->selectAll('*', 'application', 'application_id > 0');
    ?>
    <body class="goto-here">


        <!-- END nav -->
        <?php include 'enquiry.php'; ?>
        <section>
            <?php include 'menu.php'; ?>
        </section>

        <div class="hero-wrap hero-bread" style="background-image: url('images/bg_03.jpg'); background-size: cover;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-0 bread">Applications</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"></span> <span>Applications</span></p>

                    </div>
                </div>
            </div>
        </div>

        <section class=" ftco-category pad-80" style="position: relative; top: 80px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-section ftco-animate deal-of-the-day ftco-animate">
                        <!--<span class="subheading">Best Price For You</span>-->
                        <h2 class="mb-4 text-head">Applications</h2>
                    </div>
                </div>
                <div class="row app">
                    <div class="col-md-12">
                        <div class="row  mar-b-30">
                            <?php foreach ($application as $row) { ?>
                                <div class="col-md-4" style='margin-bottom: 20px;'>
                                    <div class="div-1" style='margin-bottom: 10px;'>
                                        <div class="div-2">
                                            <a data-toggle="modal" data-target="#applicaion_gallery" onclick="showGallery(<?php echo $row['application_id']; ?>, '<?php echo $row['title']; ?>');"><img src="<?php echo BASE_URL . $row['image_path_thumb']; ?>" alt="" style="cursor: pointer;" style="width: 350px;height: 260px;"/></a>
                                        </div>
                                    </div>
                                    <h3><?php echo $row['title']; ?></h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Application Gallery -->
        <div id="applicaion_gallery" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <h4 class="modal-title">Application - <span id="application_name"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div id="image_container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript">
            function showGallery(aid, title) {
                $.ajax({
                    type: "GET",
                    url: "api/v1/application_gallery/" + aid,
                    success: function (data) {
                        if (data.result.error === false) {
                            $('#application_name').html(title);
                            $('#image_container').empty();
                            $.each(data.result.data, function (key, val) {
                                if (val.type === 'image') {
                                    $('#image_container').append('<img src="<?php echo BASE_URL ?>' + val.image_path + '" alt="image" class="application-img" />');
                                }
                                if (val.type === 'youtube') {
                                    $('#image_container').append('<iframe src="https://www.youtube.com/embed/' + val.image_path + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width: 100%; min-height: 350px;"></iframe>');
                                }
                            });
                        } else {
                            alert(data.result.message);
                        }
                    },
                    error: function (err) {
                        alert('Error');
                    }
                });
            }
        </script>
    </body>
</html>