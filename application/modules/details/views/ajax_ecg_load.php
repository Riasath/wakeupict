<div id="load_ajax_ecgs">
                                <?php
                                if (!empty($detail->ecg)) {
                                    $ecgs = json_decode($detail->ecg);
                                    foreach ($ecgs as $key => $ecg) {
                                        ?>
                                        <tr class="all_remove">
                                            <td><?php echo $ecg->ecg_date; ?></td>
                                            <td><?php echo $ecg->findings; ?></td>
                                            <td><?php echo $ecg->rhythmc_sinus_AF; ?></td>
                                            <td><?php echo $ecg->qrs_ms; ?></td>
                                            <td><?php echo $ecg->rbbb_lbbb; ?></td>
                                            <td><?php echo $ecg->heart_block; ?></td>
                                            <td><?php echo $ecg->qt_qtc; ?></td>
                                            <td><?php echo $ecg->ex_beats; ?></td>
                                            <td>
                                                <input type="checkbox" class="delete_checkbox" name="delete[]" value="<?php echo $key; ?>" />                                   
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </div>