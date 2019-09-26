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
                                    <h2 class="heading">Change Company Expiry Date  <button type="button" class="close" onclick="closePop()" >&times;</button></h2>    
                                </header>
                                <div class="contents"">
                                    <div class="table-box">
                                    <?php echo form_open('admin/change_coy_exp/'.$id.'') ?>
                                        <table class="table" id="tableSky">
                                            
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Current Expiry Date:</td>
                                                        <td class="col-sm-3"><?php echo $coy["exp_date"] ?></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Choose New Date</td>
                                                        <td class="col-sm-3">
                                                            <input name="txtDate" placeholder="Click to select Date" type="text" class="form-control" style="width:250px; z-index: 6500;" id="datepicker3" onselect="dater()" onmousedown="dater()" onmouseover="dater()" onfocus="dater()" onclick="dater()"/>
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


                    