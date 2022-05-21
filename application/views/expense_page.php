    <div class="container mt-5">
        <div class="row">
            <!-- content -->
            <div class="row col justify-content-center my-5">
                    <div class="card text-center bg-light p-0 d_expenses rounded-3 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Total expenses</h4>
                            <h5 class="card-text pt-5">
                                rawr
                            </h5>
                        </div>
                    </div>
                <div class="row col justify-content-center my-5">
                    <div class="card text-center bg-light p-0 d_expenses rounded-3 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Budget Remaining</h4>
                            <h5 class="card-text pt-5">
                                rawr
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- calendar part -->
            <div class="row col cal_font justify-content-center text-center text-white m-3">
                <div class=" shadow calendar">
                    <div class="month align-items-center">
                      <i class="fas fa-angle-left prev"></i>
                      <div class="date">
                        <h1></h1>
                        <p></p>
                      </div>
                      <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                      <div>Sun</div>
                      <div>Mon</div>
                      <div>Tue</div>
                      <div>Wed</div>
                      <div>Thu</div>
                      <div>Fri</div>
                      <div>Sat</div>
                    </div>
                    <div class="days"></div>
                  </div>
            </div>
        <!-- modal -->
            <div class="modal fade" id="Inpuexpense" tabindex="-1" aria-labelledby="InputExpense" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-color">
                    <div class="modal-body">
                      <div class="modal-title justify-content-center h2 text-center">
                          Expense
                      </div>
                      <div class="row mt-5">
                        <form>
                            <div class="mb-3">
                              <label for="InputCostName" class="form-label">Name:</label>
                              <input type="text" class="form-control" id="InputCostName" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="CostValue" class="form-label">Cost</label>
                              <input type="number" class="form-control" id="CostValue">
                            </div>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

<script src="<?php echo base_url('assets/script/script.js')?>"></script>

