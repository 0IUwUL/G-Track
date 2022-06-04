
<div class="container mt-5">
    <!-- header -->
    <div class="d-flex justify-content-between">
      <div class="row mx-2 d-inline">
        <a class="bi bi-box-arrow-left h3 mr-3" role="button" href="<?php echo base_url();?>dashboard"></a>
        <h3 class="d-inline text-color"><?php echo $cat_details[0]['title']; ?></h3>
        <i 
        class="Cedit btn bi bi-pen-fill d-inline h5" 
        role="button"
        data-bs-toggle="modal" 
        data-bs-target="#CandEModal"
        onclick = "edit(<?php echo $cat_details[0]['id']; ?>);"
        data-title ="<?php echo $cat_details[0]['title']; ?>"
        data-budget = "<?php echo $cat_details[0]['budget']; ?>"
        id = "CatEdit"
        >

        </i>
        <i class="bi bi-trash3-fill d-inline h5" 
        role="button"
        data-bs-toggle="modal" 
        data-bs-target="#DelModal"
        >

        </i>
      </div>
      <div>
        <button type="button" 
        class="btn btn-primary"
        onclick = "add(<?php echo $cat_details[0]['id']; ?>);"
        data-bs-toggle="modal" 
        data-bs-target="#CandEModal"
        id = "AddExp"
        >Add Expense</button>
      </div>
    </div>

    <div class="bg_expense px-5 rounded-3 mt-3 position-relative">
      <table class="table exp_table">
        <tr class="sticky-top bg_header">
          <th class="text-center p-3">Name</th>
          <th class="text-center p-3">Date</th>
          <th class="text-center p-3">Cost</th>
          <th class = "text-center p-3" colspan="2">Actions</th>
        </tr>
        <?php 
          if (empty($exp_details)){
        ?>
          <td class="text-center p-4"><strong>No expenses</strong></td>
        <?php 
          }
        ?>
        <?php  foreach ($exp_details as $items){ ?>
        <tr class="shadow">
          <td class="text-center p-4"><strong><?php echo $items['name']; ?></strong></td>
          <td class="text-center p-4"><strong><?php echo $items['cost']; ?></strong></td>
          <td class="text-center p-4"><strong><?php echo $items['date']; ?></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-pencil-square h5"
              role="button"
              data-bs-toggle="modal" 
              data-bs-target="#CandEModal"
              onclick = "Eedit(<?php echo $items['id']; ?>);"
              data-name ="<?php echo $items['name']; ?>"
              data-cost = "<?php echo $items['cost']; ?>"
              data-date = "<?php echo $items['date']; ?>"
              data-cate = "<?php echo $cat_details[0]['id']; ?> ?>"
              id = "E<?php echo $items['id']; ?>"
          ></i></strong></td>
          <td class="text-center p-4"><strong><i class="bi bi-x-square-fill h5"
            role="button"
            data-bs-toggle="modal" 
            data-bs-target="#DelModal"     
            onclick = "EDel(<?php echo $items['id']; ?>);"
            id = "E<?php echo $items['id']; ?>"   
            data-name ="<?php echo $items['name']; ?>"
            data-cate = "<?php echo $cat_details[0]['id']; ?> ?>"  
          ></i></strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>

    <div class="row text-light pos_status position-absolute bottom-0 end-0 pb-4">
      <div class="text-color d-flex justify-content-end">
        <strong>Total Expense: <?php echo $total; ?></strong>
      </div>
      <div class="text-color d-flex justify-content-end">
        <strong>Budget Remaining: <?php echo $BudRem; ?></strong>
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="CandEModal" tabindex="-1" aria-labelledby="CandEModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-color">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="CandEModalTitleLabel">Create Category</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open("Category/input", 'id = "CForm" name = "CForm"') ;?>
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label" id="LabelTitleName">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" aria-describedby="CategoryNameHelp" name = "title" required>
                    </div>
                    <div class="mb-3">
                        <label for="Budget" class="form-label" id="LabelCost">Budget</label>
                        <input type="number" class="form-control" id="Budget" name = "budget" required>
                    </div>
                    <div class="mb-3">
                        <label for="Date" class="form-label" id="LabelDate" hidden>Date used</label>
                        <input type="date" class="form-control" id="Date" name = "date" hidden>
                    </div>
                    <input type="hidden" id="CId" name="CId" value="">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "btn">Save Category</button>
            </div>
                </form>
        </div>
    </div>
</div>


<!--Delete Modal -->
<div class="modal fade" id="DelModal" tabindex="-1" aria-labelledby="DelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-color">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="DelModalTitleLabel">This would delete the expenses included in this category.</h5>
            </div>
            <div class="modal-body d-flex justify-content-end">
            <?php echo form_open("Expense/Cdelete/".$cat_details[0]['id']."/", 'id = "EForm" name = "EForm"') ;?>
            <input type="hidden" id="EId" name="EId" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Continue</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script src = "<?php echo base_url('assets/script/script.js')?>"></script>