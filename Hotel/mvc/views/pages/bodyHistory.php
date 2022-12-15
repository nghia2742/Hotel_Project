<?php
    $history = $data['listHistory'];
?>

<div class="frame_history">

    <div class="mb-5 d-flex justify-content-end">
        <input  type="text" class="inputHistory form-control p-4" placeholder="Enter your email to search">
        <span><div class="btn btn-lg btn-info text-light" id="searchHistory">Search</div></span>
    </div>
    <div>
        <h1 class="fs-1 mb-5 fw-bold">Booking history</h1>
        <div class="table-responsive">
        <table class="table table_history table-primary fs-3 text-center">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="bodyHistory">
                <?php
                if (count($history) == 0) {
                    echo '<td colspan="5">Empty</td>';
                }
                    foreach ($history as $row) { 
                        if ($row['status'] == 1) {
                            $status = '<span class="statusHistory bg-success rounded text-light py-2 px-4">Finish</span>';
                        } else {
                            $status = '<span class="statusHistory bg-danger rounded text-light py-2 px-4">Processing...</span>';
                        }

                        if ($row['payment'] == 1) {
                            $payment = 'Paid';
                        } else {
                            $payment = 'Unpaid';
                        }
                        $price = (round($row['price']*$_SESSION['currency'],3));
                    
                ?>
                    <tr class="">
                        <td scope="row"><?=$row['date']?></td>
                        <td><?=$status?></td>
                        <td><?=$_SESSION['currencySign']?><?=$price?></td>
                        <td><?=$payment?></td>
                        <td><a href="#" onclick="viewDetail(<?=$row['id_reservation']?>)" data-bs-toggle="modal" data-bs-target="#modalViewHistory">View detail</a></td>  
                    </tr>
                <?php }?> 
            </tbody>
        </table>
    </div>
    </div>
    

</div>

<!-- Modal -->
<div class="modal fade" id="modalViewHistory" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitleId">View detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body text-dark pl-5 mt-3" id="modalViewDetail">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



