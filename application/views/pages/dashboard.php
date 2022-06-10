<?php if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    redirect("/");
  }
?>
    <div class="container-fluid my-5">
        <div class="row mx-3 justify-content-center">
            <div class="row col-8">
                <div class="row justify-content-evenly">
                    <div class = "status shadow mb-5 rounded">
                        <div class="row justify-content-center mt-3 h5">
                            Expenses
                            <div class = "row justify-content-center mt-5 h2 text-secondary">
                                <?php echo $total ?>.00
                            </div>
                        </div>
                            
                    </div>
                    <div class = "status shadow mb-5 rounded">
                        <div class="row justify-content-center text-center mt-3 h5 text-wrap">
                            Business Transactions
                            <div class = "dropwdown-center justify-content-center mt-5 h5 text-secondary">
                                <button class="btn btn-info dropdown-toggle p-2" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong><?php echo $default['title']; ?></strong>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                                    <?php foreach ($tran as $listed){ ?>
                                    <li id = "T<?php echo $listed['id']; ?>"><a class="Tbtn dropdown-item" role="button" href='<?php echo base_url(); ?>change/<?php echo $listed['id']; ?>'><?php echo $listed['title']; ?></a></li>
                                    <?php } ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#InputModal" onclick="add_trans();">
                                            Add new transaction <i class="bi bi-file-plus"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "status shadow mb-5 rounded">
                        <div class="row justify-content-center mt-3 h5">
                            Budget
                            <div class = "row justify-content-center text-center mt-<?php echo $budget['margin']; ?> h4 text-<?php echo $budget['color']; ?>">
                                <?php echo $budget['status'] ?>
                            </div>
                        </div>
                    </div>
                </div>
        <!--categories-->
                <div class="row mx-1">
                    <div class="row row-col-3 justify-content-evenly">
                        <?php foreach ($display as $title){
                        ?>
                        <div class = "categories shadow mb-5 rounded" type="button" data-bs-toggle="modal" data-bs-target="#Expense"
                            id = "E<?php echo $title['id']; ?>"
                            onclick = "exp(<?php echo $title['id']; ?>);"
                            data-id ="<?php echo $title['id']; ?>"
                            >
                            <div class="d-flex justify-content-around mt-3 h5">
                                <?php print($title['title'])?>
                            </div>
                            <div class="d-flex justify-content-around mt-2 h6">
                                Budget: <?php echo $title['budget']; ?>
                            </div>
                            <div class="justify-content-evenly mt-3 tableC">
                            <table class="table table-striped">
                                <tr class="table-success">
                                    <th>Name</th>
                                    <th>Cost</th>
                                </tr>
                                <?php foreach ($title[0] as $item){
                                    if (count($item) == 0){
                                ?>
                                <tr>
                                    <td>No Expenses</td>
                                    <td></td>
                                </tr>
                                <?php
                                }else{  ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['cost']; ?>.00</td>
                                </tr>
                                <?php 
                                }}?>
                            </table>
                            </div>
                        </div>
                        <?php
                        
                        }  ?>
                        <div class = "categories shadow mb-5 rounded">
                            <div class="row d-flex justify-content-center my-auto h5">
                                <!-- Button trigger modal -->
                                <button type="button" class="Cadd btn my-5" data-bs-toggle="modal" data-bs-target="#InputModal">
                                    <i class="bi bi-plus-lg h2" style="color: #628EFF"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "transaction row col-xl-3 justify-content-center">
                <div class = "list col shadow mb-5 rounded">
                    <div class="row justify-content-center h5 mt-3">
                        TRANSACTIONS
                    </div>
                    <div class="justify-content-evenly mt-3 table_tran">
                        <table class="table table-striped">
                            <tr class="table-primary">
                                <th>Name</th>
                                <th>Cost</th>
                            </tr>
                            <?php 
                                foreach ($transaction as $Elist){
                            ?>
                            <tr>
                                <td><?php echo $Elist['name']; ?></td>
                                <td><?php echo $Elist['cost']; ?>.00</td>
                                <td class = "hide"><?php echo $Elist['cat_id']; ?></td>
                            </tr>
                            <?php }?>
                        </table>
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
                        <label for="CategoryName" class="form-label" id= "label_Cat">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" aria-describedby="CategoryNameHelp" name = "title" required>
                    </div>
                    <div class="mb-3">
                        <label for="Budget" class="form-label" id= "label_Budget" hidden>Budget</label>
                        <input type="number" class="form-control" id="Budget" name = "budget" hidden required>
                    </div>
                    <label for="Default_Transaction" class="form-label mr-3" id= "label_Radio" hidden>Would you like to set this as a default transaction? </label>
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="1" hidden>
                        <label class="form-check-label" for="inlineRadio1" id = "label_yes" hidden>Yes</label>
                        <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="0" hidden checked>
                        <label class="form-check-label" for="inlineRadio1" id = "label_no" hidden>No</label>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btn">Save Category</button>
            </div>
                </form>
        </div>
    </div>
</div>

<!--Expense Modal -->
<div class="modal fade" id="Expense" tabindex="-1" aria-labelledby="ExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-color">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="InputModalTitleLabel">Would you like to input an expense?</h5>
            </div>
            <div class="modal-body d-flex justify-content-end">
            <?php echo form_open("Expense/view", 'id = "EForm" name = "EForm"') ;?>
                <input type="hidden" id="EId" name="EId" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Continue</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script src = "<?php echo base_url('assets/script/script.js')?>"></script>