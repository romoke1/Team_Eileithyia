<?php

/**
 * @author Ayodeji Adesola (skyboy4life@gmail.com)
 * @copyright 2014
 */
   $ajax = ajax();

?>
<!-- Content Section Start -->


<div class="row">
                        <div class="col-xs-12">
                            <div class="sec-box">
                                <header style="margin-top: -100px;">
                                    <h2 class="heading">Edit Plan  <button type="button" class="close" onclick="closePop()" >&times;</button></h2>    
                                </header>
                                <div class="contents"">
                                    <div class="table-box">
                                    <?php echo form_open('admin/save_plan/'.$id.'') ?>
                                        <table class="table" id="tableSky">
                                            
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Plan Name</td>
                                                        <td class="col-sm-3"><input name="txtPlan" type="text" value="<?php echo $plan["name"] ?>" class="form-control" required ></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Price</td>
                                                        <td class="col-sm-3"><input name="txtPrice" type="number" value="<?php echo $plan["price"] ?>" class="form-control" required ></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Duration (Months)</td>
                                                        <td class="col-sm-3"><input name="txtMonths" type="number" value="<?php echo $plan["months"] ?>" class="form-control" required ></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td> Max. No. of Employees</td>
                                                        <td><input name="txtNum" type="number" value="<?php echo $plan["max_emp"] ?>" class="form-control" required >
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save</button> &nbsp;
                                            <button type="button" class="btn btn-default" onclick="closePop()">Close</button>
                                            <span id="btnTerm"></span>
                                        </div>
                                        <?php form_close() ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    