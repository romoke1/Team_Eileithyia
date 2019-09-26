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
                                    <h2 class="heading">Change Company Plan  <button type="button" class="close" onclick="closePop()" >&times;</button></h2>    
                                </header>
                                <div class="contents"">
                                    <div class="table-box">
                                    <?php echo form_open('admin/change_coy_plan/'.$id.'') ?>
                                        <table class="table" id="tableSky">
                                            
                                                 <tr style="background-color: white;">
                                                        <td class="col-sm-1">Current Plan:</td>
                                                        <td class="col-sm-3"><?php echo $coy_plan["name"] ?></td>
                                                    </tr>
                                                    <tr style="background-color: white;">
                                                        <td class="col-sm-1">Choose Plan</td>
                                                        <td class="col-sm-3">
                                                            <select name="ddlPlan" class="form-control" required="">
                                                                <option value="">Select...</option>
                                                                <?php foreach ($plans as $val)
                                                                {
                                                                    echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                                                                }
?>
                                                            </select>
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


                    