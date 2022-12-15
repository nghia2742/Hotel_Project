<div class="background_table">
    <div class="header_table">
        <div>
            <h1 class="mb-4">History</h1>
            <div class="alert alert-success tool_notification"></div>

            <div class="d-flex justify-content-between">
                <div class="filter_table py-0 d-flex">
                    <input type="text" class="search_table border border-secondary border-1">
                    <div class="btn_search btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>

                    <div class="dropdown open ml-3">
                        <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Show
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="/Hotel/Admin/Rooms/0"></a>
                            <a class="dropdown-item" href="/Hotel/Admin/Rooms/">4-6</a>
                            <a class="dropdown-item" href="/Hotel/Admin/Rooms/">7-9</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="body_table overflow-auto">
        <div class="table-responsive">
            <table class="table table-striped table_rooms
            table-hover	
            table-borderless">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th class="text-center">Id_reservation</th>
                        <th class="text-center">Id_customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Payment</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider" id="bodyHistory">
                    
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>

    </div>
</div>

<!-- The Delete Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are you sure delete ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="deleteRoom()"> Yes, delete </button>
      </div>

    </div>
  </div>
</div>
