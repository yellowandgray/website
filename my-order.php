<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'applications';
    include 'head.php';
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
                        <h1 class="mb-0 bread">My Order</h1>
                        <p class="breadcrumbs">
                            <span class="mr-2">
                                <a href="index.php">Home</a>
                            </span> 
                            <span class="mr-2"></span> 
                            <span>My Order</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <section class="my-order">
            <div class="container">
                <div class="row">
                    <div class="member-information">
                        <h2>Member Information</h2>
                    </div>
                </div>
                <div class="row">
                    <table>
                        <tr>
                            <th>Name </th>
                            <td> : </td>
                            <td> First Name Last Name</td>
                        </tr>
                        <tr>
                            <th>Delivery Address </th>
                            <td> : </td>
                            <td> Address</td>
                        </tr>
                        <tr>
                            <th>State </th>
                            <td> : </td>
                            <td> State</td>
                        </tr>
                        <tr>
                            <th>City </th>
                            <td> : </td>
                            <td> City</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section class="my-order-section">
            <div class="container">
                <div class="row">
                    <h2>MY ORDER DETAILS</h2>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Order ID: #1 | Grand Total: Rs.8000 | Order Date: 07/12/2019
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Total</th>
                                            <th>Grand Total</th>
                                        </tr>
                                        <tr>
                                            <td>Product Id</td>
                                            <td>Product Name</td>
                                            <td>8000</td>
                                            <td>8000</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Order ID: #2 | Grand Total: Rs.8000 | Order Date: 07/12/2019
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Total</th>
                                            <th>Grand Total</th>
                                        </tr>
                                        <tr>
                                            <td>Product Id</td>
                                            <td>Product Name</td>
                                            <td>8000</td>
                                            <td>8000</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Order ID: #3 | Grand Total: Rs.8000 | Order Date: 07/12/2019
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Total</th>
                                            <th>Grand Total</th>
                                        </tr>
                                        <tr>
                                            <td>Product Id</td>
                                            <td>Product Name</td>
                                            <td>8000</td>
                                            <td>8000</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>