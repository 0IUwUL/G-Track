    <div class="container my-5">
        <div class="row mx-3">
            <div class="row col-8">
                <div class="row">
                    <div class = "status col shadow mb-5 rounded">
                        <div class="row justify-content-center mt-3 h5">
                            Expenses
                        </div>
                    </div>
                    <div class = "status col shadow mb-5 rounded">
                        <div class="row justify-content-center mt-3 h5">
                            Business Transactions
                        </div>
                    </div>
                    <div class = "status col shadow mb-5 rounded">
                        <div class="row justify-content-center mt-3 h5">
                            Budget
                        </div>
                    </div>
                </div>
        <!--categories-->
                <div class="row mx-1">
                    <div class="row row-cols-3">
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5">
                                Sample 1
                            </div>
                        </div>
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5">
                                Sample 2
                            </div>
                        </div>
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5">
                                Sample 3
                            </div>
                        </div>
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="row justify-content-center mt-3 h5">
                                Sample 4 
                            </div>
                        </div>
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="row d-flex justify-content-center my-auto h5">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#InputModal">
                                    <i class="bi bi-plus-lg h2" style="color: #628EFF"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="InputModal" tabindex="-1" aria-labelledby="InputModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                        <h5 class="modal-title" id="InputModalLabel">Create Category</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                  <label for="CategoryName" class="form-label">Category Name</label>
                                                  <input type="email" class="form-control" id="CategoryName" aria-describedby="CategoryNameHelp">
                                                </div>
                                                <div class="mb-3">
                                                  <label for="Budget" class="form-label">Budget</label>
                                                  <input type="number" class="form-control" id="Budget">
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Category</button>
                                        </div>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class = "ml-5 row col-3">
                <div class = "list col shadow mb-5 rounded">
                    <div class="row justify-content-center h5 mt-3">
                        TRANSACTIONS
                    </div>
                    <div class="scroll">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>