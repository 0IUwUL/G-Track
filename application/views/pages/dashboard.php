<?php if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    redirect("/");
  }
?>
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
                        <div class="row justify-content-center text-center mt-3 h5 text-wrap">
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
                        <?php foreach ($display as $title){
                        ?>
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="d-flex justify-content-around mt-3 h5">
                                <?php print($title['title'])?>
                                <button type="button" class="Cedit btn" data-bs-toggle="modal" data-bs-target="#InputModal" id = "C<?php echo $title['id']; ?>"
                                onclick = "edit(<?php echo $title['id']; ?>);"
                                data-id ="<?php echo $title['id']; ?>" 
                                data-title ="<?php echo $title['title']; ?>"
                                data-budget = "<?php echo $title['budget']; ?>"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <?php echo form_open("Category/delete/".$title['id']."/") ;?>
                                    <button type="submit" class="btn">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="d-flex justify-content-around mt-2 h6">
                                Budget: <?php echo $title['budget']; ?>
                            </div>
                        </div>
                        <?php
                        }  ?>
                        <div class = "categories col shadow mb-5 rounded">
                            <div class="row d-flex justify-content-center my-auto h5">
                                <!-- Button trigger modal -->
                                <button type="button" class="Cadd btn" data-bs-toggle="modal" data-bs-target="#InputModal">
                                    <i class="bi bi-plus-lg h2" style="color: #628EFF"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class = "transaction row col-3 justify-content-center">
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

<!-- Modal -->
<div class="modal fade" id="InputModal" tabindex="-1" aria-labelledby="InputModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-color">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="InputModalTitleLabel">Create Category</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open("Category/input", 'id = "CForm" name = "CForm"') ;?>
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" aria-describedby="CategoryNameHelp" name = "title" required>
                    </div>
                    <div class="mb-3">
                        <label for="Budget" class="form-label">Budget</label>
                        <input type="number" class="form-control" id="Budget" name = "budget" required>
                    </div>
                    <input type="hidden" id="CId" name="CId" value="">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
                </form>
        </div>
    </div>
</div>


<script src="<?php echo base_url('assets/script/script.js')?>"></script>